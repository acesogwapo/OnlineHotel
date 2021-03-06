<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a member
 	* @scope	public
	* @param	array		a_member_info
	* @return	string		error (if there's any)
	 */
	function add($a_cust_info)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert('customer', $a_cust_info)) {
			return  $this->db->insert_id();
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/**
	* Returns the information of a particular member
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	adhoc program id
	* @return 	r_query Result Set	
	*/
	function get_info($i_customer_id)
	{
		$this->db->where('member.Mem_ID', $i_customer_id);
		$r_query = $this->db->get('customer');

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	}

	/**
	* Checks if the approval code is valid
 	* @scope	public
	* @param	int		   approval code
	* @return	boolean	   number of rows
	 */
	function check_approval_code($txt_approval_code)
	{
		$this->db->where('Mem_ApprovalCode', $txt_approval_code);
		$r_query = $this->db->get('member');

		return ($r_query->num_rows() > 0 ? $r_query->row() : FALSE);
	} //end of function check_if_email_exists



}