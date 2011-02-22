<?php

class Register_model extends Model {


//***************************************************************************************
	
// Check database to see if username is availible
	
//**************************************************************************************


	
	function username_available($username) {
		
		$query = $this->db->get_where('person', array('username' => $username));
		
		if($query->num_rows() > 0) {
			return false;
		}
		else {
			return true;
		}			
	}
	
	
	
//***************************************************************************************
	
// Insert persons userinfo into database
	
//**************************************************************************************	
	
	
	
	function insert_person($data){
		
		$this->db->insert('person', $data);
	
	}
	
	
	
//***************************************************************************************
	
// Insert companys userinfo into database
	
//**************************************************************************************	
	
	
	function insert_company($data){
	
		$this->db->insert('company', $data);
	
	}
	
	
	
	



//***************************************************************************************



}



?>