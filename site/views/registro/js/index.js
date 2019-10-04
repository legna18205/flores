$(document).ready(function(){	

$( document ).on( "click", "#enviar_registro", function() {
	var email=  $('#email');
  var clave= $('#clave1');
  var clave2= $('#clave2');
  if (email.data('bandera')==0) {
    email.focus();
    $('#error').html('<center>Email no valido formato incorrecto</center>');
    return;
  }

  if (clave.data('bandera')==0) {
    clave.focus();
    $('#error').html('<center>La clave no cumple con la condiciones</center>');
    return;
  }

  if (clave2.data('bandera')==0) {
    clave2.focus();
    $('#error').html('<center>Los campos de contraseña no coinciden</center>');
    return;
  }

  $.post(base_url+'registro/verificarEmail',
    {
      email: email.val()
    },function(e){
      if (e==0) {
        $('#error-email').html('Email se encuentra ya registrado.');
      }else{
      $.post(base_url+'registro/registrar',
        {
          email:  email.val(),
          clave: clave.val()
        },function(e){
          if (e==0) {
            console.log("Error de registro");
          }else{
            console.log("Registro exitoso");
            window.location.href = base_url+"login";
          }
        },'json');
      }
  },'json');
});


//validaciopn del campo de email eventos ------------------------------
$( document ).on( "keyup", "#email", function() {
  console.log('validacion keyup email');
    var valor = $(this).val();
    var contraseña = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/igm;
    if (valor.match(contraseña)!=null) {
    	$(this).css('border-color','#80bdff');
    	$(this).css('box-shadow','0 0 0 0.2rem rgba(0, 123, 255, 0.25)');

    	if($('#icon-correo')){
    		$('#icon-correo').remove();
	    }
      $("#email").data("bandera","1");
    	$(this).after('<span id="icon-correo" style="color:#80bdff;"  class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i></span>');
      $('#error-email').html('');
    }else{
        $('#error-email').html('Email no valido formato incorrecto');
        $(this).css('border-color','#ff000075');
        $(this).css('box-shadow','rgba(255, 0, 0, 0.25) 0px 0px 0px 0.2rem');
		if($('#icon-correo')){
      		$('#icon-correo').remove();
      	}
      $("#email").data("bandera","0");
    	$(this).after('<span id="icon-correo" style="color:#ff000075;"  class="input-group-text"><i class="fa fa-ban" aria-hidden="true"></i></span>');        
    }
});
$( document ).on( "blur", "#email", function() {
  console.log('validacion blur email');
    var valor = $(this).val();
    var contraseña = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/igm;
    if (valor.match(contraseña)!=null) {
      $(this).css('border-color','#80bdff');
      $(this).css('box-shadow','0 0 0 0.2rem rgba(0, 123, 255, 0.25)');

      if($('#icon-correo')){
        $('#icon-correo').remove();
      }
      $("#email").data("bandera","1");
      $(this).after('<span id="icon-correo" style="color:#80bdff;"  class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i></span>');
    $('#error-email').html('');
    }else{
        $('#error-email').html('Email no valido formato incorrecto');
        $(this).css('border-color','#ff000075');
        $(this).css('box-shadow','rgba(255, 0, 0, 0.25) 0px 0px 0px 0.2rem');
    if($('#icon-correo')){
          $('#icon-correo').remove();
        }
      $("#email").data("bandera","0");
      $(this).after('<span id="icon-correo" style="color:#ff000075;"  class="input-group-text"><i class="fa fa-ban" aria-hidden="true"></i></span>');        
    }
});
//validaciopn del campo de clave uno... eventos--------------------------
$( document ).on( "keyup", "#clave1", function() {
  console.log('validacion keyup clave1');
    var valor = $(this).val();
    var contraseña = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,10}$/g;
    if (valor.match(contraseña)!=null) {          
      $(this).css('border-color','#80bdff');
      $(this).css('box-shadow','0 0 0 0.2rem rgba(0, 123, 255, 0.25)');
      if($('#icon-clave1')){
        $('#icon-clave1').remove();
      }
      $("#clave1").data("bandera","1");
      $(this).after('<span id="icon-clave1" style="color:#80bdff;"  class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i></span>');
      $('#error-clave1').html('');
    }else{
      $('#error-clave1').html('Formato de clave invalido <br/>*Min 6 Max 10 <br/>*Por lo menos una mayuscula <br/>*Por lomenos un numero');
      $(this).css('border-color','#ff000075');
      $(this).css('box-shadow','rgba(255, 0, 0, 0.25) 0px 0px 0px 0.2rem');
      if($('#icon-clave1')){
        $('#icon-clave1').remove();
      }
      $("#clave1").data("bandera","0");
      $(this).after('<span id="icon-clave1" style="color:#ff000075;"  class="input-group-text"><i class="fa fa-ban" aria-hidden="true"></i></span>');
    }
});
$( document ).on( "blur", "#clave1", function() {
  console.log('validacion blur clave1');
    if($(this).val() == ''){return;}
    if ($(this).val() == $('#clave2').val()) {
      	$('#clave2').css('border-color','#80bdff');
        $('#clave2').css('box-shadow','0 0 0 0.2rem rgba(0, 123, 255, 0.25)');
        if($('#icon-clave2')){
   			$('#icon-clave2').remove();
   		}
      $("#clave2").data("bandera","1");
   		$('#clave2').after('<span id="icon-clave2" style="color:#80bdff;"  class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i></span>');
	     $('#error-clave2').html('');
  }else{
    	$('#clave2').css('border-color','#ff000075');
        $('#clave2').css('box-shadow','rgba(255, 0, 0, 0.25) 0px 0px 0px 0.2rem');
        if($('#icon-clave2')){
		   	$('#icon-clave2').remove();
      	}
        $("#clave2").data("bandera","0");
        $('#error-clave2').html('*Las contraseñas no coinciden');
      	$('#clave2').after('<span id="icon-clave2" style="color:#ff000075;"  class="input-group-text"><i class="fa fa-ban" aria-hidden="true"></i></span>');
    }
});
//validaciopn del campo de clave dos... eventos--------------------------
$( document ).on( "keyup", "#clave2", function() {        
  console.log('validacion keyup clave2');
        if ($(this).val() == $('#clave1').val()&& $(this).val() != '') {
          $(this).css('border-color','#80bdff');
          $(this).css('box-shadow','0 0 0 0.2rem rgba(0, 123, 255, 0.25)');
          if($('#icon-clave2')){
            $('#icon-clave2').remove();
          }
          $("#clave2").data("bandera","1");
          $(this).after('<span id="icon-clave2" style="color:#80bdff;"  class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i></span>');
          $('#error-clave2').html('');
        }else{
          $('#error-clave2').html('*Las contraseñas no coinciden');
          $(this).css('border-color','#ff000075');
          $(this).css('box-shadow','rgba(255, 0, 0, 0.25) 0px 0px 0px 0.2rem');
          if($('#icon-clave2')){
            $('#icon-clave2').remove();
          }
          $("#clave2").data("bandera","0");
          $(this).after('<span id="icon-clave2" style="color:#ff000075;"  class="input-group-text"><i class="fa fa-ban" aria-hidden="true"></i></span>');
        }
});


});


