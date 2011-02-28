<?PHP

class Main extends CI_Controller {

	
//***************************************************************************************
	
// Load views to user (pass data to template.php)
	
//**************************************************************************************

	function index(){
		
		if ($this->session->userdata('username') == null) {
		
			$data = array(
			
			'personnummer'		=>	 null,
			'main_content'		=>	'front.php',
			'menu'				=>	'/includes/externmenu.php',
			
			);
			
		}
		
		elseif ($this->session->userdata('username') != null) {
		
			$data = $this->getdata();					
			$data = array(
			
			'main_content'		=>	'memberfront.php',
			'menu'				=>	'/includes/internmenu.php',
			'leftmenu'			=>	'/includes/leftmenu.php',
			'records'			=>	$data['records']
			
			);
			
		}
		
		$this->load->view('includes/template.php', $data);
	}



//***************************************************************************************
	
// Get data from person table
	
//**************************************************************************************



function getdata() {
	
			$this->load->model('profile_model');
			$result = $this->profile_model->get_profile();
			
			$data['records'] = $result;
			$data = array(
			
			'records'			=>	$data['records']
			);
			
			return $data;
	}



//***************************************************************************************
	
// Load mypage to user if loged in, otherwise load frontpage
	
//**************************************************************************************
	
	
	
	function mypage(){
		
		if ($this->session->userdata('username')) {
			
			$data = $this->getdata();			
			$data = array(
			
			'menu'			=>	'/includes/internmenu.php',
			'leftmenu'		=>	'/includes/leftmenu.php',
			'records'		=>	$data['records'],
			'main_content'	=>	'memberfront.php',
			'menu'			=>	'includes/internmenu.php'
			
		);
			
			$this->load->view('includes/template.php', $data);
			
		}
		
		else {
		
			redirect('main');
		
		}   
	
	}
	


//***************************************************************************************
	
// Check if user is online or not
	
//**************************************************************************************

	function checkonline($username=0){
	
		if (isset($_POST['ajax'])){
		
			$this->load->model('onlinestatus_model');
			$this->onlinestatus_model->checkonline($username);
		}	
	}
	
	
	
//***************************************************************************************
	
// Get ads on jobsearch-page (currently not working)
	
//**************************************************************************************
	
	
	function getad(){
	
		/*if (isset($_POST['ajax'])){
		
			$string = $this->input->post('string');
			$input = $this->input->post('input');
		
			$this->load->model('get_ads');
			$this->get_ads->getad($string, $input);
				
		}*/
	}
	
		
	
//***************************************************************************************
	
// Get name and counts from poll-table (survey on frontpage)
	
//**************************************************************************************
	

	function checkstat(){
	
		if (isset($_POST['ajax'])){
		
			$this->load->model('poll_model');
			$this->poll_model->checkstats();
			
		}	
	}
	
	
	
//***************************************************************************************
	
// Load main content on page depending on ajaxcall
	
//**************************************************************************************
	


	function getpagecontent() {


		if (isset($_POST['ajax'])){
			
			if ($this->session->userdata('username') == FALSE) {			
						
				switch($_POST['menuitem']) {
			
					case'0':
									
						$this->load->view('personinfo.php');
						$this->load->view('includes/footer.php');

					break;	
					
					case'2':
						$this->load->view('companyinfo.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'4':
						$this->load->view('statistik.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'6':
						$this->load->view('front.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'8':
						$this->load->view('front.php');
						$this->load->view('includes/footer.php');
					break;
					
					default: 
						$this->load->view('front.php');
						$this->load->view('includes/footer.php');
					break;

						
				}
			}
			
			else {
			
				switch($_POST['menuitem']) {
			
					case'1':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('searchpersons.php', $data);
						$this->load->view('includes/footer.php');
					break;	
										
					case'2':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('searchcompany.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'3':
					
						$this->load->model('get_ads');
						$districts = $this->get_ads->location();
						
						// $job = $this->get_ads->getad();
						// $data['job'] = $job;
						
						$data['districts'] = $districts;					
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('jobsearch.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'6':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('inbox.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'7':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('outbox.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					
					case'10':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('favpersons.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'11':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('favcompanies.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'13':
					
						$data = $this->getdata();
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('memberfront.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'15':
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('statistiklogedin.php', $data);
						$this->load->view('includes/footer.php');
					break;
						
					default: 
						$data['leftmenu'] = 'includes/leftmenu';
						$this->load->view('memberfront.php', $data);
						$this->load->view('includes/footer.php');
					break;
						
				}
			}	
		}
	}	
			


//***************************************************************************************
	
// Get page content from leftmenu
	
//**************************************************************************************

	
	function getleftpagecontent() {


		if (isset($_POST['ajax'])){
									
			switch($_POST['leftmenuheader']) {
		
				case'0':
								
					$data = $this->getdata();
					$data['leftmenu'] = 'includes/leftmenu';
					
					$this->load->view('memberfront.php', $data);
					$this->load->view('includes/footer.php');

				break;	
				
				case'1':
								
					$data = $this->getdata();
					$data['leftmenu'] = 'includes/leftmenu';
					
					$this->load->view('editprofilepic.php', $data);
					$this->load->view('includes/footer.php');

				break;	
				
				case'2':
							
					$data = $this->getdata();
					$data['leftmenu'] = 'includes/leftmenu';
					
					$this->load->view('editprofiletext.php', $data);
					$this->load->view('includes/footer.php');

				break;	
				
				case'3':
				
					$data = $this->getdata();
					$data['leftmenu'] = 'includes/leftmenu';

					$this->load->view('editprofilecv.php', $data);
					$this->load->view('includes/footer.php');
				break;
				
				case'4':
				
					$data = $this->getdata();
					$data['leftmenu'] = 'includes/leftmenu';

					$this->load->view('editprofilefacts.php', $data);
					$this->load->view('includes/footer.php');
				break;
				
				case'5':
					
					$data = $this->getdata();
					$data['leftmenu'] = 'includes/leftmenu';
				
					$this->load->view('editprofilefacts.php', $data);
					$this->load->view('includes/footer.php');
				break;
					
			}
		}
	}



//***************************************************************************************
	
// Insert data in poll-table when user votes
	
//**************************************************************************************
	

	
	function insertdata() {

		$this->load->model('poll_model');
		$this->poll_model->insertdb();
		$this->index();

	}
		
//***************************************************************************************
	
	
			
}


?>