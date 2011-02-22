<?php



Class Get_ads extends CI_Model {

	
//**************************************************************************************
	
// Get districts to searchform
	
//**************************************************************************************
	
	
	function location(){
	
		$result = $this->db->get('name', 'district');		
		
		foreach($result as $value){
										
			echo '<option value="' . $value . '">' . $value . '</option>';
		}				
	}
	
				
	
//**************************************************************************************
	
// Get availible ads
	
//**************************************************************************************
	

	function getads(){
			
		if(isset($params['string'])){
			$s = $params['string'];
		}
		$i = $params['input'];
		
		$i = explode(' ', $i);
						
					
		$db = Database::getInstance();

		$where = '';
		
		foreach($i as $value){
							
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
	
		if(isset($s)){
	
		foreach($s as $location){
			
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
		
		
		$q = "SELECT * FROM ad $where $and";
		
		return $q;
	
		}
	

//***************************************************************************************
	


}




























}