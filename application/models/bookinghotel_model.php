 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bookinghotel_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a user's account
 	* @scope	public
	* @param	array		a_account_info
	* @return	string		error (if there's any)
	 */
	function add($a_reservation_info)
	{
		$s_errors['error'] = '';
		if ($this->db->insert('reservation', $a_reservation_info)) {
			return $this->db->insert_id();
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add


/**
	* Get a user's account if it exists
 	* @scope	public
	* @param	array		a_account_info
	* @return	string		error (if there's any)
	 */
	function get_hotel_rooms_info()
	{

		$r_query = $this->db->get('main_hotel_info');

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	} //end of function add

/**
	* Get a user's account if it exists
 	* @scope	public
	* @param	array		a_account_info
	* @return	string		error (if there's any)
	 */
	function get_reservation_info($i_reservation_id)
	{
		$this->db->where('reservation.reservation_id', $i_reservation_id);
		$r_query = $this->db->get('reservation');

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	} //end of function add
/**
	* Updates the Person-in-charge credentials
 	* @scope	public
	* @param	array		credentials
	* @param	int			centre_id
	* @return	string		error (if there's any)
	 */
	function update_rooms_info($i_rooms_id, $a_rooms_update)
	{
		$this->db->where('id', $i_rooms_id);
		if ($r_result = $this->db->update('main_hotel_info', $a_rooms_update)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} // end of function update



}