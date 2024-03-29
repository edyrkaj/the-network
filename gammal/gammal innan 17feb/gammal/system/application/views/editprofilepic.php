<?php

error_reporting (E_ALL ^ E_NOTICE);
session_start(); //Do not remove this
//only assign a new timestamp if the session variable is empty
if (!isset($_SESSION['random_key']) || strlen($_SESSION['random_key'])==0){
    $_SESSION['random_key'] = strtotime(date('Y-m-d H:i:s')); //assign the timestamp to the session variable
	$_SESSION['user_file_ext']= "";
}
#########################################################################################################
# CONSTANTS																								#
# You can alter the options below																		#
#########################################################################################################

$password = $records[0]['password'];
$personnummer = $records[0]['personnummer'];

$upload_dir = $personnummer; 				// The directory for the images to be saved in
$upload_path = 'images/userimages/'.$upload_dir.'/profileimg/';	// The path to where the image will be saved
$large_image_prefix = "resize_"; 			// The prefix name to large image
$thumb_image_prefix = "thumbnail_";			// The prefix name to the thumb image
$large_image_name = $large_image_prefix;     // New name of the large image (append the timestamp to the filename)
$thumb_image_name = $thumb_image_prefix;     // New name of the thumbnail image (append the timestamp to the filename)
$max_file = "3"; 							// Maximum file size in MB
$max_width = "500";							// Max width allowed for the large image
$thumb_width = "100";						// Width of thumbnail image
$thumb_height = "100";						// Height of thumbnail image
// Only one of these image types should be allowed for upload
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
$allowed_image_ext = array_unique($allowed_image_types); // do not change this
$image_ext = "";	// initialise variable, do not change this.
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}



##########################################################################################################
# IMAGE FUNCTIONS																						 #
# You do not need to alter these functions																 #
##########################################################################################################

function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}

//Image Locations
$large_image_location = $upload_path.$large_image_name.$_SESSION['user_file_ext'];
$thumb_image_location = $upload_path.$thumb_image_name.$_SESSION['user_file_ext'];

// echo $large_image_location;

//Create the upload directory with the right permissions if it doesn't exist
if(!is_dir($upload_dir)){
//	mkdir($upload_dir, 0777);
//	chmod($upload_dir, 0777);
}

//Check to see if any images with the same name already exist
if (file_exists($large_image_location)){
	if(file_exists($thumb_image_location)){
		$thumb_photo_exists = "<img src=\"".$upload_path.$thumb_image_name.$_SESSION['user_file_ext']."\" alt=\"Thumbnail Image\"/>";
	}else{
		$thumb_photo_exists = "";
	}
   	$large_photo_exists = "<img src=\"".$upload_path.$large_image_name.$_SESSION['user_file_ext']."\" alt=\"Large Image\"/>";
} else {
   	$large_photo_exists = "";
	$thumb_photo_exists = "";
}

if (isset($_POST["upload"])) {

	$_SESSION['user_file_ext']= "";
	
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$userfile_type = $_FILES['image']['type'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
	
	//Only process if the file is a JPG, PNG or GIF and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		
		foreach ($allowed_image_types as $mime_type => $ext) {
			//loop through the specified image types and if they match the extension then break out
			//everything is ok so go and check file size
			if($file_ext==$ext && $userfile_type==$mime_type){
				$error = "";
				break;
			}else{
				$error = "<text class='errorpic'>endast filformaten ".$image_ext."är tillåtna</text><br />";
			}
		}
		//check if the file size is above the allowed limit
		if ($userfile_size > ($max_file*1048576)) {
			$error.= "<text class='errorpic'>Bilder måste vara under ".$max_file."MB</text><br />";
		}
		
	}else{
		$error= "<text class='errorpic'>Välj en bild</text><br />";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
		
			//this file could now has an unknown file extension (we hope it's one of the ones set above!)
			$large_image_location = $large_image_location.".".$file_ext;
			$thumb_image_location = $thumb_image_location.".".$file_ext;
			
			//put the file ext in the session so we know what file to look for once its uploaded
			$_SESSION['user_file_ext']=".".$file_ext;   
			
			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			//Delete the thumbnail file so the user can create a new one
			if (file_exists($thumb_image_location)) {
				unlink($thumb_image_location);
			}
		}
		//Refresh the page to show the new uploaded image
		redirect('../network/profile');
		exit();
	}
}

if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) {

	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	//Reload the page again to view the thumbnail
	redirect('../network/profile');
	exit();
}


if ($_GET['a']=="delete" && strlen($_GET['t'])>0){
//get the file locations 
	$large_image_location = $upload_path.$large_image_prefix.$_GET['t'];
	$thumb_image_location = $upload_path.$thumb_image_prefix.$_GET['t'];
	if (file_exists($large_image_location)) {
		unlink($large_image_location);
	}
	if (file_exists($thumb_image_location)) {
		unlink($thumb_image_location);
	}
	redirect('../network/profile');
	exit(); 
}
?>


