<div id="maincontent_wrapper">
		
		<div id="v_leftmenucol">
			<?php $this->load->view($leftmenu); ?>
		</div>
	
		<div id="v_rightcol">
		
			<div id="searchinstructtext">
				<h3>Sök lediga tjänster</h3>
			<div style="margin-top: -10px" id="line"></div>
				
			<p>Skriv in ett eller flera sökord separerade med mellanrum
			och välj en eller flera orter. Om du vill söka på hela Sverige
			väljer du "alla i sökrutan."</p><br />
			
			<div id="jobform">
			<?php $data['style'] = 'width:200px'; ?>
			<?php echo form_open('main/getad', $data) ?>

					<label for="searchword">Skriv in sökord:</label><br />
					<input type = "text" id="searchform" name="searchinput"/><br /><br /><br/>
					
					<label id="" for="city">Var söker du jobb?</label><br />

					<select name="location" id="location" size="5">
					
					<?php foreach ($districts as $district) {								
						echo "<option value='".$district['workey_key']."'>".$district['name']."</option>";
					}
					
				?>

				</select><br />
				<input style="clear:both" type="button" value="sök jobb" id="submit" class='jobsearch'/></p>
			</form>
		</div>
		<div id="searchimg">
			<?php 
			?>
		</div>
		<div style="margin-top: -10px" id="line"></div>
		<div id="result">
		</div>
	</div>
</div>	
