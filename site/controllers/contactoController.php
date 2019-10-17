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
    
            
    
           //configuracion del servidor de correo///
            $this->getLibrary('class.phpmailer');
            $mail = new PHPMailer();

            $mail->IsSMTP(); 
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug  = 1;                   
            $mail->SMTPAuth   = true; 
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPOptions = array(
                'ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)
            );
            //datos del servidor de email
            $mail->Username   = "prccnoreply@gmail.com";       
            $mail->Password   = "20574205";        
            $mail->SetFrom($_POST["email"]);
            $mail->AddReplyTo(APP_EMAIL,"Gerbera floreria");
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
            $mail2->SMTPDebug  = 1;                   
            $mail2->SMTPAuth   = true; 
            $mail2->SMTPSecure = "tls";               
            $mail2->Host       = "smtp.gmail.com";
            //datos del servidor de email
            $mail2->Username   = "prccnoreply@gmail.com";       
            $mail2->Password   = "20574205";        
            $mail2->SetFrom(APP_EMAIL);
            $mail2->AddReplyTo(APP_EMAIL,"Gerbera floreria");
            //asunto    
            $mail2->Subject = "mensaje a gebera floreria";
            //mensaje
            $mail2->Body = "Gracias por escribirnos nuestros ejecutivos de ventas se comunicaran con usted a la brevedad";

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
            $mail2->AddAddress($_POST["email"]);
            $mail2->IsHTML(true);
            $mail2->Send();




    } 


	
}
?>