$(document).ready(function(){
	jQuery.extend(jQuery.validator.messages, { 
   		required: "Campo obligatorio", 
   		remote: "Please fix this field.", 
   		email: "Por favor ingrese una direccion email valida", 
   		url: "Please enter a valid URL.", 
   		date: "Please enter a valid date.", 
   		dateISO: "Please enter a valid date (ISO).", 
   		number: "Please enter a valid number.", 
   		digits: "Please enter only digits.", 
   		creditcard: "Please enter a valid credit card number.", 
   		equalTo: "Please enter the same value again.", 
   		accept: "Please enter a value with a valid extension.", 
   		maxlength: jQuery.validator.format("Por favor ingrese no menos de {0} caracteres"), 
   		minlength: jQuery.validator.format("Por favor ingrese al menos {0} caracteres"), 
   		rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."), 
   		range: jQuery.validator.format("Please enter a value between {0} and {1}."), 
   		max: jQuery.validator.format("Please enter a value less than or equal to {0}."), 
   		min: jQuery.validator.format("Please enter a value greater than or equal to {0}.") 
	});
	$("#fono").mask('999-999-999');
	$(document).on('click','#enviar_email',function(){
		fname=$("#fname");
		lname=$("#lname");
		email=$("#email");
		subject=$("#subject");
		fono=$("#fono");
		message=$("#message");
		if(!fname.valid()){
			fname.focus();
			return;
		}
		if(!lname.valid()){
			lname.focus();
			return;
		}
		if(!email.valid()){
			email.focus();
			return;
		}
		if(!fono.valid()){
			subject.focus();
			return;
		}
		if(!subject.valid()){
			fono.focus();
			return;
		}
		if(!message.valid()){
			message.focus();
			return;
		}
		$.post(base_url+'contacto/email', 
			{
				param1: 'value1',
				fname:$("#fname").val(),
				lname:$("#lname").val(),
				email:$("#email").val(),
				subject:$("#subject").val(),
				fono:$("#fono").val(),
				message:$("#message").val()
			}, 
			function(data, textStatus, xhr) {
			console.log(data);
			console.log(textStatus);
			console.log(xhr);
			if (textStatus) {
				//window.location=base_url;
			}
		});
	});
});