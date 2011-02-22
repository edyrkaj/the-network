<div id="maincontent_wrapper">
		
		<div id="v_leftmenucol">
		
			<div id="limenu">
<div><p id="backtofront"><? echo anchor('/main/', 'Tillbaka till förstasidan') ?></p><img style=" float: left; margin-top: 6px; margin-left: 3px;" src="/../network/images/siteimages/pil.png" /></div>			</div>
		</div>
		
		<div id="v_rightcol">
			
			<div id="instructiontext">
				<h3>Som arbetssökande och privatperson kan vi erbjuda dig följande</h3>
				<div id="line"></div>
				<p>The Network är en unik möjlighet att komma i kontakt med
				alla som jobbar och <br />verkar inom webb, vare sig det handlar om programmering,
				design eller utveckling,<br /> alla på ett och samma ställe. Du kan också svara på 
				platsannonser från olika företag.</p>
				
				<p>När du har registrerat dig får du tillgång hela branschen på ett och samma
				ställe.<br /> Du kan skapa favoriter, presentera dig själv med personligt brev och
				lägga in din CV.<br 7>Vad väntar du på, get into the network...</p>
			</div>
				
			
			<div id="personsymbols">
			
				<img src="<?php echo base_url();?>/images/siteimages/personsymbols.png" />
				
				<div id="registertext">
					<h4 id="registerheader">Registrera</h4>
					<p id="registertext">Registrera din profil för att skapa
					ett konto och få tillgång till alla
					funktioner.</p>
				</div>
					
				<div id="profiletext">
					<h4>Skapa profil</h4>
					<p>Därefter skapar du din
					egen profil för att presentera dig för andra användare.</p>
				</div>
					
				<div id="searchpic">
					<h4 id="symbolheader">Sök användare</h4>
					<p id="searchingtext">Sök efter individer och företag i branchen, svara
					på jobbanonser.</p>
				</div>
					
				<div id="networktext">
					<h4>Bygg nätverk</h4>
					<p>Skicka brev till andra användare, skapa favoriter och bygg nätverk.</p>
				</div>
			
			</div>	
			
		<?php	$data = array(
					'class' =>  'spotbox button personbutton'
				);
		?>
			
			<div id="registerbtn">
				<p><?php echo anchor('/validation/register/', 'registrera konto', $data) ?></p>
			</div>
	
		</div>
</div>
	