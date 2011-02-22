<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>uploadify + codeigniter Demo</title>
<?php echo $css; ?>
<?php echo $src; ?>
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
							folder: '<?php echo $uploadpath; ?>system/application/uploads',
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
									$.post('<?php echo site_url('welcome/uploadify'); ?>',{filearray: response},function(info){ $("#fileinfotarget").append(info);});
							},
							'onAllComplete' : function(event,data){
								
							}
					
					
					
				});
			});
	
</script>

</head>
<body>
	<h1>Uploadify + CodeIgniter Example</h1>
	
	<?php echo form_open_multipart('upload/index'); ?>
	
	<p>
			<label for="Filedata">Choose files</label><br/>
			<?php echo form_upload(array('name'=>'Filedata','id'=>'uploadifyit')); ?>
			<a href="javascript:$('#uploadifyit').uploadifyUpload();">Upload File(s)</a>
	</p>
	
	<?php form_close(); ?>
	
	<div id="fileinfotarget">
	</div>
	
</body>
</html>