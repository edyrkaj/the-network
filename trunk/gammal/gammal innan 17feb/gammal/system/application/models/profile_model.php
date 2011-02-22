<?PHP


Class Profile_model extends Model {


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
	
// Retrieved data from the education table
	
//**************************************************************************************
	
	function get_edu(){
	
		$username = $this->session->userdata('username');
	
		$this->db->where('username', $username);
		$query = $this->db->get('person');
		$result = $query->row();
		$this->db->where('personnr_fk', $result->personnummer);
		$query = $this->db->get('education');
		
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
	
//***************************************************************************************
	
// Inserts education information
	
//**************************************************************************************
	

	
	function insert_edu($data) {
	
		$username = $this->session->userdata('username');
	
		$this->db->where('username', $username);
		$query = $this->db->get('person');
		$result = $query->row();
		$data['personnr_fk'] = $result->personnummer;
		
		$this->db->insert('education', $data);
		
		
	}

}



//***************************************************************************************


?>