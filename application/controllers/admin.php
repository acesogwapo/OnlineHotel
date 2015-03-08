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

			base_url() . 'application/public/css/admin_style.css',	

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

			$this->data['s_main_content'] ='admin_login';
			$this->load->view('includes/template', $this->data);


	} //end of function index



}
?>
