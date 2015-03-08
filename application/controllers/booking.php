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
		$this->data['s_main_content'] = 'booking/initial';
		$this->load->view('includes/template', $this->data);
	}

	function step2(){
		$this->form_validation->set_rules('txt_cust_lname','Last Name', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_cust_fname','First Name', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_cust_address','Address', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_cust_number','Customer Number', 'trim|required|xss_clean|min_length[9]|numeric');

		if($this->form_validation->run()){
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

			$this->data['s_main_content'] = "booking/add_reservation";
		}else{
			$this->data['s_main_content'] = "booking/initial";
		}

		$this->load->view('includes/template', $this->data);
	}
	
}
?>
