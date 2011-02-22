<?PHP

Class Poll extends CI_Controller {

	
	
//***************************************************************************************
	
// Inserts data in poll table when user votes on frontpage
	
//**************************************************************************************
	
	
	$data = $this->input->post('submitpoll');
	
	if (isset($data)) {
	
		function insertdata() {
		
			$this->load->model('poll_model');
			$this->poll_model->insertdb();
		
		}
	}


}


//***************************************************************************************



?>