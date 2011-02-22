<?PHP

class Main extends Controller {

	
//***************************************************************************************
	
// Load views to user (pass data to template.php)
	
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
	
	
	function index(){
		
		if ($this->session->userdata('username') == null) {
			
			global $data;
			$data = array(
			
			'main_content'		=>	'front.php',
			'menu'				=>	'/includes/externmenu.php'	
			);
			
		}
		
		elseif ($this->session->userdata('username') != null) {
		
			global $data;

			$this->load->model('profile_model');
			$result = $this->profile_model->get_profile();
			
			$data['records'] = $result;
			
			$data = array(
			
			'main_content'		=>	'memberfront.php',
			'menu'				=>	'/includes/internmenu.php',
			'records'			=>	$data['records'],
			'css'	=>	'<link rel="stylesheet" type="text/css" href="'.base_url().'uploadify/uploadify.css" />',
			'src'	=>	'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
						<script type="text/javascript" language="javascript" src="'. base_url().'uploadify/jquery.uploadify.v2.1.4.min.js"></script>'
		
			);
			
		}
		
		$this->load->view('includes/template.php', $data);
	}



//***************************************************************************************
	
// Load mypage to user if loged in, otherwise load frontpage
	
//**************************************************************************************
	
	
	
	function mypage(){
		
		if ($this->session->userdata('username')) {
			
			$this->load->model('profile_model');
			$result = $this->profile_model->get_profile();
			
			$value = $this->getdata();
			$personnummer = $value['records'][0]['personnummer'];
			
			global $data;
			$data['records'] = $result;
			
			$data = array(
			
			'main_content'		=>	'memberfront.php',
			'menu'				=>	'/includes/internmenu.php',
			'records'			=>	$data['records'],
			'personnummer'	=> $personnummer,
			'main_content'	=>	'memberfront.php',
			'menu'	=>	'includes/internmenu.php',
			'css'	=>	'<link rel="stylesheet" type="text/css" href="'.base_url().'uploadify/uploadify.css" />',
			'src'	=>	'<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
						<script type="text/javascript" language="javascript" src="'. base_url().'uploadify/jquery.uploadify.v2.1.4.min.js"></script>'
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
	
	

	function getads(){
	
		if (isset($_POST['ajax'])){
		
			$this->load->model('get_ads');
			$this->ad_modell->getads();
			
			
		}
		
	}
	
	
	
	
//***************************************************************************************
	
// Get name and counts from poll-tabel (survey on frontpage)
	
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
						$this->load->view('searchpersons.php');
						$this->load->view('includes/footer.php');
					break;	
										
					case'2':
						$this->load->view('searchcompany.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'3':
						$this->load->view('jobsearch.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'6':
						$this->load->view('inbox.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'7':
						$this->load->view('outbox.php');
						$this->load->view('includes/footer.php');
					break;
					
					
					case'10':
						$this->load->view('favpersons.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'11':
						$this->load->view('favcompanies.php');
						$this->load->view('includes/footer.php');
					break;
					
					case'13':
					
						$data = $this->getdata();
					
						$this->load->view('memberfront.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'15':
						$this->load->view('statistiklogedin.php');
						$this->load->view('includes/footer.php');
					break;
						
					default: 
						$this->load->view('memberfront.php');
						$this->load->view('includes/footer.php');
					break;
						
				}
			}	
		}
	}	
			


//***************************************************************************************
	
// Get left page content
	
//**************************************************************************************

	
	function getleftpagecontent() {


		if (isset($_POST['ajax'])){
									
				switch($_POST['leftmenuheader']) {
			
					case'0':
									
						$data = $this->getdata();
						
						$this->load->view('memberfront.php', $data);
						$this->load->view('includes/footer.php');

					break;	
					
					case'1':
									
						$data = $this->getdata();
						
						$this->load->view('editprofilepic.php', $data);
						$this->load->view('includes/footer.php');

					break;	
					
					case'2':
								
						$data = $this->getdata();
						
						$this->load->view('editprofiletext.php', $data);
						$this->load->view('includes/footer.php');

					break;	
					
					case'3':
					
						$data = $this->getdata();

						$this->load->view('editprofilecv.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'4':
					
						$data = $this->getdata();

						$this->load->view('editprofilefacts.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
					case'5':
						
						$data = $this->getdata();
					
						$this->load->view('editprofilefacts.php', $data);
						$this->load->view('includes/footer.php');
					break;
					
				}
			}
		}



//***************************************************************************************
	
// Get memberpage content
	
//**************************************************************************************
	
function getmemberpagecontent() {


		if (isset($_POST['ajax'])){
									
				switch($_POST['menupagelink']) {
			
					case'0':
									
						$data = $this->getdata();
						
						$this->load->view('presentation.php', $data);
					break;	
					
					case'1':
									
						$data = $this->getdata();
						
						$this->load->view('cv.php', $data);

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