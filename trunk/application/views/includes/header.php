<!DOCTYPE html>
<html lang="sv" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta charset="utf-8" />
	<title>The Network</title>
	<meta name="generator" content="BBEdit 9.6" />
	
	
	<!-- Fancybox css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/gallery.css" />
	
	<!-- Egen css -->
	<link href="<?php echo base_url();?>style/style2.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- CSS för dropdoxn menu -->
	<link href="<?php echo base_url();?>style/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>style/default.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- CSS för registrering och login -->
	<link rel="stylesheet" href="<?php echo base_url();?>style/register.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>style/login.css" media="screen" type="text/css" />
	
	<!-- CSS för uploadify -->
	<link rel="stylesheet" href="<?php echo base_url();?>uploadify/uploadify.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>style/style.css" media="screen" type="text/css" />
	
	
	<!-- Jquery default -->
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery-1.4.3.min.js"></script>
	
	<!-- Jquery UI -->
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery-ui-1.8.6.custom.min.js"></script>
	
	<!-- Jquery - fancybox -->
	<script src="<?php echo base_url();?>script/jquery.fancybox-1.3.4.pack.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>script/jquery.easing-1.3.pack.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>script/jquery.mousewheel-3.0.4.pack.js" type="text/javascript" charset="utf-8"></script>

	<!-- Jquery-script för uploadify -->
	<script type="text/javascript" src="<?php echo base_url();?>script/swfobject.js"></script>
	<script src="<?php echo base_url();?>script/jquery.uploadify.v2.1.0.min.js" type="text/javascript" charset="utf-8"></script>

	<!-- Jquery-script för imagearea-select -->
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery.imgareaselect.min.js"></script>
		
	<!-- Jquery-script för animering på framsida -->
	<script type="text/javascript" src="<?php echo base_url();?>script/crossfade.js"></script>
	
	<!-- Raphael -->
	<script src="<?php echo base_url();?>script/raphael.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>script/g.raphael.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url();?>script/g.pie.js" type="text/javascript" charset="utf-8"></script>
	
	<!-- Post message to Facebook wall-->
	<script src="http://connect.facebook.net/en_US/all.js"></script>

	<!-- Eget script -->
	<script type="text/javascript" src="<?php echo base_url();?>script/script.js"></script>



<?php

$uploadpath = "";
$uploadpath = str_ireplace($_SERVER['DOCUMENT_ROOT'],"",realpath($_SERVER['SCRIPT_FILENAME']));
$uploadpath = str_ireplace("index.php","",$uploadpath);

$username = $this->session->userdata('username');



if(isset($records)) {
	$personnummer = $records[0]['personnummer'];
}

?>

<script type="text/javascript" language="javascript">
			$(document).ready(function()
			{
				
				$("#uploadifyit").uploadify({
							uploader: '<?php echo base_url(); ?>uploadify/uploadify.swf',
							height: '28px',
							script: '<?php echo base_url(); ?>uploadify/uploadify.php',
							cancelImg: '<?php echo base_url(); ?>uploadify/cancel.png',
							folder: '/images/userimages/<?php echo $username ?>/portfolioimg/',
							scriptAccess: 'always',
							multi: true,
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

<script type="text/javascript">
		$(document).ready(function() {
			
			
			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'easingIn'			: 'swing',
				'easingOut'			: 'swing',
				'speedIn'			: 300,
				'speedOut'			: 300,
				'titlePosition' 	: 'over',
				'title'				: this.title,

				'onComplete'	:	function() {
					$("#fancybox-wrap").hover(function() {
					$("#fancybox-title").show();
					}, function() {
					$("#fancybox-title").hide();
					});
					},
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Bild ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
</script>


</head>

<body class="raphael" id="g.raphael.dmitry.baranovskiy.com">
                        

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
		<div id="logga"><?php echo anchor('main/mypage','<img src="/network/images/siteimages/logga.png" border="0" alt="logga">');?>
	</div>		

	<?php $this->load->view($menu); ?>
	
	<?php echo site_url(); ?>
	
	</div>
		<div id="digital_header"></div>
		<div id="sticker">
								
		</div>

<div id="content">