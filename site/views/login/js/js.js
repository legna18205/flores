$(document).ready(function(){
//--inicio facebook------------------------------------------------------------------------------
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '382026442490102',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.3'
    });
  };


function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        var nombre=response.first_name+" "+response.last_name;
        var email=response.email;
        var imagen=response.picture.data.url;              

              $.post(base_url+'login/login_google',{
              nombre: nombre,
              foto: imagen,
              email: email
              }, function(data) {
                  var html='';                            
                    html+="<div class='dropdown'>";
                    html+="<button class='rd-nav-link dropdown-toggle btn-usuario' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    html+="<div id='avatar-mini'  ></div>"
                    html+=email;
                    html+="</button>";
                    html+="<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                    html+="<a class='dropdown-item' href='"+base_url+"recuperar/cambiar'>Canbiar Contraseña</a>";
                    html+="<a class='dropdown-item' href='"+base_url+"login/cerrar'>Cerrar Sesión</a>";
                    html+="</div>";
                    html+="</div>";
                      
                $(".boton-usuario-login").html(html);
                $('.boton-usuario-login-no-login').css('visibility', 'hidden');
                $('.boton-usuario-login-no-login').css('display', 'none');
                $('#avatar-mini').css('background-image', 'url("'+data.foto+'")');
                $('#avatar-mini').css('background-size', 'contain');        
                $(location).attr('href',base_url);
              },"json");
    });
}

  var facebookLogin = function() {
    FB.login(function(response) {
        if (response.authResponse) {
         
         getFbUserData();
        } else {
         $('#error-login').html('error de logueo con Facebook');
        }
    });
  }

  $(document).on('click', '#login-facebook', function() {      
      facebookLogin();
  });



//--inicio google-------------------------------------------------------------------------------
  var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '550716738087-s3vhb8tj13t9ikus03s60co75agbgjj4.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {  
    auth2.attachClickHandler(element, {},
        function(googleUser) {
           var profile = googleUser.getBasicProfile(); 
           var id_token = googleUser.getAuthResponse().id_token;     
           var xhr = new XMLHttpRequest();
           xhr.open('POST', 'https://localhost.com/tokensignin');
           xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           xhr.onload = function() {};
           xhr.send('idtoken=' + id_token);
              $.post(base_url+'login/login_google',{
                nombre: profile.getName(),
                foto: profile.getImageUrl(),
                email: profile.getEmail()
              }, function(data) {
                  var html='';                            
                    html+="<div class='dropdown'>";
                    html+="<button class='rd-nav-link dropdown-toggle btn-usuario' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    html+="<div id='avatar-mini'  ></div>"
                    html+=profile.getEmail();
                    html+="</button>";
                    html+="<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                    html+="<a class='dropdown-item' href='"+base_url+"recuperar/cambiar'>Canbiar Contraseña</a>";
                    html+="<a class='dropdown-item' href='"+base_url+"login/cerrar'>Cerrar Sesión</a>";
                    html+="</div>";
                    html+="</div>";
                      
                $(".boton-usuario-login").html(html);
                $('.boton-usuario-login-no-login').css('visibility', 'hidden');
                $('.boton-usuario-login-no-login').css('display', 'none');
                $('#avatar-mini').css('background-image', 'url("'+data.foto+'")');
                $('#avatar-mini').css('background-size', 'contain');
                $(location).attr('href',base_url);
              },"json");
        }, function(error) {
          $('#error-login').html('error de logueo con google');
         // alert(JSON.stringify(error, undefined, 2));
        });
  }
  startApp();

$( "#enviar" ).click(function() {
  $( "#form-login" ).submit();
});

});