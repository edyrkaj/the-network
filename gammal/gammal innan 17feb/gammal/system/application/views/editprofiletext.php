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
			<h3>Redigera presentationstext</h3>
			<div style="margin-top: -10px" id="line"></div>			
			<p>Skriv en väl formulerad presentationstext för att berätta om dig själv,
			hur<br />du är som person och vad du kan yrkesmässigt. Det ökar möjligheten att<br /> du ska fånga
			andras intresse.</p><br />
				
			<?php 
			
			$upload = $this->input->post('uploadtext');
			
			$presentationheader = $records[0]['presentationheader'];
			$string = nl2br($records[0]['presentation']);	  
			
			$presentation = str_replace("<br />","",$string);
			
			echo form_open('profile/insertprestext', 'id="prestextform"');
			
			$data = array(
			
				'name'	=>	'presheader',
				'value'	=>	$presentationheader
			);
			
			echo form_input($data);
			echo '<br />';
			echo '<br />';
			
			$data = array(
			
              'name'        => 'prestext',
              'id'          => 'textarea',
              'value'       => $presentation
        
            );
			
			echo form_textarea($data);
			echo '<input style="margin-top: 15px" id="submit" type="submit" name="uploadtext" value="Spara" />';
			echo form_close();
			
			
			if($upload != FALSE) {
				echo '<br />';
				echo '<div class="errorpic">Presentationstext sparad</div>';
			}
			
			echo '<br />';
			echo '<div><p style="float:left;"><a href="/../network/main/mypage">Tillbaka till din sida</a></p><img style=" float: left; margin-top: 6px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></div>';

			
			?>
			
			

			
					
			
		</div>
