<div id="maincontent_wrapper">
		
	<div id="v_leftmenucol">
		
		<ul id="limenu">
			<div class="homemenuheader"><a href=""><li class="menuheader">hem</li></a><li class="leftsubmenu">ladda upp en profilbild av dig själv att ha på din sida</li></div>
			<div class="leftmenu"><a href=""><li class="menuheader">profilbild</li></a><li class="leftsubmenu">ladda upp en profilbild av dig själv att ha på din sida</li></div>
			<div class="leftmenu"><a href=""><li class="menuheader">profiltext</li></a><li class="leftsubmenu">presentera dig själv och vad du kan för besökare</li></div>
			<div class="leftmenu"><a href=""><li class="menuheader">CV</li></a><li class="leftsubmenu">låt arbetsgivare se dina tidigare erfarenheter</li></div>
			<div class="leftmenu"><a href="<?php echo base_url();?>processimg/thumbalize"><li class="portfolio">portfolio</li></a><li class="leftsubmenu">visa upp arbetsprover som visar vad du kan</li></div>
			<div class="leftmenu"><a href=""><li class="menuheader">inställningar</li></a><li class="leftsubmenu">Inställningar för att ändra din ålder, hemort mm.</li></div>
		</ul>
	</div>
		
	<div id="v_rightcol">
		<div id="memberhome">
			<h3>Redigera profilbild</h3>
			<div id="line"></div>
		
			<?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/network/images/userimages/'. $personnummer . '/profileimg/thumbnail_.jpg')) { ?>
			
			<p>Det här är din nuvarande profilbild.</p>
			<p><a style="color:red; font-size: 8pt;" href="/../network/profile/erase">Klicka här för att bort din bild</a></p><br />		
		</div>
		
<?php	} else { ?>
		
		<p></p>
		<br />
	
<?php 	} ?>
			
			

<?php
//Only display the javacript if an image has been uploaded
if(strlen($large_photo_exists)>0){
		
$current_large_image_width = getWidth($large_image_location);
$current_large_image_height = getHeight($large_image_location);?>

<script type="text/javascript">

function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Du måste göra en markering först");
			return false;
		}else{
			return true;
		}
	});
}); 

$(window).load(function () { 
	$('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview }); 
});

</script>



<?php }?>

<?php
//Display error message if there are any
if(strlen($error)>0){
	echo "<ul><li class='errorpic'>Oops nånting gick fel...</li><li>".$error."</li></ul>";
}

if(strlen($large_photo_exists)>0 && strlen($thumb_photo_exists)>0){
	echo $large_photo_exists."&nbsp;".$thumb_photo_exists;
	echo '<br />';
	echo '<div style="color:red; font-size: 8pt;">Ny profilbild sparad</div>';
	echo '<br />';
	echo '<div><p style="float:left;"><a href="/../network/main/mypage">Tillbaka till din sida</a></p><img style=" float: left; margin-top: 5px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></div>';
	echo '<br />';
	echo '<br />';
	echo '<br />';
	//Clear the time stamp session and user file extension
	$_SESSION['random_key']= "";
	$_SESSION['user_file_ext']= "";
	$personnummer = "";

}else{
		if(strlen($large_photo_exists)>0){?>
		
		<?php // if (isset($_POST['upload'])) { ?>
		<p>Markera den del av den stora bilden som du vill ha med i din profilbild.<br /> Du ser en preview till höger. Sen klickar du på "spara tumnagel"</P><br />
		<div align="center" id="imageupload">
			<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext'];?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />
			<div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext'];?>" style="position: relative;" alt="Thumbnail Preview" />
			</div>
		
			<div style="clear:both;"></div>
			<form name="thumbnail" action="/../network/profile" method="post">
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" /><br />
				<input type="submit" name="upload_thumbnail" style="margin-top:0px; margin-bottom: 30px" class="submitthumb" value="Spara tumnagel" id="save_thumb" />
			</form>
		</div>
		
		<?php // } ?>
		
	</div>
	</div>

<?php 	} else { ?>
	
<?php echo $result;  ?>
	
	<?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/network/images/userimages/$personnummer/profileimg/thumbnail_.jpg")) { ?>
			
			<img class="rounded" src="/../network/images/userimages/<?php echo $personnummer ?>/profileimg/resize_.jpg" />
			
			<?php	} else { ?>
			
			<?php echo '<div style="color: red; font-size: 8pt;"> Du har för närvarnde ingen profilbild</div>'; ?>
		
			<?php } ?>
	
	<br />
	<div id="networktype">Ladda upp bild</div><br />
	<form name="photo" enctype="multipart/form-data" action="/network/profile" method="post">
		<input type="file" name="image" size="30" /> 
		<input style="margin-top: 15px" id="submit" type="submit" name="upload" value="Ladda upp" />
	</form>
	<br />
	<div><p style="float:left;"><a href="/../network/main/mypage">Tillbaka till din sida</a></p><img style=" float: left; margin-top: 6px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></div>
	<br />
	<br />
	<br />

	</div>
	
<?php  
	
	}
	}
?>
