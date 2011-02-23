<?php

class Workey_model extends CI_Model{
    

//Hämta alla distrikt
	function get_districts() {	
		$query = $this->db->get('district');
		$districts = $query->result_array();
		return $districts;
	}

//Hämta personens distrikt som man vill jobba i	
	function get_wantwork_district(){
		$username = $this->session->userdata('username');		
		$this->db->where('username', $username);
		$this->db->select('districtid_fk');
		$query = $this->db->get('person');
		$fav_district = $query->result_array();
		return $fav_district:
	}
	
//Hämta alla annonser från workey
	function get_jobads(){
		$jobs = @json_decode(file_get_contents('http://api.workey.se/v1/?function=search&region=21&keywords=s%E4ljare&page=2'), true);
		$jobs = $jobs['data'];

		foreach ($jobs as $job) {
			$jobads[] = $job;			
		}
		return $jobads;                
	}

}

?>