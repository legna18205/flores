$(document).ready(function(){




$( document ).on( "click", "#recuperar", function() {

	
		
			var correo=$("#correo").val();
			$.post(base_url + 'recuperar/recuperarcuenta','correo='+correo, function(datos){

			
				if(!datos.login){

					
					alertify.alert("El correo ingresado no esta asociado a ninguna cuenta.");

				}

				else{


					var clave=Math.floor((Math.random() * 1000000) + 1);alert(datos.login);

					$.post(base_url + 'recuperar/actualizarclave','nueva='+clave+'&login='+datos.login, function(){

						alertify.alert("clave restablesida exitosamente se le ha enviado un correo con su nueva clave.");
				
			});


					$.post(base_url + 'recuperar/enviaremail','login=' +datos.login+ '&clave=' +clave+'&email='+datos.email, function(){

						});

				}
			



				
			
			
			
			
			},'json');

			});


$( document ).on( "click", "#cambiarclave", function() {
	



	if($("#nueva").val() == $("#confirmar").val()){
		




		$.post(base_url + 'recuperar/buscarusuario','actual='+$("#actual").val(), function(datos){

		
				if(!datos){

					alert("error de autentificacion, verifique e intente nuevamente...");
					
				}
				else {
			
						$.post(base_url + 'recuperar/cambiarclave','actual='+$("#actual").val()+ '&nueva='+$("#nueva").val(), function(){
							alert("clave modificada correctamente");
							javascript:history.back()

					}); }
		
			
},'json');

	

	}

	else {

			alert("las claves no coinciden...")

			
			}	
			
			
			});
	
	


});
