<?php

class facebook_model extends CI_Model{
    

//**************************************************************************************
	
// Get userdata (accesstoken, session etc
	
//**************************************************************************************


	function get_facebook_cookie() {
			 
			 $app_id             = '163966170318988';
			 $application_secret = '97d932cb3962b5a130a611f48f6f092f';

			if(isset($_COOKIE['fbs_' . $app_id])){
			
		 //   print_r($_COOKIE['fbs_' . $app_id]);
			
					$args = array();
					parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
					ksort($args);
				   
				   $payload = '';
					
					foreach ($args as $key => $value) {
							if ($key != 'sig') {
							$payload .= $key . '=' . $value;
							}
					}
					if (md5($payload . $application_secret) != $args['sig']) {
							return null;
					}
				   
				   
				  // print_r($args);
				  
				   // Update db with users access token
				   $username = $this->session->userdata('username');
				   $data['fbaccess'] = $args['access_token'];
				   $this->db->where('username', $username);
				   $this->db->update('person', $data);
				   
				   
				   return $args;
			}
			else{
					return null;
			}
	}

  
  
//**************************************************************************************
	
// Get all registred info about user
	
//**************************************************************************************  
  
  		
  		
  		function getUser(){
                $cookie = $this->get_facebook_cookie();
                $user = @json_decode(file_get_contents(
                                'https://graph.facebook.com/me?access_token=' .
                                $cookie['access_token']), true);
                return $user;
        }

  
  
//**************************************************************************************
	
// Get Id of friends
	
//**************************************************************************************
  
  
  		function getFriendIds($include_self = TRUE){
                $cookie = $this->get_facebook_cookie();
                $friends = @json_decode(file_get_contents(
                                'https://graph.facebook.com/me/friends?access_token=' .
                                $cookie['access_token']), true);
                $friend_ids = array();
                foreach($friends['data'] as $friend){
                        $friend_ids[] = $friend['id'];
                }
                if($include_self == TRUE){
                        $friend_ids[] = $cookie['uid'];                 
                }       

                return $friend_ids;
        }

         

//**************************************************************************************
	
// Get all friends
	
//**************************************************************************************

         
         
         function getFriends($include_self = TRUE){
                $cookie = $this->get_facebook_cookie();
                $friends = @json_decode(file_get_contents(
                                'https://graph.facebook.com/me/friends?access_token=' .
                                $cookie['access_token']), true);
                
                if($include_self == TRUE){
                        $friends['data'][] = array(
                                'name'   => 'You',
                                'id' => $cookie['uid']
                        );                      
                }       

                return $friends['data'];
        }
        
        
        
//**************************************************************************************
	
// Get userimages from users albums
	
//**************************************************************************************        
        
        
	function getImages(){
		
		$cookie = $this->get_facebook_cookie();
		
		$images = '';
		
		//	echo $array['thumbalize'];										
			
			// Store fb-users information
			$cookie = $this->get_facebook_cookie();
		   
			if(!$cookie){
		   
				$session = $this->session->userdata('username');
				$this->db->where('username', $session);
				$this->db->select('fbaccess');
				$result = $this->db->get('person');	
				$cookie = $result->result_array();
				$cookie['access_token'] = $cookie[0]['fbaccess'];
				
			}
			
			$session = $this->session->userdata('username');
			$this->db->where('username', $session);
			$this->db->select('albumid');
			$result = $this->db->get('facebook');
			
			if ($result->num_rows() != 0) {
						
			$albums = $result->result_array();
						
			foreach ($albums as $album) {
						
				$photos[] = json_decode(file_get_contents('https://graph.facebook.com/' 	
				. $album['albumid'] . '/photos?access_token=' .
							$cookie['access_token'] . '&limit=200'), true);
			}
			
			// print_r($photos);
			 						
			
			foreach($photos as $photo) {
				foreach($photo as $p) {
				foreach($p as $value) {
				
				//	print_r($value);
				
					$fbimages[] = $value['source'];
					$fbthumbs[] = $value['picture'];
				}
			}
			}
			
			$fbarray['fbimages'] = $fbimages;
			$fbarray['fbthumbs'] = $fbthumbs;
			
		//	print_r($fbarray);
			
		//	print_r($images);
			return $fbarray;
		
				
        }
        }

     	
     	
     	
//**************************************************************************************
	
// Get users friendsarray
	
//**************************************************************************************    
     
     
     
     	function getFriendArray($include_self = TRUE){
                $cookie = $this->get_facebook_cookie();
                $friendlist = @json_decode(file_get_contents(
                                'https://graph.facebook.com/me/friends?access_token=' .
                                $cookie['access_token']), true);
                $friends = array();
                foreach($friendlist['data'] as $friend){
                        $friends[$friend['id']] = $friend['name'];
                }
                if($include_self == TRUE){
                        $friends[$cookie['uid']] = 'You';                       
                }       

                return $friends;
        }



//**************************************************************************************
	
// Get users albums
	
//**************************************************************************************    


function getalbums($array = 0){
                
		$cookie = $this->get_facebook_cookie();
										   
		  // Update database with fb-album-id
			$session = $this->session->userdata('username');
		   
		   // Insert or delete row depending on existing album or not
			$query = "SELECT * FROM facebook WHERE albumid ='" . $array['thumbalize'] . "'";
			$result = $this->db->query($query);
			$activealbums = $result->result_array();
			
			if ($result->num_rows() == 1) {
				$query = "DELETE FROM facebook WHERE albumid ='" . $array['thumbalize'] . "'";
				$this->db->query($query);
			}
			
			if($result->num_rows() == 0) {
				if ($array['thumbalize'] != 0) {
					$query = "INSERT INTO facebook (albumid, username) VALUES ('" . $array['thumbalize'] . "','" . $session . "')";					
					$this->db->query($query);
				}
			}
		   
		   if(!$cookie){
		   
				$session = $this->session->userdata('username');
				$this->db->where('username', $session);
				$this->db->select('fbaccess');
				$result = $this->db->get('person');	
				$cookie = $result->result_array();
				$cookie['access_token'] = $cookie[0]['fbaccess'];
				
			
			}
				
			
		
			   $albums = @json_decode(file_get_contents(
						'https://graph.facebook.com/me/albums?access_token=' .
						$cookie['access_token']), true);
				
				if($albums) {
							
				$albums = $albums['data'];
							
				foreach ($albums as $album) {
				
						$newalbum[] = $album;				
					}
				
								
				return $newalbum;
			}
			
			else {
			
			$newalbum = 0;
			return $newalbum;
			
        }
    }
        


//**************************************************************************************
	
// Get active albums
	
//**************************************************************************************    


	function getactivealbums() {
	
	
		// Update database with fb-album-id
		$session = $this->session->userdata('username');
	   
	   // Insert or delete row depending on existing album or not
		$query = "SELECT albumid FROM facebook WHERE username ='" . $session . "'";
		$result = $this->db->query($query);
		
		if ($result->num_rows() > 0) {
		
			$resultarray = $result->result_array();			
			return $resultarray;
		}
	}
	


//**************************************************************************************    


}

?>