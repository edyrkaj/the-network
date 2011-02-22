


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
				<h3>Redigera portfolio</h3>
				<div style="margin-top: -10px" id="line"></div>			
			
				<p>Här kan du ladda upp bilder till din portfolio, du kan ha max tio bilder.
				Du kan antingen ladda upp bilder från din dator eller ladda ner
				en bild av en webbsida genom att fylla i dess url och klicka på skapa bild.
				När du skapar en bild från en webbsida så tar det en viss tid att skapa den.
				Efter det att du har tryckt på generera bild får du upp ett statusmeddelande
				där du ser om bilden är skapad eller inte. Om inte, kom tillbaka om en stund
				och skriv in samma url i sökrutan. Då finns den tillgänglig och laddas ner
				till din dator.</p><br />
				

	
			<?php echo form_open_multipart('upload/index'); ?>
	
			<p>
			<label for="Filedata">Välj bild/bilder:</label><br />
			<p><?php echo form_upload(array('name'=>'Filedata','id'=>'uploadifyit', 'style' => 'width:50px')); ?>
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
			
			echo '<div style="clear:both"><p><a href="/../network/main/mypage">Gå till dina uppladdade bilder</a><img style="margin-top: 6px; margin-left: 10px;" src="/../network/images/siteimages/pil.png" /></p></div>';

			
			
?>
			</div>
			