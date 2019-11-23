<?php
class contactoController extends Controller{
	private $_controlador;
  public $_seccion;
    public function __construct() {
        parent::__construct();
  	 	//$this->modelo=$this->loadModel('Galeria');	
    }

    public function index(){
    
    
    
      $this->_view->setJs(array('js'));
		  //$this->_view->setCss(array('css'));
       $this->_view->titulo = 'contacto';
		  $this->_view->renderizar('index');
	  }	


        public function email(){
    $this->getLibrary('class.phpmailer');
            //print_r($_POST);
           //configuracion del servidor de correo///
          
            $mail = new PHPMailer();

            $mail->IsSMTP(); 
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug  = 1;                   
            $mail->SMTPAuth   = true; 
            $mail->Debugouput='html';
            $mail->Host = "mail.floristeriagerbera.com";
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
           $mail->SMTPOptions= array(
            'ssl' => array
                ('verify_peer' => false ,
                 'verify_peer_name' =>false,
                 'allo_self_signed'=>true    
                ) 
            );
            //datos del servidor de email
            $mail->Username   = "gerbera@floristeriagerbera.com";       
            $mail->Password   = "Xsg162**";

            //$mail->SetFrom(APP_EMAIL);
            $mail->SetFrom(APP_EMAIL);
            //$mail->AddReplyTo(APP_EMAIL,"Gerbera floreria");
            //asunto    
            $mail->Subject = $_POST["subject"];
            //mensaje


            $mensaje = '<html>'.
            '<head><title>Correo</title></head>'.
            '<body><h1>'.$_POST["fname"]." ".$_POST["lname"].' quiere contactarse con usted</h1>'.
            '<hr>'.
            '<font style="font-size: 23px;color: grey;">'.$_POST["message"].'</font>'.
            '<h3>correo: '.$_POST["email"]."</h3>".
            '<h3>telefono: '.$_POST["fono"]."</h3>".
            '<hr>'.
            'Envio automatico'.
            '</body>'.
            '</html>';


            $mail->Body = $mensaje;

            $mail->AddAddress(APP_EMAIL);
            $mail->IsHTML(true);


            $mail->Send();



            $mail2 = new PHPMailer();
            $mail2->IsSMTP(); 
            $mail2->CharSet = 'UTF-8';
            $mail2->SMTPDebug  = 1;                   
            $mail2->SMTPAuth   = true; 
            $mail2->Debugouput='html';
            $mail2->Host = "mail.floristeriagerbera.com";
            $mail2->Port = 587;
            $mail2->SMTPSecure = 'tls';
            $mail2->SMTPOptions= array(
            'ssl' => array
                ('verify_peer' => false ,
                 'verify_peer_name' =>false,
                 'allo_self_signed'=>true    
                ) 
            ); 
            
            //datos del servidor de email
            $mail2->Username   = "gerbera@floristeriagerbera.com";       
            $mail2->Password   = "Xsg162**";       
            $mail2->SetFrom(APP_EMAIL);
            //$mail2->AddReplyTo(APP_EMAIL,"Gerbera floreria");
            //asunto    
            $mail2->Subject = "Informacion de tu peticion gerbera floreria";
            //mensaje

            $mensaje2 = '<html>'.
            '<head><title>Correo</title></head>'.
            '<body><h1>hola '.$_POST["fname"]." ".$_POST["lname"].'</h1>'.
            '<hr>'.
            '<font style="font-size: 23px;color: grey;">Gracias por escribirnos nuestros ejecutivos de ventas se comunicaran con usted a la brevedad</font>'.
            '<h2>verifique sus datos</h2>'.
            '<h3>correo: '.$_POST["email"]."</h3>".
            '<h3>telefono: '.$_POST["fono"]."</h3>".
            '<hr>'.
            'Envio automatico'.
            '</body>'.
            '</html>';


            $mail2->Body = $mensaje2;
            $mail2->AddAddress($_POST['email']);
            $mail2->IsHTML(true);
            $mail2->Send();




    } 


	
}
?>