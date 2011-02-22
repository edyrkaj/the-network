
<div id="maincontent_wrapper">
		
		<div id="v_leftmenucol">
			<?php $this->load->view($leftmenu); ?>
		</div>
		
		<div id="v_rightcol">
			<div id="memberhome">
			<h3>Redigera dina personuppgifer</h3>
			<div style="margin-top: -10px" id="line"></div>
			
			<p style="clear:both">Här fyller du i dina personliga uppgifter som ålder, civilstånd, adress med mera.<br />
			Det gör att du syns mer och blir mer tillgänglig för arbetsgivare till exempel</p><br />
				
	<?php 
			
			$upload = $this->input->post('uploadfacts');
			
			$firstname = $records[0]['firstname'];
			$lastname = $records[0]['lastname'];
			$gender = $records[0]["gender"];
			$street = $records[0]['street'];
			$postalcode = $records[0]['postalcode'];
			$coadress = $records[0]['coadress'];
			$city = $records[0]['city'];
			$phone = $records[0]['mobile'];
			$civilstatus = $records[0]['civil'];
			$proffession = $records[0]['proffession'];
			$drivinglicence = $records[0]['drivinglicence'];
			$age = $records[0]['age'];
			
		//	$presentation = str_replace("<br />","",$string);
		
	?>
		
		
	<?php
			echo form_open('profile/insertpersfacts', 'id="presfactform"');
			
				echo '<div id="l_personfact">';
	
				echo '<label for="firstname">Förnamn:</label><br />';
				$data = array( 'name'	=>	'firstname', 'value'	=>	$firstname );
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
				
				echo '<label for="firstname">Efternamn:</label><br />';
				$data = array('name'	=>	'lastname', 'value'	=>	$lastname );
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
	
				echo '<label for="street">Gatuadress:</label><br />';
				$data = array('name'	=>	'street', 'value'	=>	$street );		
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
				
				echo '<label for="street">C/o adress:</label><br />';
				$data = array('name'	=>	'coadress','value'	=>	$coadress );			
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
				
				echo '<label for="postalcode">postnummer:</label><br />';
				$data = array('name'	=>	'postalcode', 'value'	=>	$postalcode );
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
				
				echo '<label for="city">Stad:</label><br />';
				$data = array('name'	=>	'city', 'value'	=>	$city );
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
				
				echo '<label for="city">Telefonnummer:</label><br />';
				$data = array('name'	=>	'phone', 'value'	=>	$phone );
				echo form_input($data);
				echo '<br />';
				echo '<br />';
				
				echo '<label for="proffession">Yrke:</label><br />';
				$data = array('name'	=>	'proffession', 'value'	=>	$proffession );
				echo form_input($data);
				echo '<br />';
				echo '<br />';
			
			echo '</div>';
			
			
			echo '<div id="r_personfact">';
			
				echo '<label id="factlabel" for="age">Ålder</label>';
				echo '<select name="age">';
					
					for($value = 18; $value <= 100; $value++){ 
					
						if ($value == $age ) {	
							$selected = 'selected="selected"';
						}
						
						else {
							$selected = '';
						}
						
						echo'<option value="' . $value . '"' . $selected . '>' . $value . '</option>';	
					}
				
				echo '</select>';

		?>
				
				<text> år</text>
				<br />
				<br />
				
				<label for="drivinglicense">Körkort</label>
				<select name="drivinglicence">
					<option value="1" <?php if($drivinglicence == '1') { echo 'selected="selected"'; } ?>>Ja</option>
					<option value="0" <?php if($drivinglicence == '0') { echo 'selected="selected"'; } ?>>Nej</option>
				</select>
				<br />
				<br />
				
				<label for="gender">Kön</label>
				<select name="gender">
					<option value="1" <?php if($gender == '1') { echo 'selected="selected"'; } ?>>Man</option>
					<option value="0" <?php if($gender == '0') { echo 'selected="selected"'; } ?>>Kvinna</option>
				</select>
				<br />
				<br />
				
				<label for="civilstatus">Civilstatus</label>
				<select name="civil">
					<option value="1" <?php if($civilstatus == '1') { echo 'selected="selected"'; } ?>>Singel</option>
					<option value="2" <?php if($civilstatus == '2') { echo 'selected="selected"'; } ?>>Sambo</option>
					<option value="3" <?php if($civilstatus == '3') { echo 'selected="selected"'; } ?>>Särbo</option>
					<option value="4" <?php if($civilstatus == '4') { echo 'selected="selected"'; } ?>>Gift</option>
				</select>
	<?php		
			echo '</div>';
			
			echo '<div id="profilefactsubmit">';


			echo '<input style="margin-top: 15px" id="submit" type="submit" name="uploadfacts" value="Spara" />';
			echo form_close();
			
			
			if($upload != FALSE) {
				echo '<br />';
				echo '<div class="errorpic">Profilinställningar sparade</div>';
			}  
			
			echo '<br />';
			echo '<div><p style="float:left;"><a href="/../network/main/mypage">Tillbaka till din sida</a></p><img style=" float: left; margin-top: 6px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></div>';

			
			
?>
		</div>	
		</div>
			

























