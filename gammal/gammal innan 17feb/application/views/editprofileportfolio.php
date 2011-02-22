<div id="maincontent_wrapper">
		
		<div id="v_leftmenucol">
			<?php $this->load->view($leftmenu); ?>
		</div>
		
		<div id="v_rightcol">
			
			<div id="memberhome">
				<h3>Redigera portfolio</h3>
				<div style="margin-top: -10px" id="line"></div>			
			
				<p>Här kan du ladda upp bilder till din portfolio. Du kan antingen ladda upp bilder 
				från din dator eller ladda ner en bild av en webbsida genom att fylla i dess url och 
				klicka på generera bild.</p><br />
				
				<p>När du genererar en bild från en webbsida så tar det en viss tid att skapa den.
				Efter det att<br /> du har tryckt på generera bild får du upp ett statusmeddelande där 
				du ser om bilden finns tillänglig omedelbart eller inte. Om inte, kom tillbaka om 
				en liten stund, skriv in samma url<br /> i sökrutan. Då finns den tillgänglig och 
				laddas ner till din dator.</p><br />
				

	
			<?php echo form_open_multipart('upload/index'); ?>
	
			<p>
			<label for="Filedata">Välj bild/bilder:</label><br />
			<p><?php echo form_upload(array('name'=>'Filedata','id'=>'uploadifyit')); ?>
			<a href="javascript:$('#uploadifyit').uploadifyUpload();">Ladda upp!</a>
			</p>
			<?php echo form_close(); ?>
	
			<div id="fileinfotarget">
			</div>
	
	
				<br />
				<form action="<?php echo base_url();?>processimg/" method="post">
					<label for="webbsida">Skapa bild av webbsida:</label>
					<p><input type="text" id="searchform" name="thumbwebsite" /></p>
					<input type="submit" style="clear:both; width: 115px; background: #545353; color: #e7e6e6; font-size: 10pt; height: 35px;" id="submit" name="submitthumb" value="GENERERA BILD" />
				</form>
				<br />
				
				
<?php 			if ($this->input->post('submitthumb')) {
					if ($confirmation != '') {
						echo '<p style="float:left; margin-top: -10px; margin-left: 0px; margin-bottom: 10px;" class="errorpic">' . $confirmation . '</p>';
					}
					else {
						echo '<p style="float: left; margin-top: 0px; margin-left: 0px; margin-bottom: 10px;" class="errorpic">' . $error . '</p>';
					}
				}  
			
			echo '<div style="clear:both"><p><a href="/../network/gallery">Gå till dina uppladdade bilder</a><img style="margin-top: 6px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></p></div>';

			
			
?>
			</div>
			