<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Admin';
		$this->data['s_page_header'] = 'admin';
		$this->data['s_page_type'] = 'admin';
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/main.css',
			base_url() . 'application/public/css/booking.css',	
           base_url() . 'application/public/css/admin_style.css',
            base_url() . 'application/public/css/bms_style.css',

			);

		$this->data['a_js_scripts'] = array( 
			base_url() . 'application/public/js/jquery-2.1.1.min.js',
			base_url() . 'application/public/js/vendor/bootstrap.js',
			base_url() . 'application/public/js/extras/jquery.dataTables.js',
			base_url() . 'application/public/js/extras/custom-slide-page.js',
			);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('admin_model');
	} //end of function __construct

	function index(){	
			$this->load->helper('file');
        
            $this->form_validation->set_rules('txt_username', 'Username', 'trim|required|xss_clean|min_length[3]');
            $this->form_validation->set_rules('txt_password', 'password', 'trim|required|xss_clean|min_length[3]');
            if($this->form_validation->run()){
                $this->load->model('admin_model');
                $o_admin_info = $this->admin_model->login();   
                $this->session->set_userdata('o_admin',$o_admin_info);
                redirect('admin/reservations');
            }

			$this->data['s_main_content'] ='admin/login';
			$this->load->view('includes/template', $this->data);


	} //end of function index

	function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}

	function  reservations(){
		if($this->session->userdata('o_admin') != NULL){
			$this->load->model('bookinghotel_model');
			$this->data['a_table_project_data'] = $this->bookinghotel_model->get_all_reservation_info();
			$this->data['s_main_content'] ='admin/reservations';
			$this->load->view('includes/template', $this->data);
		}else{
			redirect('admin', 'refresh');
		}
	}

	function delete($reserve_id){
		if($this->session->userdata('o_admin') != NULL){
			$this->load->model('bookinghotel_model');
			$this->load->model('room_model');
			$this->load->model('credit_card_model');


			$a_reservation_data = $this->bookinghotel_model->get_reservation_info($reserve_id);

			if($a_reservation_data != NULL){
					if($a_reservation_data->payment_type == 'Credit'){
						$this->credit_card_model->delete_cc_info($reserve_id);
					}

					$a_rooms_id = array('1' => 'Bungalow', 
										'2' => 'Deluxe', 
										'3' => 'Executive', 
										'4' => 'Presidential Suite' 																		
										);


					$o_room_info = $this->room_model->get_reserve_room($reserve_id);
					$o_main_room = $this->room_model->get_room_info($o_room_info[0]->room_type);
					$a_room_update['rooms_left'] = ($o_main_room[0]->rooms_left) + 1;

					foreach( $a_rooms_id as $key => $value){
						if($value == $o_main_room[0]->rooms_info_type){
							 $i_main_hotel_info_id = $key;
						}
					}
					$this->bookinghotel_model->update_rooms_info($i_main_hotel_info_id, $a_room_update);
					$this->room_model->delete_room_reservation($reserve_id);
					$this->bookinghotel_model->delete_reservation_info($reserve_id);	
			}
		}

		redirect('admin/reservations');	

	}



}
?>
