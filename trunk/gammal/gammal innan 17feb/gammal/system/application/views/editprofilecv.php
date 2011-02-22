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
			<h3>Redigera CV</h3>
			<div style="margin-top: -10px" id="line"></div>			
			<p>Här kan du redigera din CV. Fyll i vilken/vilka utbildningar du har gått,
			var du har arbetat<br /> och övriga meriter. Du kan lägga till och ta bort poster
			som du önskar.</p><br />
			
		 <?php 
			//??????????????
	 		$upload = $this->input->post('uploadfacts');
			
	/*		$edulvel = $records[0]['edulevel'];
			$eduname = $records[0]['eduname'];
			$schoolname = $records[0]['schoolname'];
			$edustart = $records[0]['edustart'];
			$eduend = $records[0]['eduend'];
			 */
			
	
	?>
		
		
	<?php
		echo form_open('', 'id="cvform"');
			
			echo '<div id="l_personfact">';
				echo '<ul>';
					echo '<li><label for="edulevel">Utbildningsnivå:</label>';
					$options = array(
					  '1' => 'Gymnasium',
					  '2' => 'Kandidatexamen',
					  '3' => 'Magister/Civilingenjör',
					  '4' => 'Fristående eftergymnasiala kurser',
					  '5' => 'Yrkesutbildning',
					  '6' => 'Licentiat'
					);
					$id = 'id="edulevel"';
					echo form_dropdown('edulevel', $options, '1', $id);
					echo '</li>';
					
					echo '<li><label for="eduname">Utbildningsnamn:</label>';
					$data = array('name'	=>	'eduname', 'value'	=>	set_value('eduname'), 'size' => '30', 'id' => 'eduname');
					echo form_input($data);
					echo '</li>';
					
					echo '<li><label for="schoolname">Skolansnamn:</label>';
					$data = array('name'	=>	'schoolname', 'value'	=>	set_value('schoolname'), 'size' => '30', 'id' => 'schoolname');
					echo form_input($data);
					echo '</li>';

					echo '<li><label for="edustart">Började:</label>';
					$options = array();
					$year = 1981; //specify first year in the dropdown-menu here
					$current_year = intval(date('Y'));
					while($year <= $current_year){
						$options['vår ' . $year] = 'vårterminen ' . $year; 
						$options['höst ' . $year] = 'höstterminen ' . $year; 
						$year++;				
					}
					if(isset($edustart)) $selected = $edustart;
					else $selected = 'höst ' . ($current_year - 1);
					$id = "id='edustart'";
					echo form_dropdown('edustart', $options, $selected, $id);
					echo '</li>';
			
					
					echo '<li><label for="eduend">Examinerad:</label>';
					$options = array();
					$year = 1981; //specify first displayed year in the dropdown-menu here
					$current_year = intval(date('Y'));
					while($year <= $current_year){
						$options['vår ' . $year] = 'vårterminen ' . $year; 
						$options['höst ' . $year] = 'höstterminen ' . $year; 
						$year++;				
					}
					
					if(isset($eduend)) $selected = $eduend;
					else $selected = 'höst ' . $current_year;
					$id = "id='eduend'";
					echo form_dropdown('eduend', $options, $selected, $id);
					echo '</li>';
					
				echo '</ul>';
				echo '<input style="margin-top: 15px" class="add_btn" type="submit" name="addedu" value="Lägg till" />';
				
			echo '</div>';
	
			echo form_close();
			
			
			if($upload != FALSE) {
				echo '<br />';
				echo '<div class="add_result"></div>';
			}  
			
			echo '<br />';
			echo '<div><p style="float:left;"><a href="/../network/main/mypage">Tillbaka till din sida</a></p><img style=" float: left; margin-top: 6px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></div>';

			
			
?>
			
			
			
			



			
</div>