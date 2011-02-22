$(function(){
	

//**********************************************************************************************

// Send user logindata with ajax, remove iframe if validation succeed - validation not enabled

//**********************************************************************************************		


	$('#submit').click(function(event){
	
	event.preventDefault();

	var data = [];
	var submit = $(this).attr('name'); 
	
	var form = $(this).parents('form');
	var newvalue = {};
	var name= {};
	var value = {};
	var newname= [];
	var arr = [];
	
	$(form).find('input:password,input:text').each(function(i){
		
		value[i] = $(this).val();
	});  		
	
	$.ajax({
	
		url: 		'login',
		type: 		'POST',
		data: 		{ 'ajax' : 1, 'submit' : submit, 'value' : value },
		dataType: 	'json',
		success: function(data){
						
		
			if (data.success) {
			
				$(window).unload(function(){
					window.parent.location = '../main/mypage';
				});
			
				$(window.parent.document.getElementById('rgstr_overlay')).remove();				
			}
			
			else if (data.errorlogin) {
			
				$('input[name="username"]').next('span').text("");
				$('input[name="password"]').next('span').text(data.errorlogin);
			}
			
			else {
			
				$('input[name="username"]').next('span').text(data.validate_username);
				$('input[name="password"]').next('span').text(data.validate_password);
			
			}
		}
			
	});   	
});



//**********************************************************************************************



});