<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8" />
	<title>newsletter</title>


<style type=text/css>

	label {display:block};
	
</style>


</head>

<body>

<div>
	<?php echo form_open('email/send'); ?>   <!-- specifies where the form will be sent (our emailclass/controller) -->
	
<?php
	
	$name_data = array(
	
		'name' => 'name',
		'id' => 'name',
		'value' => set_value('name')	
	);	
?>
	
	<p><label for='name'>Name:</label>
	<?php echo form_input($name_data); ?>
	
	<p><label for='email'>Email:</label>
	<input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" /></p>
	
	<p><?php echo form_submit('submit', 'submit'); ?></p>
	
	<?php echo form_close(); ?>
	
	<?php echo validation_errors('<p class="error">'); ?>

</body>
</html>
