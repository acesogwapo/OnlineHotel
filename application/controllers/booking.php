<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Home';
		$this->data['s_page_header'] = 'home';
		$this->data['s_page_type'] = 'home';
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/main.css',
			base_url() . 'application/public/css/home_style.css',
			base_url() . 'application/public/css/booking.css',
			);

		$this->data['a_js_scripts'] = array( 
			base_url() . 'application/public/js/modernizr.custom.js',
			base_url() . 'application/public/js/jquery.lettering.js',
			base_url() . 'application/public/js/jquery-2.1.1.min.js',
			base_url() . 'application/public/js/slick.js',			
			);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	} //end of function __construct

	function index(){	

		$this->form_validation->set_rules('txt_cust_lname','Last Name', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_cust_fname','First Name', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_cust_address','Address', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_cust_number','Customer Number', 'trim|required|xss_clean|min_length[9]|numeric');

		if($this->form_validation->run()){
			$this->session->unset_userdata('cust_id');
			$this->load->model('customer_model');
			$a_customer_db = array( 'txt_cust_lname'  => 'customer_fname',
									'txt_cust_fname'  => 'customer_lname',
									'txt_cust_address'  => 'customer_address',
									'txt_cust_number'  => 'customer_number'

								  );


			foreach($a_customer_db as $key => $value){
					if($this->input->post($key) != NULL){
						$a_project_insert_db[$value] = $this->input->post($key);
					}
				}

			$i_cust_id = $this->customer_model->add($a_project_insert_db);
			$this->session->set_userdata('cust_id', $i_cust_id);
			redirect('/booking/step2');
		} else {

		$this->data['s_main_content'] = 'booking/initial';
		}


		$this->load->view('includes/template', $this->data);
	}

	function step2(){

		//if($this->session->userdata('cust_id') != NULL) {

			$this->form_validation->set_rules('date_check_in','Check in', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('date_check_out','Check out', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('rad_RoomType','Room Type', 'required');

			if($this->form_validation->run()){
				$this->load->model('bookinghotel_model');
				$this->load->model('room_model');
				$room_info = $this->room_model->get_room_info($this->input->post('rad_RoomType'));
				$i_total_days = (strtotime($this->input->post('date_check_out')) - strtotime($this->input->post('date_check_in')))/3600/24;
				$i_total_room_price =  ($room_info[0]->rooms_info_price) * $i_total_days;
				$this->data['reservation_total'] = $i_total_room_price;
				$a_reservation_details_info = array(

													);
			}


			$this->data['results'] = $this->session->userdata('cust_id') ;
			$this->data['s_main_content'] = "booking/add_reservation";
			$this->load->view('includes/template', $this->data);
		//}else{
		//	redirect('/booking','refresh');
		//}

	}
	
}
?>
