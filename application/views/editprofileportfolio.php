<div id="maincontent_wrapper">
		
		<div id="v_leftmenucol">
			<?php $this->load->view($leftmenu); ?>
		</div>
		
		<div id="v_rightcol">
			
			<div id="memberhome">
				<h3>Redigera portfolio</h3>
				<div style="margin-top: -10px" id="line"></div>			
			
				<p>Här kan du ladda upp bilder till din portfolio. Du kan antingen ladda upp bilder 
				från din dator, skapa en bild av en webbsida eller ladda upp något eller några av
				dina album på Facebook.</p>
				
		
		<div id="uploaddiv">
		<div id="uploadform">
<?php
			
			$data = array(			
				'style'	=>	'margin-left: 15px'
			);
?>
	
			<?php echo form_open_multipart('upload/index', $data); ?>
			<h2 id="networktype">Ladda upp bilder</h2>
			<label id="upload" for="Filedata"><p>Välj en eller flera bilder som du vill ladda upp och lägga till din portfolio:</p></label>
			
<?php			$data = array(
				
					'id'	=>	'uploadifyit',
					'name'	=>	'Filedata'
				);
?>			
			<p><?php echo form_upload($data); ?>
			<a style="margin-left:20px;" href="javascript:$('#uploadifyit').uploadifyUpload();">Ladda upp!</a></p>
			<?php echo form_close(); ?>
	
			<div id="fileinfotarget">
			</div>
			</div>
				
				<div id="thumbalizrform">
				<h2 id="networktype">Skapa bild av webbsida</h2>
					<form style="" action="<?php echo base_url();?>processimg/" method="post">
						<label id="upload" for="webbsida"><p style="width: 200px;">Skriv in adressen till en webbsida som du vill skapa en bild av.</p></label>
						<input style=" margin-top: -1px; width: 115px; height: 29px;" type="text" id="searchform" name="thumbwebsite" />
						<input type="submit" style="float:left; margin-left: 10px; width: 115px; background: #545353; color: #e7e6e6; font-size: 10pt; height: 30px;" id="submit" name="submitthumb" value="GENERERA BILD" />
					</form>
					
					
	<?php 			if ($this->input->post('submitthumb')) {
						if ($confirmation != '') {
							echo '<p style="clear:both; margin-top: 0px; margin-left: 0px; margin-bottom: 10px;" class="errorpic">' . $confirmation . '</p>';
						}
						else {
							echo '<p style="float: left; margin-top: 0px; margin-left: 0px; margin-bottom: 10px;" class="errorpic">' . $error . '</p>';
						}
					}  
				
				echo '</div>';
				echo '</div>';

			
?>
			</div>

			
			<div id="facebook">
			
			<h2 id="networktype">Dina facebookalbum</h2>
			<label id="upload" for="Filedata"><p class="albumtext">Klicka på det album som du vill ladda upp från facebook. De album som är aktiverade
			har en grön färg. För att avakivera ett album klickar du en gång till på albumets knapp som återigen blir blå.</p></label><br />

<?php	
			
		
		//------------------------------------------------------------------------------
		
			// Check if album is selected or not
									
			function checkalbums($album, $activealbums) {
				
				if (!empty($activealbums)) {
				
					foreach ($activealbums as $activealbum) {
											
						if ($album['id'] == $activealbum['albumid']) {
							
							$style = 'fbbtngreen';
							return $style;
	
						}						
					}
				}			
			}   
		
		//-------------------------------------------------------------------------------
			
		if ($albums != 0) {
		
			foreach($albums as $album) {
				
			switch ($album['name']) {
		
			case "Id":
			
				$album['name'] = 'Loggfoton';
			break;
			
			case "Wall Photos":
			
				$album['name'] = 'Väggbilder';
			break;
			
			case "Mobile Uploads":
			
				$album['name'] = 'Mobiluppladdningar';
			break;
			
			case "Profile Pictures":
			
				$album['name'] = 'Profilbilder';
			break;
			
		}
						
		
		$style = checkalbums($album, $activealbums);
		
		if (is_null($style)) {
			
			$style = 'fbbtn';
		}
		
		
		echo '<a class="facebookbtn" href="' . base_url() . 'processimg/thumbalize/' . $album['id'] . '"><span class="' . $style . '">' . $album['name'] . '</span></a>';
		
	}
	}
	
	else {
	
		echo '<span class="errorpic">Du har inga facebook-album..!!</span>';
	}
	
?>
	
	</div>
			



<?PHP

	echo '<div style="clear:both; margin-left: 15px;"><p><a href="/../network/gallery">Gå till dina uppladdade bilder</a><img style="margin-top: 20px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></p></div>';

	
?>

			