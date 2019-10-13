$(document).ready(function(){
	
	$(document).on('click','#enviar_email',function(){
		$.post(base_url+'contacto/email', 
			{
				param1: 'value1',
				fname:$("#fname").val(),
				lname:$("#lname").val(),
				email:$("#email").val(),
				subject:$("#subject").val(),
				message:$("#message").val()
			}, 
			function(data, textStatus, xhr) {
			console.log(data);
			console.log(textStatus);
			console.log(xhr);
		});
	});


});