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
            $mail->SMTPDebug  = 1;                   
            $mail->SMTPAuth   = true; 
            $mail->SMTPSecure = "tls";               
            $mail->Host       = "smtp.gmail.com";
            //datos del servidor de email
            $mail->Username   = "prccnoreply@gmail.com";       
            $mail->Password   = "20574205";        
            $mail->SetFrom($_POST["email"]);
            $mail->AddReplyTo(APP_EMAIL,"Gerbera floreria");
            //asunto    
            $mail->Subject = $_POST["subject"];
            //mensaje
            $mail->Body = $_POST["message"];

            $mail->AddAddress(APP_EMAIL);
            
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

            $mail2->AddAddress($_POST["email"]);
            
            $mail2->Send();




    } 


	
}
?>