<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Booking';
		$this->data['s_page_header'] = 'booking';
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
		if($this->session->userdata('step1') == NULL){
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
				$this->session->set_userdata('step1','ok');
				redirect('/booking/step2');
			} else {
				$this->session->sess_destroy();	
				$this->data['s_main_content'] = 'booking/initial';
				$this->load->view('includes/template', $this->data);
			}
		}else{
			redirect('booking/step2');
		}

	}

	function step2(){
		if($this->session->userdata('step2') == NULL){
			if($this->session->userdata('cust_id') != NULL) {
				$this->load->model('bookinghotel_model');
				$a_hotel_room_available = $this->bookinghotel_model->get_hotel_rooms_info();
				$this->data['roomsinfo'] = $a_hotel_room_available ;
				$this->form_validation->set_rules('date_check_in','Check in', 'trim|required|xss_clean|min_length[3]');
				$this->form_validation->set_rules('date_check_out','Check out', 'trim|required|xss_clean|min_length[3]');
				$this->form_validation->set_rules('rad_RoomType','Room Type', 'required');
				$this->form_validation->set_rules('ddn_payment_type','Payment Type', 'required');

				if($this->form_validation->run()){
					if((strtotime(date('Y-m-d')) -  strtotime($this->input->post('date_check_in'))) <=	 0 && ((strtotime($this->input->post('date_check_out')) - strtotime($this->input->post('date_check_in')))/3600/24) > 0){
					$this->load->model('room_model');
					$room_info = $this->room_model->get_room_info($this->input->post('rad_RoomType'));
					$i_total_days = (strtotime($this->input->post('date_check_out')) - strtotime($this->input->post('date_check_in')))/3600/24;
					$i_total_room_price =  ($room_info[0]->rooms_info_price) * $i_total_days;
					$this->data['reservation_total'] = $i_total_room_price;

					$a_reservation_details_info = array( 'reservation_date'    		=> date('Y-m-d'),
														 'reservation_checkin' 		=> $this->input->post('date_check_in'),
														 'reservation_checkout' 	=> $this->input->post('date_check_out'),
														 'reservation_totalpayment' => $i_total_room_price,
														 'payment_type' 			=> $this->input->post('ddn_payment_type'),
														 'customer_customer_id'		=> $this->session->userdata('cust_id'),
														 'reservation_confirmation_code' =>  idate('H',date('Y-m-d')) + rand() + $this->session->userdata('cust_id')
														);

					$i_reserve_id = $this->bookinghotel_model->add($a_reservation_details_info);

					foreach($room_info as $room_info){
						if($room_info->rooms_info_type ==  $this->input->post('rad_RoomType')){
							 $a_room_update['rooms_left'] = ($room_info->rooms_left)-1;
						}
					}

					$a_room_details_info = array('room_type'		   => $this->input->post('rad_RoomType'), 
												 'number_accomodate'   => $room_info->rooms_left,
												 'room_reservation_id' => $i_reserve_id 
												 );

					$a_rooms_id = array('1' => 'Bungalow', 
										'2' => 'Deluxe', 
										'3' => 'Executive', 
										'4' => 'Presidential Suite' 																		
										);

					$this->room_model->add($a_room_details_info);

					foreach( $a_rooms_id as $key => $value){
						if($value == $this->input->post('rad_RoomType')){
							 $i_main_hotel_info_id = $key;
						}
					}

					$this->data['results'] = $this->bookinghotel_model->update_rooms_info($i_main_hotel_info_id, $a_room_update);

					if($i_reserve_id != NULL){
						$this->session->set_userdata('reserve_id', $i_reserve_id);
					}
					$this->session->set_userdata('step2','ok');
					redirect('/booking/step3');
					}else{
						if((strtotime(date('Y-m-d')) -  strtotime($this->input->post('date_check_in'))) >	 0){
							$this->data['s_date_error_1'] = "Invalid Check in";
						}

						if(((strtotime($this->input->post('date_check_out')) - strtotime($this->input->post('date_check_in')))/3600/24) < 0){
							$this->data['s_date_error_2'] = "Invalid Check Out";
						}
					}
				}


				$this->data['results'] = $this->input->post('ddn_payment_type');
				$this->data['s_main_content'] = "booking/add_reservation";
				$this->load->view('includes/template', $this->data);
			}else{
				redirect('booking','refresh');
			}
		}else{
			redirect('booking/step3');
		}

	}

	function step3(){
		if($this->session->userdata('step3') != NULL){ 
			redirect('booking/complete');
		}
			if($this->session->userdata('cust_id') != NULL && $this->session->userdata('reserve_id') != NULL) {
				$this->load->model('bookinghotel_model');


				$this->data['reservation_info'] = $this->bookinghotel_model->get_reservation_info($this->session->userdata('reserve_id'));

			if($this->data['reservation_info']->payment_type == 'Credit'){
				$this->form_validation->set_rules('txt_cc_no','Credit Card No,', 'trim|required|xss_clean|min_length[3]');
				$this->form_validation->set_rules('txt_cc_pin','Credit Card Pin', 'trim|required|xss_clean|min_length[3]');
				$this->form_validation->set_rules('date_cc_expiration','Expiration Date', 'required');

				if($this->form_validation->run()){
					$this->load->model('credit_card_model');

					$a_cc_info = array('cc_number' 				   => $this->input->post('txt_cc_no'),
									  'cc_pin' 					   => $this->input->post('txt_cc_pin'),
									  'cc_expiration_date' 		   => $this->input->post('date_cc_expiration'),
									  'customer_customer_id' 	   => $this->session->userdata('cust_id') ,
									  'reservation_reservation_id' => $this->session->userdata('reserve_id') 
									);

					$this->credit_card_model->add($a_cc_info);
					$this->session->set_userdata('complete','complete');
					$this->session->set_userdata('complete','ok');
					redirect('booking/complete');
				}elseif($this->data['reservation_info']->payment_type == 'Cash'){
					$this->session->set_userdata('complete','complete');
				}
			}

			$this->data['s_main_content'] = "booking/finalized";
			$this->load->view('includes/template', $this->data);
		}else{
			redirect('/booking', 'refresh');
		}
	}

	function complete(){
		if($this->session->userdata('complete') != NULL && $this->session->userdata('complete') =='complete') {

			$this->data['s_main_content'] = "booking/complete";
			$this->load->view('includes/template', $this->data);
		}else{
			redirect('/booking', 'refresh');
		}
	}

	function final_book(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	
}
?>
