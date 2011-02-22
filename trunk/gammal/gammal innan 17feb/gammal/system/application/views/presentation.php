<script>

$(function() {

$(".rounded").load(function() {
      
   $(this).wrap(function(){
      return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  
  
  });
  
});


</script>

<div id="membercontent">
	<div class="rounded" id="profilepic">
			
		<?php 	
		
			$firstname = $records[0]['firstname'];
			$lastname = $records[0]['lastname'];
			$personnummer = $records[0]['personnummer']; 
			$presentationheader = $records[0]['presentationheader']; 
			$presentation = $records[0]['presentation']; 
			$city = $records[0]['city'];
			$age = $records[0]['age'];
			$proffession = $records[0]['proffession'];
			$civil = $records[0]['civil'];
			
			switch ($civil) {
			
				case "1":
					$civil = 'singel';
				break;
				
				case "2":
					$civil = 'sambo';
				break;
				
				case "3":
					$civil = 'särbo';
				break;
				
				case "4":
					$civil = 'gift';
				break;	
			}
	
		?>
		
		
		<?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/network/images/userimages/$personnummer/profileimg/thumbnail_.jpg")) { ?>
		
		<img class="rounded" src="/../network/images/userimages/<?php echo $personnummer ?>/profileimg/thumbnail_.jpg" />
		
		<?php	} else { ?>
		
		<img class="rounded" src="/../network/images/userimages/default.jpg" />
	
		<?php } ?>
		
								
		</div>
		
		<div id="profilefact">
			<ul>
				<li>Namn: <span style="font-size: 10pt; font-family: helvetica"><?php echo $firstname . ' ' . $lastname?></span></li>
				<li>Ålder: <span style="font-size: 10pt; font-family: helvetica"><?php echo $age ?></span></li>
				<li>Civlistånd: <span style="font-size: 10pt; font-family: helvetica"><?php echo $civil ?></span></li>
				<li>Bor: <span style="font-size: 10pt; font-family: helvetica"><?php echo $city ?></span></li>
				<li>Yrke: <span style="font-size: 10pt; font-family: helvetica"><?php echo $proffession ?></span></li>
			</ul>
		</div>
		
		<br />
		<hr style="border: 1px dotted gray; width: 620px;" />
		<br />
	<!--	<h2 id="networktype"><?php echo $presentationheader; ?></h2> -->
		<br />
		<p><?php echo $presentation; ?></p>
			
</div>










