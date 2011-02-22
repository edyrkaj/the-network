<div id="maincontent_wrapper">
		
		<div id="v_leftmenucol">
		
			<div id="limenu">
<div><p id="backtofront"><? echo anchor('/main/', 'Tillbaka till förstasidan') ?></p><img style=" float: left; margin-top: 6px; margin-left: 3px;" src="/../network/images/siteimages/pil.png" /></div>			</div>
		</div>
	
		<div id="v_rightcol">
		
				<div id="searchinstructtext">
				<h3>Statistik</h3>
				<div id="line"></div>
				<p>Den här månaden har vi frågat the networks besökare vilket programmeringsspråk man företrädesvis kodar i. 
				Gör din röst hörd genom att rösta i undersökningen på förstasidan så är du med och påverkar statistiken.</p>
			
			</div>
			
			<div id="holder"></div>
			
			<script>
			
			$(function(){
				
				var sum = 0;
				var codename = [];
				var name = [];
				var stat = [];
				var num = [];
				
				$.ajax({
	
				url: 		'/network/main/checkstat',
				type: 		'POST',
				data: 		'ajax=1&online=1',
				dataType: 	'json',
				success: function(data){
				
					for (var i=0; i < data.length; i++) {
					
					stat[i] = parseInt(data[i].count);
					
					name[i] = data[i].name;
					
					codename[i] = '%%.%% '+name[i];
					
					sum += stat[i];
					num[i] = stat[i];
										
					}
					
					
					
					var r = Raphael("holder");
					r.g.txtattr.font = "12px 'Fontin Sans', Fontin-Sans, sans-serif";
							
					r.g.text(340, 30, "Vilket språk kodar du i ?").attr({"font-size": 20, "font-family": "Bank gothic"});
					r.g.text(320, 50, "Totalt antal röster: "+sum).attr({"font-size": 12, "font-family": "Arial"});
	
							
					var pie = r.g.piechart(320, 240, 160, num, {legend: codename, legendpos: "east"});
										
					pie.hover(function () {
						this.sector.stop();
						this.sector.scale(1.1, 1.1, this.cx, this.cy);
						if (this.label) {
							this.label[0].stop();
							this.label[0].scale(1.5);
							this.label[1].attr({"font-weight": 800});
						}
					}, function () {
						this.sector.animate({scale: [1, 1, this.cx, this.cy]}, 500, "bounce");
						if (this.label) {
							this.label[0].animate({scale: 1}, 500, "bounce");
							this.label[1].attr({"font-weight": 400});
						}
					});
				
					
					
					}		
				
			});
			
			
			});	
				
		</script>

		</div>
		</div>
		
</div>	
