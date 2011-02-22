<?PHP


Class Resize extends Model {

		
	function index() {
	
		$sourceimage = $this->local_cache_subdir."/".$this->local_cache_file;
		$thumbimage = $this->local_cache_subdir."/thumbs/".$this->local_cache_thumb;
		
		$config = array(
		
			'source_image'		=>	$sourceimage,
			'new_image'			=>	$thumbimage,
			'make_thumb'		=>	true,
			'maintain_ration'	=>	true,
			'width'				=>	250,
			'height'			=>	200
		
		);
		
		
		$this->CI->load->library('image_lib', $config);
		$this->CI->image_lib->resize();
	}

}

?>