<?PHP

Class Facebook extends CI_controller {
	
	 function __construct(){
                parent::__construct();
                $this->load->model('facebook_model');
        }
		
	function index() {
	
        $cookie = $this->facebook_model->get_facebook_cookie();
        print_r($cookie);
        $this->load->view('facebookview');

	}

	function test1(){
			$data = array();
			$data['friends'] = $this->facebook_model->getFriends();
			$this->load->view('facebookview',$data);
	}
	
	function test2(){
			$data = array();
			$posts['images'] = $this->facebook_model->getImages();
						
			$this->load->view('facebookview',$posts);
	}
	
	function test3(){
			$data = array();
			$newalbum['albums'] = $this->facebook_model->getalbums();
							
			$this->load->view('facebookview',$newalbum);
	}
}



