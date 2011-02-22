<div id="maincontent_wrapper_front">
	<div id="hcol_wrapper">	
		<div id="onecolwrapper">
			<text class="category">INFORMATION</text>
			<h1 id="welcomeHeader">Välkommen till the network</h1>
			<p>Det finns många jobbsajter på webben men ingen som på ett bra sätt sammaför
			arbetsgivare och arbetstagare. Idén till the network föddes för att fylla tomrummet.
			Ta en titt på infosidorna, där kan du läsa mer om hur det fungerar.
			</p>
		</div>
		
	
		<div id="twocolwrapper">
			<text class="category">ARBETSMARKNAD</text>
			<h1>Svensk spelskapare</h1>
			<p class="singlecol">För drygt 18 månader sedan lanserade svenska Markus Persson sitt egenutvecklade spel 
			Minecraft på webben. Idag har han sålt mer än 960 000 exemplar, vilket motsvarar intäkter 
			på mer än 100 miljoner kronor.<br /><span class="category"><a class="newwindow" 
			style="color:grey" href="<?php echo prep_url('http://www.csjobb.idg.se/2.9741/1.362748/miljonregn-over-svensk-spelskapare'); ?>">LÄS MER: csjobb.idg.se</a></span></p>
			
			<div id="imggame"><img class="rounded" src="../../network/images/siteimages/spelskapare.jpg" /></div>	

		</div>
	</div>			
			
	<div id="hcol_wrapper">
		<div id="onecolwrapper_noborder">
			<text class="category">ARBETSMARKNAD</text>
			<h1>Ljus framtid för utvecklare</h1>
			<p>Verksamhetskonsulter, webbutvecklare och it-arkitekter är vinnarna när it-marknaden vänder uppåt. 
			Sett till IT & telekomföretagens beräkningar anställs drygt 3 800 personer inom webb- och kommunikationsplattformar 
			de närmaste fem åren. Om man mäter ökningstakten i procent är det också webb- och kommunikationsplattformar som tar 
			ledningen tillsammans med positioneringstjänster. Områdena beräknas växa med sju procent per år.
			<span class="category"><a class="newwindow" style="color:grey" href="<?php echo prep_url('http://www.csjobb.idg.se/2.9741/1.343571/det-ljusnar-for-it-jobben'); ?>"> LÄS MER: csjobb.idg.se</a></span></p>
		</div>
		<div id="newsimage">
			<img class="rounded" src="<?php echo base_url();?>images/siteimages/konjunktur.jpg" />
		</div>
		
		<div id="poll_wrapper">
			<text class="category">UNDERSÖKNING</text>
			<h1>Vilket språk kodar du i?</h1>
			
					
			<?php echo form_open('main/insertdata', 'id=formpoll') ?>
							
				<div id="lang">
				<input type="radio" name="poll" Value="php" <?php echo set_radio('poll', 'php', TRUE) ?> />
				<label id="poll" for="php">php</label>
    			</div>
				
				<div id="lang">
				<input type="radio" name="poll" Value="asp" <?php echo set_radio('poll', 'asp', FALSE) ?> />
				<label id="poll" for="asp">asp</label>
    			</div>
				
				<div id="lang">
				<input type="radio" name="poll" Value="java" <?php echo set_radio('poll', 'java', FALSE) ?> />
				<label id="poll" for="jagva">java</label>
    			</div>
				
				<div id="lang">
				<input type="radio" name="poll" Value="python" <?php echo set_radio('poll', 'python', FALSE) ?> />
				<label id="poll" for="pyton">python</label>
    			</div>
    			
				<div id="lang">
				<input type="radio" name="poll" Value="ruby" <?php echo set_radio('poll', 'ruby', FALSE) ?> />
				<label id="poll" for="ruby">ruby</label>
    			</div>
    			
				<div id="lang">
				<input type="radio" name="poll" Value="NET" <?php echo set_radio('poll', '.NET', FALSE) ?> />
				<label id="poll" for="net">.NET</label>
    			</div>
    			
				<div id="lang">
				<input type="radio" name="poll" Value="C" <?php echo set_radio('poll', 'C', FALSE) ?> />
				<label id="poll" for="C">C++</label>
    			</div>
    			
    			<?php echo form_submit('submitpoll', 'rösta', 'id=submit'); ?>
			
			<?php echo form_close(); ?>
			
			<?php	if(isset($_POST['submitpoll'])) { echo '<p class="pollconfirmation">tack för din medverkan!</p>';} ?>

				
		</div>
	</div>
	
	<div id="hcol_wrapper">
		<text class="category">PROGRAMVARA</text>
		<h1>Codeigniter, effektivt MVC-ramverk för PHP</h1>
		<div id="onecolwrapper_noborder">
			<p>Codeigniter är ett webbapplikationsramverk med öppen källkod ämnat för att bygga dynamiska 
			hemsidor med PHP. Genom att tillhandahålla ett brett sortiment av bibliotek</p>
		</div>
		<div id="onecolwrapper_noborder">
			<p>med de vanligaste tänkbara funktionerna, låter ramverket utvecklare skriva applika- 
			tioner mycket snabbare. Du kan läsa mer på www.codeigniter.com.
			</p>
		</div>
		
		<div id="imagewrapper">
		<img class="rounded" src="<?php echo base_url();?>/images/siteimages/codeigniter3.jpg" />
		</div>
	
	
	
	
</div>
