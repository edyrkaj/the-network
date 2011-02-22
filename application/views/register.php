<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
	<!--<link rel="stylesheet" href="<?php echo base_url();?>style/register.css" media="screen" type="text/css" />-->
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/register.js"></script>	
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
		 margin: 1px 0px 10px 35px;
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
		
		.error, .emailerror {

		font-size: 7.5pt;
		color: red;
		line-height: 2px;
		width: 85px;

		}

		
		.margin {
		float: right;
		margin-left: -10px;
		margin-top: -5px;
		margin-bottom: 10px;
		font-size: 7.5pt;
	
		color: red;

		width: 85px;


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
		
		#memberhome{
			margin:0 auto;
			width: 350px;
		
		}
		
		#rgstr_person {
			display: block;
		}
		
		#rgstr_company {
			display: none;
		}
		
	</style>
	</head>
	
	
	<body>

			<h1 style="margin-left:25px"><input type="radio" name="form_select" checked="checked" id="private" value="person" />privatperson /
			<input type="radio" name="form_select" id="company" value="company" />företag</h1>
			
			<div style="margin-left:-10px" id="rgstr_person">
				
			<?php  $arr= array( 'name' => 'person', 'id' => 'pers' );  ?>
				
				<?php echo form_open('validation/register', $arr);?>				
					<ul>
						<li><label for="firstname"><text>Förnamn</text></label></li>
						<li><input class="rounded" type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" />
							<span class="error"></span>
						
						<li><label for="lastname">Efternamn</label></li>
						<li><input class="rounded" type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" />
							<span class="error"></span>
							
						<li><label for="lastname">Personnummer</label></li>
						<li><input class="rounded" type="text" name="personnr" value="<?php echo set_value('personnr'); ?>" />
							<span class="error"></span>
						
						<li><label for="username">Användarnamn </label></li>
						<li><input class="rounded" type="text" name="username" value="<?php echo set_value('username'); ?>" />
							<span class="error"></span>
						
						<li><label for="email">E-post </label></li>
						<li><input class="rounded" type="text" name="email" value="<?php echo set_value('email'); ?>" />
							<span class="error"></span>
						
						<li><label for="password">Lösenord</label></li>
							<input class="rounded" type="password" name="password" value="<?php echo set_value('password'); ?>" />
							<span class="error"></span>
							
						<li><label for="confirm_password">Bekräfta lösenord</label></li>
							<input class="rounded" type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" />
							<span class="error"></span>
				
						<li><input type="submit" class="submit" name="rgstr_person" style="width:100px;"value="Registrera dig" /></li>
					</ul>
				<?php echo form_close(); ?>
			</div>
			
			<div style="margin-left:-10px" id="rgstr_company">				
				<?php echo form_open('validation/register');?>
					<ul>
						<li><label for="companyname">Företagetsnamn</label></li>
						<li><input class="rounded" type="text" name="companyname" value="<?php echo set_value('companyname'); ?>" /></li>
						<span class="error"></span>

						
						<li><label for="regnumber">Organisationsnummer</label></li>
						<li><input class="rounded" type="text" name="regnumber" value="<?php echo set_value('regnumber'); ?>" /></li>
						<span class="error"></span>
						
						<li><label for="regnumber">Kontaktperson</label></li>
						<li><input class="rounded" type="text" name="contactperson" value="<?php echo set_value('contactperson'); ?>" /></li>
						<span class="error"></span>
						
						<li><label for="username">Användarnamn </label></li>
						<li><input class="rounded" type="text" name="username" value="<?php echo set_value('username'); ?>" />
						<span class="error"></span>
						
						<li><label for="email">E-post </label></li>
						<li><input class="rounded" type="text" name="email" value="<?php echo set_value('email'); ?>" />
						<span class="error"></span>
						
						<li><label for="password">Lösenord</label></li>
						<input class="rounded" type="password" name="password" value="<?php echo set_value('password'); ?>" />
						<span class="error"></span>
							
						<li><label for="confirm_password">Bekräfta lösenord</label></li>
						<input class="rounded" type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" />
						<span class="error"></span>

				
						<li><input type="submit" class="submit" name="rgstr_company" value="Registrera dig" /></li>
					</ul>
				<?php echo form_close();?>
			</div>
	</body>
</html>
