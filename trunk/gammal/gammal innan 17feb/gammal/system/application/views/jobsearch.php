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
		
			<div id="searchinstructtext">
				<h3>Sök lediga tjänster</h3>
			<div style="margin-top: -10px" id="line"></div>
				
				<p>Skriv in ett eller flera sökord separerade med mellanrum
				och välj en eller flera orter. Om du vill söka på hela Sverige
				väljer du "alla i sökrutan."</p><br />
			
			
			<div>
			<?php echo form_open('main/getads') ?>

					<label for="searchword">Skriv in sökord:</label><br />
					<input type = "text" id="searchform" name="searchinput"/><br /><br /><br/>
					
					<label id="" for="city">Var söker du jobb?</label><br />
					<select name="location" id="location" multiple="multiple" size="5">

				</select><br />
				<input style="clear:both" type="button" value="sök jobb" id="submit" /></p>
			</form>
		</div>
		
		<div id="searchimg"></div>
		<div id="result"></div>
	</div>
</div>	
