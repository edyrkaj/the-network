<?PHP

class Email extends CI_Controller {
	
	
	function Email(){
	
		parent::Controller();
	}
	
	
	function index(){
	
		$this->load->view('newsletter.php');
	}
	
	
	function send (){
		
		$this->load->library('form_validation');
		
		// fieldname, error message, validation rules.
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('newsletter.php');
		}
		
		else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
		
			$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'janzon.daniel@gmail.com',
			'smtp_pass' => 'sommarglass',
			);
			
			
			$this->load->library('Email', $config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('janzon.daniel@gmail.com');
			$this->email->to($email);
			
			$this->email->message('test');
			$this->email->subject('test');
	
			
			$path = $this->config->item('server_root');
			$file = $path . "/project/attachment/test.txt";
			
			$this->email->attach($file);
			
			if ( ! $this->email->send()){
			
				show_error($this->email->print_debugger());
			}
			else{
				echo 'it worked';
			}
		}	
	}
}


?>