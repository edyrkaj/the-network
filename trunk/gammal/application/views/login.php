<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
	<!--<link rel="stylesheet" href="<?php echo base_url();?>style/register.css" media="screen" type="text/css" />-->
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/login.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/script.js"></script>

	<style>
				
		
		body {
		
		font-family: Arial, Helvetica, Verdana, sans-serif;
		padding: 20px 0px 0px 30px;
		
		}
		
		li {
		 list-style-type:none; 
		 margin: 0px 0px 5px 0px;
		 font-size: 12px
		}

		 h1 {
		 margin: 1px 0px 10px 40px;
		 font-size:medium;
		}
		
		
		
		input.rounded {
		border: 0;
		background: url("../images/assets/textround.gif") top left no-repeat;
		width: 190px;
		height: 25px;
		padding: 3px 5px;
		font-size: 85%;
		color: #999999; 
		}
		
		#submit{
		background-color: gray;
		color: white;
		padding: 2px;
		background:#FFFFf;
		background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#424040), to(#5d5c5c));
		background:-moz-linear-gradient(0% 90% 90deg, #424040, #5d5c5c);		
		font-size:10px;
		text-decoration:none;
		display:block;
		width:100px;
		height: 20px;
		border:1px solid gray;
		text-align:center;
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		-o-border-radius:3px;
		border-radius:3px;
		cursor: pointer;
		margin-top: 20px;
		-webkit-transition: all .4s ease-in-out;
		-moz-transition: all .4s ease-in-out;
		-o-transition: all .4s ease-in-out;
		transition: all .4s ease-in-out;
		}

		
		.error {

		float: right;
	
		font-size: 7.5pt;
	
		color: red;
	
		margin: 5px 20px 0px 0px;
	
		width: 85px;

		}


	
	</style>
	</head>
	
	
	<body>	
		<div id="login_person">
			<h1 id="loginHeader">Logga in</h1>			
			<?php echo form_open('validation/login') ?>
				
			<ul>
				<li><label for="username"><text>anv.namn</text></label></li>
				<input class="rounded" type="text" name="username" value="" />
				<span class="error"></span>
				
				<li><label for="password">lösenord</label></li>
				<input class="rounded" type="password" name="password" value="" />
				<span class="error"></span>
					
				<li><input type="submit" name="submit" id="submit" value="logga in" /></li>
			
			<?php echo form_close(); ?>	
			
			</ul>				
		</div>
	</body>
</html>
		
			
			
			
			

