<script>

$(function() {

$(".rounded").load(function() {
      
   $(this).wrap(function(){
      return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  
  
  });
  
});


</script>

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

<div id="membercontent">
	<div class="rounded" id="profilepic">
			
		<?php 	
		
			$firstname = $records[0]['firstname'];
			$lastname = $records[0]['lastname'];
			$username = $records[0]['username'];
			$personnummer = $records[0]['personnummer']; 
			$presentationheader = $records[0]['presentationheader']; 
			$presentation = $records[0]['presentation']; 
			$city = $records[0]['city'];
			$age = $records[0]['age'];
			$proffession = $records[0]['proffession'];
			$civil = $records[0]['civil'];
			
			switch ($civil) {
			
				case "1":
					$civil = 'Singel';
				break;
				
				case "2":
					$civil = 'Sambo';
				break;
				
				case "3":
					$civil = 'Särbo';
				break;
				
				case "4":
					$civil = 'Gift';
				break;	
			}
	
		?>
		
		
		<?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/network/images/userimages/$username/profileimg/thumbnail_.jpg")) { ?>
		
		<img class="rounded" src="/../network/images/userimages/<?php echo $username ?>/profileimg/thumbnail_.jpg" />
		
		<?php	} else { ?>
		
		<img class="rounded" src="/../network/images/userimages/default.jpg" />
	
		<?php } ?>
		
								
		</div>
		
		<div id="profilefact">
			<ul>
					<li><span id="facts">Namn: </span><span style="font-size: 10pt; font-family: helvetica"><?php echo $firstname . ' ' . $lastname?></span></li>
					<li><span id="facts">Ålder: </span><span style="font-size: 10pt; font-family: helvetica"><?php echo $age ?> år</span></li>
					<li><span id="facts">Bor: </span><span style="font-size: 10pt; font-family: helvetica"><?php echo $city ?></span></li>
					<li><span id="facts">Status: </span><span style="font-size: 10pt; font-family: helvetica"><?php echo $civil ?></span></li>
					<li><span id="facts">Yrke: </span><span style="font-size: 10pt; font-family: helvetica"><?php echo $proffession ?></span></li>
				</ul>
		
		<div id="facebookbtn">
			<fb:login-button autologoutlink="true" perms="publish_stream,user_photos, user_photo_video_tags,offline_access"
                        onlogin="window.location.reload(true);"></fb:login-button>
			</div>
		
		</div>
		
		<br />
		<hr style="border: 1px dotted gray; width: 620px;" />
		<br />
		<h2 id="networktype"><?php echo $presentationheader; ?></h2>
		<br />
		<p><?php echo $presentation; ?></p>
			
</div>










