<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Kent is Learning CodeIgniter - Test 1</title>
</head>
<body>
        
<fb:login-button autologoutlink="true" perms="publish_stream,user_photos, user_photo_video_tags,offline_access"
                        onlogin="window.location.reload(true);"></fb:login-button>

<?php
        if(isset($user)){
?>
                <p style='background-color:yellow;'>Right click and view page
                source to see a more readable screen</p>
<?php
                print_r($user);         
        }
        else{
?>
             <!--   <p>If you don't log in, you can't see the magic</p> -->
                
<?php
        }
?>


<div style="width:600px;">
<?php if(isset($friends)){
        foreach($friends as $friend){ 
?>
                <img src="http://graph.facebook.com/<?=$friend['id'];?>/picture" 
 		                     title="" />   
<?php
        }       
}
?>
</div>


<div style="width:600px;">
<?php 

	foreach($albums as $album) {
				
		switch ($album['name']) {
		
			case "Id":
			
				$album['name'] = 'Loggfoton';
			break;
			
			case "Wall Photos":
			
				$album['name'] = 'Väggbilder';
			break;
			
			case "Mobile Uploads":
			
				$album['name'] = 'Mobiluppladdningar';
			break;
			
			case "Profile Pictures":
			
				$album['name'] = 'Profilbilder';
			break;
			
		}
		
		echo $album['name'];
		echo '<br />';
		echo '<br />';

	}

	if(isset($images)){
           
        //  print_r($images); 
           
        foreach ($images as $image) {
        
       // print_r($image['data']);
        
			foreach ($image as $link){
			
				foreach($link as $value) {
			
					echo '<img src="' . $value['source'] . '"/>';
					echo '<br />';
				}
			}
		}
    }
?>
          

</div>


<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '163966170318988', status: true, cookie: true, xfbml: true});
  FB.Event.subscribe('auth.sessionChange', function(response) {
    if (response.session) {
      // A user has logged in, and a new cookie has been saved
        window.location.reload(true);
    } else {
      // The user has logged out, and the cookie has been cleared
    }
  });
</script>
</body>
</html>