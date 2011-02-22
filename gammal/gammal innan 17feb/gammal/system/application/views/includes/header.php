<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8" />
	<title>The Network</title>
	<meta name="generator" content="BBEdit 9.6" />
	<link href="<?php echo base_url();?>style/style2.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>style/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>style/default.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>style/register.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>style/login.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>uploadify/uploadify.css" media="screen" type="text/css" />
	<link rel="stylesheet" type="text/css" src="<?php echo base_url(); ?>system/application/uploadify/uploadify.css"/>


	<script type="text/javascript" src="<?php echo base_url();?>script/jquery-pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery.imgareaselect.min.js"></script>
	<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>system/application/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/crossfade.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/script.js"></script>
	<script src="<?php echo base_url();?>script/raphael.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>script/g.raphael.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>script/g.pie.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>uploadify/swfobject.js" type="text/javascript" charset="utf-8"></script>
	

 
 <?php

$uploadpath = "";
$uploadpath = str_ireplace($_SERVER['DOCUMENT_ROOT'],"",realpath($_SERVER['SCRIPT_FILENAME']));
$uploadpath = str_ireplace("index.php","",$uploadpath);

//echo $uploadpath;

?>
<script type="text/javascript" language="javascript">
			$(document).ready(function()
			{
				$("#uploadifyit").uploadify({
							uploader: '<?php echo base_url(); ?>system/application/uploadify/uploadify.swf',
							script: '<?php echo base_url(); ?>system/application/uploadify/uploadify.php',
							cancelImg: '<?php echo base_url(); ?>system/application/uploadify/cancel.png',
							folder: '<?php echo $uploadpath; ?>images/userimages/<?php echo $personnummer; ?>/portfolioimg/',
							scriptAccess: 'always',
							multi: true,
							auto: true,
							fileExt : '*.jpg;*.gif;*.png',
							fileDesc : 'Image Files (.JPG, .GIF, .PNG)', 
							'onError' : function(a, b, c, d){
								if(d.status=404)
									alert('Could not find upload script');
								else if(d.type === "HTTP")
									alert('error'+d.type+": "+d.info);
								else if(d.type === "File Size")
									alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
								else
									alert('error'+d.type+": "+d.text);
							},
							'onComplete' : function(event,queueID,fileObj,response,data){
									$.post('<?php echo site_url('processimg/uploadify'); ?>',{filearray: response},function(info){ $("#fileinfotarget").append(info);});
							},
							'onAllComplete' : function(event,data){
								
							}
					
					
					
				});
			});
	
</script>
 

</head>
<body class="raphael" id="g.raphael.dmitry.baranovskiy.com">

<div id="rgstr_overlay">
	<div id='rgstr_container'>
		<a id='rgstr_close' href='#'></a>	
	</div>	
	<div id="rgstr_screen" ></div> 
</div>	


<div id="login_overlay">
	<div id='login_container'>
		<a id='login_close' href='#'></a>	
	</div>
	<div id="login_screen" ></div>
</div>


<div id="page_wrapper">
	<div id="wrapper_logga">
		<div id="logga"><?php echo anchor('/main/','<img src="/network/images/siteimages/logga.png" border="0" alt="logga">');?>
	</div>		

	<?php $this->load->view($menu); ?>
	
	<?php echo site_url(); ?>
	
	</div>
		<div id="digital_header"></div>
		<div id="sticker">
								
		</div>

<div id="content">