$(function(){
	

//**********************************************************************************

// Update main content

//**********************************************************************************

	
$('.mainmenu').click(function(event) {
	
	event.preventDefault();
	
	var menuitem = $('li').index(this);

	$.ajax({

		url: 		'/network/main/getpagecontent',
		type: 		'POST',
		data: 		'ajax=1&online=1&menuitem='+menuitem,
		dataType: 	'html',
		success: function(data){
		
				$('#content').html(data);
				
		}
	});

});



//**********************************************************************************

// Update main content from leftmenu

//**********************************************************************************


	
$('.menuheader').live('click', function(event) {
	
	event.preventDefault();
	
	var leftmenuheader = $('.menuheader').index(this);
	
	$.ajax({

		url: 		'/network/main/getleftpagecontent',
		type: 		'POST',
		data: 		'ajax=1&leftmenuheader='+leftmenuheader,
		dataType: 	'html',
		success: function(data){
						
			$('#content').html(data);
		
		}
	});
	
});


//**********************************************************************************

// Update membercontent from member-pagemenu

//**********************************************************************************


	
$('.menupagelink').live('click', function(event) {
	
	event.preventDefault();
	
	var menupagelink = $('.menupagelink').index(this);

	$.ajax({

		url: 		'/network/main/getmemberpagecontent',
		type: 		'POST',
		data: 		'ajax=1&menupagelink='+menupagelink,
		dataType: 	'html',
		success: function(data){
						
			$('#membercontent').html(data);
		
		}
	});      
	
});



//**********************************************************************************

// frontimage animation

//**********************************************************************************

	
$.ajax({

	url: 		'/network/main/checkonline',
	type: 		'POST',
	data: 		'ajax=1&online=1',
	dataType: 	'json',
	success: function(data){
		
		
		if (data.isonline == 1) {     


			$('#digital_header').crossSlide({
		
				sleep: 2,
				fade: 1
				}, [
		  
				{ src: 'http://localhost/network/images/siteimages/digital25.jpg' },
				{ src: 'http://localhost/network/images/siteimages/digital26.jpg' },
				{ src: 'http://localhost/network/images/siteimages/digital27.jpg' }
  
			]);
			
		 } else if (data.isonline == 0) {
		 
		 	$('#digital_header').crossSlide({

			sleep: 2,
			fade: 1
			}, [
			
			{ src: 'http://localhost/network/images/siteimages/digital11.png' },
			{ src: 'http://localhost/network/images/siteimages/digital18.jpg' },
			{ src: 'http://localhost/network/images/siteimages/digital9.jpg'  }
		
			]);
		 
		}	 	 
	}		
	
	
}, 2000);  
	
  
  

//**********************************************************************************

// jobsearch  - not enabled

//**********************************************************************************

/*

$("#submit").click(function(){
		
	
	$('#result ul').remove();
	
	var val = new Array();
	
	$('select > option:selected').each(function() {
    	 val.push($(this).val());
	});

		
	var search = $('#searchInput').val();
	
							
	$.post( "main/getads", { 'string' : val, 'input' : search }, function(data){
				
			var ul= $("<ul />");
			$("#result").append(ul);
					
			for (i = 0; i < data.length; i++) {
			
				var li = $("<li id=adtitle />").text(data[i].title); 
				var date = $('<li id=addate />').text(data[i].publishdate);
				var p = $("<p id=merinfo />").text("Mer info");
				ul.append(date);
				ul.append(li);
				li.append("</li>");
				
				var subul= $("<ul />");
				li.append(subul);
					
				
				var sublis = $("<li id=adbody />").text(data[i].body);
				subul.append(sublis)
				
				ul.append("<p />");
				
				ul.append('<br />');
	
			}
			
			$("li ul li");
			$("li ul").hide();
	
			$("#result li").click(function(){
					
				var hidden = $(this).find("ul:first:hidden").size() !=0;
				$("li ul").not($(this).parents("ul")).hide();
								
				if (hidden) {
					$(this).find("ul:first").show();
				}	
		});
		
		
	}, "json");
	

});

*/


//**********************************************************************************

// Inserting education and job in cv profile

//**********************************************************************************


$(".add_btn").click(function(event){
		
	event.preventDefault();
	
	$('.add_result ul').remove();
	
	/* var val = new Array();
	
	$('select > option:selected').each(function() {
    	 val.push($(this).val());
	});

		
	var search = $('#searchInput').val();
	 */
	 
	//var url = $(this).parent('#cvform').attr('action');
	var url = 'profile/insertcv';
	var edulevel= $('#edulevel').val();
	var eduname= $('#eduname').val();
	var schoolname= $('#schoolname').val();
	var edustart= $('#schoolname').val();
	var edustart= $('#schoolname').val();



	$.post( url, 
		{ 	edulevel	: edulevel, 
			eduname 	: eduname,
			schoolname  : schoolname,
			edustart 	: edustart,
			eduend 		: eduend
		}, 
		
		function(data){
				
			var ul= $("<ul />");
			$(".add_result").append(ul);
					
			for (i = 0; i < data.length; i++) {
			
				var li = $("<li />").text(data[i].name); 
				var sdate = $('<li />').text(data[i].startdate);
				var edate = $("<p id=merinfo />").text(data[i].enddate);
				ul.append(li)
					.append(sdate)
					.append(edate);
				
				
			}
			
			$("li ul li");
			$("li ul").hide();
	
			$("#result li").click(function(){
					
				
		});
		
		
	}, "json");
	

});




//**********************************************************************************

// required for initializing and terminating spotbox

//**********************************************************************************

		$('#rgstr_person').css('display','block');
		$('#rgstr_company').css('display','none');


		$('.sticker, .spotbox').live('click', function( event ){
			
			event.preventDefault();
			
			$('#rgstr_overlay').toggle();

						
			loadingDiv = $('<div class=loading />');
			$('<img />').appendTo(loadingDiv);
			
			var loginframe = $('<iframe width="400px" height="250" frameborder="0" scrolling="no"></iframe>');
			var registerframe = $('<iframe width="400px" height="490" frameborder="0" scrolling="no" ></iframe>');
			
			$('#rgstr_container').append(loadingDiv);
			
			if($(this).attr('href') == 'http://localhost/network/validation/register'){
				
				$('#rgstr_container').append(registerframe);
			
			} else {
				$('#rgstr_container').append(loginframe);
			}				
			
			$('#rgstr_container').children('iframe').attr('src', $(this).attr('href'))
						.hide();
			
			setTimeout(function(){
				$('.loading').remove();
				$('iframe').show();
			},1000);
			
			
			if ($(this).hasClass('sticker')) {
				$('#rgstr_person').css('display','none');
				$('#rgstr_company').css('display','block');
			};

			
		});
		
		
		$('#rgstr_close').click(function(event){
			event.preventDefault();
			$('iframe').remove();
			$('.loading').remove();
			$('#rgstr_overlay').toggle();
		
		});

		
		$('#login_close').click(function(event){
			event.preventDefault();
			$('iframe').remove();
			$('#login_overlay').toggle();
		
		});




		$('.sticker').click(function(event){
		
			event.preventDefault();
		});
		

		
		function change_parent_url(url)
        {
	    	setTimeout(function(){
	    		
	    		document.location=url;
	    		
	    	}, 1000);
        }	


//**********************************************************************************

// Open links in new window

//**********************************************************************************
	
	

$('.newwindow').click(function(){

	window.open(this.href);	
	return false;

});
	


$(".rounded").load(function() {
      
   $(this).wrap(function(){
      return '<span class="' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  
  
  });





//**********************************************************************************

// Left menu animation

//**********************************************************************************


  //When Mouse rolls over li
    $(".leftmenu").live('mouseover', function(){
        $(this).stop().animate({height:'60px'},{queue:false, duration:600, easing: 'easeOutBounce'})
    });

    //When Mouse cursor removed from li
    $(".leftmenu").live('mouseout', function(){
        $(this).stop().animate({height:'20px'},{queue:false, duration:600, easing: 'easeOutBounce'})
    });




// *************************************************************************************************






});
