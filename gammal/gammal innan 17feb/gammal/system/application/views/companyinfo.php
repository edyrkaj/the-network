<div id="maincontent_wrapper">

		<div id="v_leftmenucol">
			<div id="limenu">
				<div><p id="backtofront"><? echo anchor('/main/', 'Tillbaka till förstasidan') ?></p><img style=" float: left; margin-top: 6px; margin-left: 3px;" src="/../network/images/siteimages/pil.png" /></div>
			</div>
		</div>
		
		<div id="v_rightcol">
			
			<div id="instructiontext">
				<h3>Som arbetsgivare och företag kan vi erbjuda dig följande</h3>
				<div id="line"></div>
				<p>The Network är en unik möjlighet att komma i kontakt med
				alla som jobbar och verkar inom webb, vare sig det handlar om programmering,
				design eller utveckling,alla på ett och samma ställe". Som företag kan man
				dessutom annonsera efter nya medarbetare.
				
				The Network är en unik möjlighet att komma i kontakt med
				alla som jobbar och verkar inom webb, vare sig det handlar om programmering,
				design eller utveckling, alla på ett och samma ställe".</p>
			</div>
				
			
			<div id="personsymbols">
			
				<img src="<?php echo base_url();?>/images/siteimages/companysymbols.png" />
				
				<div id="registertext">
					<h4 id="registerheader">Registrera</h4>
					<p id="registertext">Registrera ditt företags profil för att skapa
					ett konto och få tillgång till alla
					funktioner.</p>
				</div>
					
				<div id="profiletext">
					<h4>Skapa profil</h4>
					<p>Därefter skapar du din
					egen profil för att presentera ditt eget företag för andra användare.</p>
				</div>
					
				<div id="searchpic">
					<h4 id="symbolheader">Annonsera</h4>
					<p id="searchingtext">Sök efter nya intressanta personer i branchen, 
					och annonsera efter medarbetare.</p>
				</div>
					
				<div id="networktext">
					<h4>Bygg nätverk</h4>
					<p>Skicka brev till andra användare, skapa egna favoriter och bygg nätverk.</p>
				</div>
			
			</div>	
			
		<?php	$data = array(
			
				'class' =>  'sticker button companybutton'
				
				);
		?>
			
			<div id="registerbtn">
				<p><?php echo anchor('/validation/register/', 'registrera konto', $data) ?></p>
			</div>
	
		</div>
</div>
	