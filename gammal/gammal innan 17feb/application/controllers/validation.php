<?php 

Class Validation extends CI_Controller {


//***************************************************************************************
	
// Validation rules for registration of user
	
//**************************************************************************************

	function validate_required($field) {
		
		if (empty($field)) return "Obligatoriskt ";
		return "";
	}

	
	function  validate_email($field) {
		if (!empty($field) && !preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/" , $field)) {
			return "Ogiltig epost ";
		}
	
		return "";
 	}
 	
 	
  	function validate_match($password, $confirm_password) {
		
		if (!empty($password) && !empty($confirm_password) && ($password !== $confirm_password)) return "Lösenorden matchar inte ";
		return "";
	}



	function fix_string($string) {
	
		if (get_magic_quotes_gpc()) $string = stripslashes($string);
		return htmlentities ($string);
	}
	
	function validate_username_avail($field){
	
		$this->load->model('register_model');
		$result = $this->register_model->username_available($field);
		if($result == false)
		return "Upptaget användarnamn ";
		else return "";

	}



//***************************************************************************************
	
// Register user
	
//**************************************************************************************


function register(){

		if(isset($_POST['ajax']) && isset($_POST['submit'])) {
			
			$firstname = $_POST['value'][0];
			$lastname = $_POST['value'][1];
			$personnr = $_POST['value'][2];
			$username = $_POST['value'][3];
			$email = $_POST['value'][4];
			$password = $_POST['value'][5];
			$confirm_password = $_POST['value'][6];
												
			$validate_firstname = $this->validate_required($firstname);
			$validate_lastname = $this->validate_required($lastname);
			$validate_personnr = $this->validate_required($personnr);
			$validate_username = $this->validate_required($username);
			$validate_email = $this->validate_required($email);
			$validate_password = $this->validate_required($password);
			$validate_confirm = $this->validate_required($confirm_password);
			
			$validate_username .= $this->validate_username_avail($username);
			$validate_email .= $this->validate_email($email);
			$validate_confirm .= $this->validate_match($password, $confirm_password);
			
			if($validate_firstname || $validate_lastname || $validate_personnr || $validate_username || $validate_email || $validate_password || $validate_confirm){
				
				$data = array(
					'validate_firstname' 	=> $validate_firstname,
					'validate_lastname' 	=> $validate_lastname,
					'validate_personnr'		=> $validate_personnr,
					'validate_username'		=> $validate_username,
					'validate_email'		=> $validate_email,
					'validate_password'		=> $validate_password,
					'validate_confirm'		=> $validate_confirm,
				); 

				echo json_encode($data);
			}

			else{
			
				//prepare data to be sent to the database
			
				$insertdb = array(
					'firstname' => $firstname,
					'lastname' => $lastname,
					'personnummer' => $personnr,
					'username' => $username,
					'email' => $email,
					'password' => md5($password)
					
				); 
							
				$this->load->model('register_model');
				$this->register_model->insert_person($insertdb);
				
				$dir = 'images/userimages/' . $username;
				$subdir_profileimg = 'images/userimages/' . $username . '/profileimg';
				$subdir_webimg = 'images/userimages/' . $username . '/portfolioimg';

				
				if(!is_dir($dir)){
					mkdir($dir);
				}
				
				if(!is_dir($subdir_profileimg)) {
					mkdir($subdir_profileimg);
				}
				
				if(!is_dir($subdir_webimg)) {
					mkdir($subdir_webimg);
				}
				
				
				//send email to user
				
				/* $config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'janzon.daniel@gmail.com',
				'smtp_pass' => 'sommarglass',
				);
				
				
				$this->load->library('Email', $config);
				$this->email->set_newline("\r\n");
				
				$this->email->from('janzon.daniel@gmail.com');
				$this->email->to($this->input->post('email'));
				
				$this->email->message('Här kommer dina användaruppgifter och aktiveringslänk till The Network');
				$this->email->subject('The Network');
	
				
				if ( ! $this->email->send()){
				
					show_error($this->email->print_debugger());
				}
				else{
				 */	
				 
					$this->load->view('register_success');	
				//}
			}
	
		} else {
			$this->load->view('register');	
		}
		
}		
		

//***************************************************************************************
	
// Login user
	
//**************************************************************************************
		
		
	function login() {
					
		if(isset($_POST['ajax']) && isset($_POST['submit'])) {
			
			$username = $_POST['value'][0];			
			$password = $_POST['value'][1];
						
			$validate_username = $this->validate_required($username);
			$validate_password = $this->validate_required($password);
			
			if ($validate_username || $validate_password) {
			
				$data = array(
					'validate_username'		=>	$validate_username,
					'validate_password'		=>	$validate_password
				);
				
				echo json_encode($data);
			}
			
			else {
							
				$this->load->model('login_model');
				$result = $this->login_model->validate();
				
				if ($result == TRUE) {
				
					$data['success'] = TRUE;
					$data['username'] = $username;
					
					$this->session->set_userdata($data);
							
								
					$this->load->model('onlinestatus_model');
					$this->onlinestatus_model->setonline();
					
					echo json_encode($data);
			
				}
				
				else {
					$data['errorlogin'] = 'fel lösenord';
					echo json_encode($data);
				}
			}
		}
		
		else {
		
			$this->load->view('login');
		}
	}



//***************************************************************************************
	
// Logout user
	
//**************************************************************************************


	function logout(){
				
		$this->load->model('onlinestatus_model');
		$this->onlinestatus_model->setoffline();
		$this->session->sess_destroy();
		redirect('main/');

	}


//***************************************************************************************




}







?>