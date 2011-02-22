<?PHP


Class Profile_model extends CI_Model {


//***************************************************************************************
	
// Delievers data from the person table
	
//**************************************************************************************
	
	
	function get_profile(){
	
		$username = $this->session->userdata('username');
		
		$this->db->where('username', $username);
		$query = $this->db->get('person');
		
		return $query->result_array();
	
	}



//***************************************************************************************
	
// Inserts data in the person table
	
//**************************************************************************************
	

	
	function insertpres($data) {
	
		$username = $this->session->userdata('username');
	
		$this->db->where('username', $username);
		$this->db->update('person', $data);

	}
}



//***************************************************************************************


?>