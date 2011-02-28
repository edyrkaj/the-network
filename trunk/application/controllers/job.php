<?PHP

class Job extends CI_Controller {

	 function __construct(){
                parent::__construct();
                $this->load->model('get_ads');
        }

	function index(){	

		if ($this->session->userdata('username') == null) {	
			$data = array(			
			'main_content'		=>	'jobsearch.php',
			'menu'				=>	'/includes/externmenu.php',			
			);			
		}
		
		elseif ($this->session->userdata('username') != null) {		
			$data = $this->getdistricts();					
			$data = array(			
			'main_content'		=>	'jobsearch.php',
			'menu'				=>	'/includes/internmenu.php',
			'leftmenu'			=>	'/includes/leftmenu.php',
			'districts'			=>	$data['districts']			
			);			
		}
		
		$this->load->view('includes/template.php', $data);
	}

	function jobs(){
			$jobs = array();
			$jobs['jobs'] = $this->get_ads->getad();
			$this->load->view('jobsearch',$jobs);
	}
	
