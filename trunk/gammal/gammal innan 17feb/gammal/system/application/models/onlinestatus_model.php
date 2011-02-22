<?php

Class Onlinestatus_model extends Model {


//***************************************************************************************
	
// Set users onlinestatus to 1
	
//**************************************************************************************	


	function setonline(){
		
		$username = $this->session->userdata('username');
		
		$online = array('isonline'	=>	1);
				
		$this->db->where('username', $username);
		$query = $this->db->update('person', $online);
		
	}
	
	
//***************************************************************************************
	
// Set users onlinestatus to 0
	
//**************************************************************************************	

	
	function setoffline(){
		
		$username = $this->session->userdata('username');
		$online = array('isonline'	=>	0);
		
		$this->db->where('username', $username);
		$query = $this->db->update('person', $online);
	
	}   
	
	
//***************************************************************************************
	
// Check users onlinestatus
	
//**************************************************************************************	


	function checkonline(){
	
		$username = $this->session->userdata('username');
	
		$this->db->where('username', $username);
		$this->db->select('isonline');
		$result = $this->db->get('person', 'isonline');
		
		$res = $result->result_array();
		
		foreach($res as $key) {
    		
    		$value = $key;	
    	}
		
		echo json_encode($value);
		
	}   


//***************************************************************************************



}




?>