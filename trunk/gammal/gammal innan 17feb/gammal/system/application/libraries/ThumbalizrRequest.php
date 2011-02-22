<?php if ( !defined("_THUMBALIZR") ) die ("no access");

class ThumbalizrRequest {
		
	var $CI;
	
	function __construct($data) { 
		
		$this->CI =& get_instance();
		
		$this->api_key=$data['api_key'];
		$this->service_url=$data['service_url'];
		$this->use_local_cache=$data['use_local_cache'];
		$this->local_cache_dir=$data['local_cache_dir'];
		$this->img_target_dir = $data['img_target_dir'];
		$this->local_cache_expire=$data['local_cache_expire'];		
		$this->encoding=$data['encoding'];
		$this->quality=$data['quality'];
		$this->delay=$data['delay'];
		$this->bwidth=$data['bwidth'];
		$this->mode=$data['mode'];
		$this->bheight=$data['bheight'];
		$this->width=$data['width'];	
	}

	private function build_request($url) {
		$this->request_url=
		$this->service_url."?".
		"api_key=".$this->api_key."&".
		"quality=".$this->quality."&".
		"width=".$this->width."&".
		"encoding=".$this->encoding."&".
		"delay=".$this->delay."&".
		"mode=".$this->mode."&".
		"bwidth=".$this->bwidth."&".
		"bheight=".$this->bheight."&".
		"url=".$url;
		$this->local_cache_file=md5($url)."_bigthumb.".$this->encoding;
		$this->local_cache_thumb=md5($url)."_smallthumb.".$this->encoding;
		$this->local_cache_subdir=$this->local_cache_dir;
		$this->local_img_target_dir=$this->img_target_dir;		

	}
	
	
	function request($url) { 
		$this->build_request($url);
		if (file_exists($this->local_cache_subdir."/".$this->local_cache_file)) { 
			$filetime=filemtime($this->local_cache_subdir."/".$this->local_cache_file);
			$cachetime=time()-$filetime-($this->local_cache_expire*60*60);
		} else {
			$cachetime=-1;
		}
		if (!file_exists($this->local_cache_subdir."/".$this->local_cache_file) || $cachetime>=0 ) {
			$this->img= file_get_contents($this->request_url);
			$headers="";
			foreach($http_response_header as $tmp) {
		 		if (strpos($tmp,'X-Thumbalizr-')!==false) { 
		 			$tmp1=explode('X-Thumbalizr-',$tmp); $tmp2=explode(': ',$tmp1[1]); $headers[$tmp2[0]]=$tmp2[1]; 
		 		}
			}	
			$this->headers= $headers;		
			$this->save();
		} else {
			$this->img= file_get_contents($this->local_cache_subdir."/".$this->local_cache_file);
			$this->headers['URL']= $url;
			$this->headers['Status']= 'LOCAL';		
		}
	}
	
	private function save() { 
				
		if ($this->img && $this->use_local_cache===TRUE && $this->headers['Status']=="OK") {
			if (!file_exists($this->local_cache_subdir)) { mkdir($this->local_cache_subdir); }
			if (!file_exists($this->local_img_target_dir)) { mkdir($this->local_img_target_dir); }
			
	 		$fp=fopen($this->local_cache_subdir."/".$this->local_cache_file,'w');
	 		$fi=fopen($this->local_img_target_dir."/".$this->local_cache_thumb,'w');
	 		fwrite($fp,$this->img);
	 		fwrite($fi, $this->img);
	 		fclose($fp);
	 		fclose($fi);
			
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
	
	
	function output($sendHeader = true,$destroy = true) {  
		if ($this->img) {
			if ($sendHeader) {
				if ($this->encoding=="jpg") {
					header("Content-type: image/jpeg");
				} else {
					header("Content-type: image/png");
				}
				foreach($this->headers as $k=>$v) {
					header("X-Thumbalizr-".$k.": ".$v);
				}
			}
			echo $this->img;				
			if ($destroy) {
				$this->img= false;
			}
		} else {
			return false;
		}
	}

}
?>