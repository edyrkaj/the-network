<?php


Class Processimg extends Controller {
	
	function __construct() {
	
		parent::__construct();
		
	
	if ($this->input->post('submitthumb')) {
	
		$value = $this->getdata();
		$personnummer = $value['records'][0]['personnummer'];
		
		define ("_THUMBALIZR",1);
		
		$url = $this->input->post('thumbwebsite');
		
		$data= array(
			'api_key'			=>		'd54fc53f8aa00df6ad24a6e1e7de0edc', 
			'service_url'		=>		'http://api.thumbalizr.com/', 
			'use_local_cache'	=>		TRUE, 
			'local_cache_dir'	=>		'images/userimages/' . $personnummer . '/portfolioimg', 
			'img_target_dir'	=>		'cache',		
			'local_cache_expire'=>		'12', 
			'width'				=>		'750', 
			'delay'				=>		'1', 
			'encoding'			=>		'jpg', 
			'quality'			=>		'90', 
			'bwidth'			=>		'1280', 
			'mode'				=>		'screen', 
			'bheight'			=>		'1024' 
		);
			
		
		$this->load->library('ThumbalizrRequest', $data);
		$this->thumbalizrrequest->request($url);	
		
		$data['personnummer'] = $personnummer;
		$data['main_content'] = 'editprofileportfolio.php';
		$data['menu'] = 'includes/internmenu.php';
		$data['error'] = 'något gick fel, försök igen om en liten stund';
	
	
		if ($this->thumbalizrrequest->headers['Status']=="OK" || $this->thumbalizrrequest->headers['Status']=="LOCAL") { // if picture is available
			$data['personnummer'] = $personnummer;
			$data['confirmation'] = 'bild av webbsidan sparad!';
			$data['error'] = '';
			$this->load->view('includes/template.php', $data);
	
	
		} else {
			$data['personnummer'] = $personnummer;
			$data['confirmation'] = '';
			$data['error'] = 'Webbsidan är registrerad och genereras...den är snart tillägnglig.<br />Kom tillbaka om en stund och skriv in samma webbadress för<br />att ladda hem din bild!';
			$this->load->view('includes/template.php', $data);	
		}  	
	}	
}


//**************************************************************************************************

	// Communicate with uploadify

//*************************************************************************************************



	function uploadify() {
		
		// $this->load->model('resize');
		
		$file = $this->input->post('filearray');
		
		// print_r($file);
		
		$data['json'] = json_decode($file);
		$this->load->view('uploadify',$data);
	}
	

	function index() {
		
	}


//**************************************************************************************************

	// Get data from persontable

//**************************************************************************************************



	function getdata() {
	
			$this->load->model('profile_model');
			$result = $this->profile_model->get_profile();
			
			$data['records'] = $result;
			$data = array(
			
			'records'			=>	$data['records']
			);
			
			return $data;
	}



//**************************************************************************************************

	// Create webthumb with thumbalizr

//**************************************************************************************************

	function thumbalize() {
		
		$value = $this->getdata();
		$personnummer = $value['records'][0]['personnummer'];

		$data['personnummer'] = $personnummer;
		$data['main_content'] = 'editprofileportfolio.php';
		$data['menu'] = 'includes/internmenu.php';
		$data['error'] = 'något gick fel, försök igen om en liten stund';
		
		$this->load->view('includes/template.php', $data);
	}


//**************************************************************************************************

	
}