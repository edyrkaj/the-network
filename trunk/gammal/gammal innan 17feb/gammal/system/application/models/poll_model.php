<?PHP

Class Poll_model extends model {

	
//***************************************************************************************
	
// Insert values from vote into poll-table
	
//**************************************************************************************
		
	
	function insertdb(){
		
		if ($this->input->post('submitpoll')) {
			
			$this->db->where('name', $this->input->post('poll'));
			$this->db->set('count', 'count +1', FALSE );
			$this->db->update('poll');
		}	
	}
		
	
	
//***************************************************************************************
	
// Get values from poll-table
	
//**************************************************************************************
	
		
	function checkstats() {
	
		$this->db->where('count > 0');
		$result = $this->db->get('poll');
		
		$res = $result->result_array();
		
		foreach ($res as $row) {
		
			$data[] = $row;
		}
		
		echo json_encode($data);

	}
}



//***************************************************************************************



?>