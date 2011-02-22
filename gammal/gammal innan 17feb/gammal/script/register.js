 $(function() {
		

//**********************************************************************************

// Change register alternative choosen with radiobutton

//**********************************************************************************		
	

			$('#rgstr_close').click(function(event){
			event.preventDefault();
			$('iframe').remove();
			$('#rgstr_overlay').toggle();
		
		});
		
		$('input:radio').click(function(event){
						
						if($(this).attr('id')=='private'){
							
							$('#rgstr_person').css('display','block');
							$('#rgstr_company').css('display','none');
						}
						else if($(this).attr('id')=='company'){
							$('#rgstr_person').css('display','none');
							$('#rgstr_company').css('display','block');
						
						}
		});
		
//**********************************************************************************

// Erasing the default text-input value on focus and resettig it on blur - not enabled

//**********************************************************************************		
					
		$('ul input').each(function() {
			var default_value = this.value;
			$(this).focus(function() {
				if(this.value == default_value) {
					this.value = '';
				}
			});
			$(this).blur(function() {
				if(this.value == '') {
					this.value = default_value;
				}
		});
});




//**********************************************************************************

// Validate registration form

//**********************************************************************************		



$('#submit').click(function(event){
		
	event.preventDefault();
		
	var form = $(this).parents('form');
	var submit = $(this).attr('name'); 
	var value = [];
		
	$(form).find('input:password,input:text').each(function(i){
	
		value[i]= $(this).val();
		
	});  
	
	
	$.ajax({
		
			url: 		'/network/validation/register',
			type: 		'POST',
			data: 		{ 'ajax' : 1, 'submit' : submit, 'value' : value },
			dataType: 	'json',
			success: function(data){
			
				$('input[name="firstname"]').next('span').text(data.validate_firstname);
				$('input[name="lastname"]').next('span').text(data.validate_lastname);
				$('input[name="personnr"]').next('span').text(data.validate_personnr);
				$('input[name="username"]').next('span').text(data.validate_username);
				$('input[name="email"]').next('span').text(data.validate_email);
				$('input[name="password"]').next('span').text(data.validate_password);
				$('input[name="confirm_password"]').next('span').text(data.validate_confirm);
				$('body').html(data.reg_success);
				$(window.parent.document).find('iframe').attr('height',data.frame_height);
				} 
			
			});	
});




//**********************************************************************************

// Erasing the default text-input value when submit is clicked. - not enabled

//**********************************************************************************		
		
	/* 	var default_value_arr = [];
		
		$('ul input').each(function(index) {
			default_value_arr[index]= this.value;
		});
		
		
			
		$('#submit').click(function() {
			$.each(default_value_arr, function(i,v){
					$('ul input').each(function(index) {
					if(this.value == v) this.value='';
				});
			
				
			});
		}); */
		
		
//**********************************************************************************


});