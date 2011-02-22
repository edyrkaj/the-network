<?php



Class Get_ads extends CI_Model {

	
//**************************************************************************************
	
// Get districts to searchform
	
//**************************************************************************************
	
	
	function location(){
	
		$this->db->select('name');
		$result = $this->db->get('district');
		$districts = $result->result_array();
		return $districts;
	}
	
				
	
//**************************************************************************************
	
// Get availible ads
	
//**************************************************************************************
	

	function getad(){
		
		$input = $this->input->post('input');
	
	
		$input = explode(' ', $input);

		$where = '';
		
		foreach($input as $value){
							
			if(empty($where)){
				$where = 'WHERE (';
			}
			else{
				$where .= ' OR ';
			}
		
			$where .= "title LIKE '%$value%'";
			$where .= "OR body LIKE '%$value%'";
		}
		
		$where = $where . ")";
		
		$and = '';
	
		if(isset($string)){
				$string = $this->input->post('string');

		
		foreach($string as $location){
			
			if ($location == 'Alla'){
				$and = null;
			}
			elseif(!isset($location)){
				$and = null;
			}
			
			
			if(empty($and)){
				$and = 'AND ';
			}
			else{
				$and .= ' OR ';
			}
			
			$and .= "city = '$location'";
			
			if ($location == 'Alla'){
				$and = null;
			}
			
		}
		}
		
		
		$q = $this->db->query("SELECT * FROM ad $where $and");
		$result = $q->result_array();
		
		echo json_encode($result);	
		}
	

//***************************************************************************************
	


}















