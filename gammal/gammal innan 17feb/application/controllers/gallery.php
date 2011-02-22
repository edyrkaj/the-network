<?PHP

Class Gallery extends CI_Controller {

	
//***************************************************************************************
	
// Show portfolio gallery
	
//**************************************************************************************	
	
	
	function index() {
	
		$data = $this->getdata();		
		$personnummer = $data['records'][0]['personnummer'];
				
		$uploadpath = "";
		$uploadpath = $_SERVER['DOCUMENT_ROOT'];
		$uploadpath = str_ireplace("index.php","",$uploadpath);
		
		$image_dir = 'images/userimages/' . $personnummer . '/portfolioimg/';
		$per_column = 5;
		
		$data = array(
		'image_dir'			=> 	$image_dir,
		'per_column'		=> 	$per_column,
		'main_content'		=>	'editprofilegallery.php',
		'menu'				=>	'/includes/internmenu.php',
		'leftmenu'			=>	'/includes/leftmenu.php',
		'records'			=>	$data['records']
		
		
		);
		
		$this->load->view('includes/template.php', $data);
	
	}
	
	
//***************************************************************************************
	
// Get information from person table
	
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
	
// Get memberpage content
	
//**************************************************************************************
	

function getmemberpagecontent() {


		if (isset($_POST['ajax'])){
					
		$data = $this->getdata();		
		$personnummer = $data['records'][0]['personnummer'];
		
		$uploadpath = "";
		$uploadpath = $_SERVER['DOCUMENT_ROOT'];
		$uploadpath = str_ireplace("index.php","",$uploadpath);
		
		$image_dir = 'images2/';
		$per_column = 5;
		$script = '<script>' . base_url() . 'script/jquery.fancybox-1.3.4.pack.js" type="text/javascript" charset="utf-8"></script>';
		
		$data = array(
		'image_dir'			=> 	$image_dir,
		'per_column'		=> 	$per_column,
		'main_content'		=>	'gallery.php',
		'menu'				=>	'/includes/internmenu.php',
		'leftmenu'			=>	'/includes/leftmenu.php',
		'script'			=> 	$script
		
		);
	
					
				switch($_POST['menupagelink']) {
			
					case'0':
									
						$data = $this->getdata();
						
						$this->load->view('presentation.php', $data);
					break;	
					
					case'1':
									
						$data = $this->getdata();
						
						$this->load->view('cv.php', $data);

					break;	
					
					case'2':
									
		
						
						$this->load->view('gallery.php', $data);

					break;	
					
				}
			}
		}




//***************************************************************************************
	
// Erase gallery pics
	
//**************************************************************************************


	function erasegallery() {
	
	$deletethumb = $this->input->post('deleteArea');
	echo $deletethumb;
	$deleteimage = str_replace('-thumb', '', $deletethumb);
	unlink($deletethumb);
	unlink($deleteimage);
	
	}







}


?>