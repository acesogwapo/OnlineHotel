<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
/**
	* Adds another category type to the category table
 	* @scope	public
	* @param	array		a_cat_info
	* @return	string		error (if there's any)
	 */
	function add($a_room_content)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert('room', $a_room_content)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add


	/**
	* Returns the information of a particular Standard Program
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	standard program id
	* @return 	r_query Result Set	
	*/
	function update_room($room_id,$data)
	{
		$this->db->where('room.room_id', $room_id,$data);
	    $this->db->update('room', $data); 
	} // end of function get_info

	/**
	* Returs a list of Standard Programs about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_room($room_id)
	{
		$this->db->where('room.room_id', $room_id);
		$r_query = $this->db->get(`room`);

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	}


/**
	* Returns the information of a particular Standard Program
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	standard program id
	* @return 	r_query Result Set	
	*/
	function update_room_info($enum_room_info,$data)
	{
		$this->db->where('rooms_info_type', $enum_room_info);
	    $this->db->update('main_hotel_info', $data); 
	} // end of function get_info

/**
	* Returs a list of Standard Programs about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_room_info($enum_room_info)
	{
		$this->db->where('rooms_info_type', $enum_room_info);
		$r_query = $this->db->get('main_hotel_info');

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	}

/**
	* Returs number of rows through location id
	* @scope 	public
	* @param 	int 	location id
	* @return 	int 	number of rows	
	*/
	function count_by_location_id($i_location_id) {
		$this->db->where('location_id', $i_location_id);
		$r_result = $this->db->get(TBL_STANDARD_PROGRAMS);

		return $r_result->num_rows();
	} //end of count_by_location_id

/**
	* Checks if branch already exists
 	* @scope	public
	* @param	int			centre_id
	* @param	string		program_name
	* @return	boolean		number of rows
	 */
	function check_if_exists($i_centre_id, $s_program_name)
	{
		$this->db->where('name', $s_program_name);
		$this->db->where('centre_id', $i_centre_id);
		$r_query = $this->db->get(TBL_STANDARD_PROGRAMS);

		return ($r_query->num_rows() > 0 ? TRUE : FALSE);
	} //end of function check_if_exists

}