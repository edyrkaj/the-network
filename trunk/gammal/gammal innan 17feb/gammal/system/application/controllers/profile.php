<?php

Class Profile extends Controller {

	
		
//***************************************************************************************
	
// Generates the edit page for the profile image. Sends the person table data to view
	
//**************************************************************************************
	
	function index() {
	
		$this->load->model('profile_model');
		if ($query = $this->profile_model->get_profile()) {
		
			$data['records'] = $query;
		
		}
				
		$data = array(
		
			'main_content'	=>	'editprofilepic.php',
			'menu'			=>	'includes/internmenu.php',
			'records'		=>	$data['records']
		);
		
		$this->load->view('includes/template.php', $data);
	}



//***************************************************************************************
	
// Erases the profile image and the profile thumbnail from the directory
	
//**************************************************************************************



	function erase() {
	
	$this->load->model('profile_model');
	
	$query = $this->profile_model->get_profile();	
	$personnummer = $query[0]['personnummer'];
				
	unlink('../network/images/userimages/' . $personnummer . '/profileimg/thumbnail_.jpg');
	unlink('../network/images/userimages/' . $personnummer . '/profileimg/resize_.jpg');
		
	redirect('profile/');
	
	}



	
//***************************************************************************************
	
// Shows the edit profiletext page. Sends profiletext and profiletextheader to view
	
//**************************************************************************************
	
	
	
	function profiletext() {
	
		$this->load->model('profile_model');
		$query = $this->profile_model->get_profile();
		
		$data['records'] = $query;
		
		$data = array(
		
			'main_content'	=>	'editprofiletext.php',
			'menu'			=>	'includes/internmenu.php',
			'records'		=>	$data['records']

		);
		
		$this->load->view('includes/template.php', $data);
	
	}
	
	
	
//***************************************************************************************
	
// Shows the edit profiletext page. Sends profiletext and profiletextheader to view
	
//**************************************************************************************
	
	
	
	function profilefacts() {
	
		$this->load->model('profile_model');
		$query = $this->profile_model->get_profile();
		
		$data['records'] = $query;
		
		$data = array(
		
			'main_content'	=>	'editprofilefacts.php',
			'menu'			=>	'includes/internmenu.php',
			'records'		=>	$data['records']

		);
		
		$this->load->view('includes/template.php', $data);
	
	}
	
//***************************************************************************************
	
// Sends back CV information to view
	
//**************************************************************************************
	
	
	
/* 	function getCV() {
	
		$this->load->model('profile_model');
		$query = $this->profile_model->get_cv();
		
		$data['records'] = $query;
		
		$data = array(
		
			'main_content'	=>	'editprofilecv.php',
			'menu'			=>	'includes/internmenu.php',
			'records'		=>	$data['records']

		);
		
		$this->load->view('includes/template.php', $data);
	
	}
 */
	
	

//***************************************************************************************
	
// Updates the profile text in database.
	
//**************************************************************************************

		
	
	function insertprestext() {
	
		$this->load->model('profile_model');
		
		$presheader = $this->input->post('presheader');
		$prestext = $this->input->post('prestext');
		
		$data = array(
		
			'presentationheader'	=>	$presheader,
			'presentation'			=>	nl2br($prestext)	
		
		);
		

		$this->profile_model->insertpres($data);
		$this->profiletext();
	}


//***************************************************************************************
	
// Updates the profile facts
	
//**************************************************************************************

		
	
	function insertpersfacts() {
	
		$this->load->model('profile_model');
		
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$street = $this->input->post('street');
		$coadress = $this->input->post('coadress');
		$postalcode = $this->input->post('postalcode');
		$city = $this->input->post('city');
		$phone = $this->input->post('phone');
		$age = $this->input->post('age');
		$drivinglicence = $this->input->post('drivinglicence');
		$gender = $this->input->post('gender');
		$civil = $this->input->post('civil');
		$proffession = $this->input->post('proffession');

		
		$data = array(
		
			'firstname'			=>	$firstname,
			'lastname'			=>	$lastname,
			'street'			=>	$street,	
			'coadress'			=>	$coadress,	
			'postalcode'		=>	$postalcode,	
			'city	'			=>	$city,	
			'phone'				=>	$phone,	
			'age'				=>	$age,	
			'drivinglicence'	=>	$drivinglicence,
			'gender'			=>	$gender,
			'civil'				=>	$civil,
			'proffession'		=>	$proffession
		);
		

		$this->profile_model->insertpres($data);
		$this->profilefacts();
	}


//***************************************************************************************
	
// Inserts CV information
	
//**************************************************************************************

		
	
	function insertcv() {
	
		$this->load->model('profile_model');
		
		$edulevel = $this->input->post('edulevel');
		$eduname = $this->input->post('eduname');
		$schoolname = $this->input->post('schoolname');
		$edustart = $this->input->post('edustart');
		$eduend = $this->input->post('eduend');
		

		
		$data = array(
		
			'edu_level'			=>	$edulevel,
			'name'				=>	$eduname,
			'school'			=>	$schoolname,	
			'startdate'			=>	$edustart,	
			'enddate'			=>	$eduend	
		);
		

		$this->profile_model->insert_edu($data);
		$this->getedu();
	}


//***************************************************************************************
	
// retrieving and displaying cv education info
	
//**************************************************************************************
	
	function getedu(){
		$this->load->model('profile_model');
		$result = $this->profile_model->get_edu();
		echo json_encode($result);
	
	}

}


//***************************************************************************************



?>