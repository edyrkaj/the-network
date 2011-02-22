<?PHP


class Login_model extends Model{


//***************************************************************************************
	
// Validates user login-data
	
//**************************************************************************************


	function validate(){	
		
		$username = $_POST['value'][0];
		$password = $_POST['value'][1];
				
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('person');
		
		
		if ($query->num_rows() == 1){
			
			return true;
				
		}
		
		else {
		
			return false;
		}
	}	
}

//***************************************************************************************


?>