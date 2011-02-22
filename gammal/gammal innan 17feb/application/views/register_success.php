<?php 
$data['reg_success'] = <<<Cout
	<div id="contenttwo">
			<div id="searchmain">
				<div id="memberhome">
				<h3>Tack  
				
Cout;

$data['reg_success'] .= $this->session->userdata('username');
$data['reg_success'] .= <<<Cout
				 för att du valde Network.</h3>
				<p style="font-size: small;">Du kommer att få ett mejl med dina inloggningsuppgifter inom kort.
					Klicka på länken i mejlet för att aktivera ditt konto.
				</p>
				<div id="line"></div>
				</div>
		
			</div>
	</div>
Cout;

$data['frame_height'] = '160px';
echo json_encode($data);

?>