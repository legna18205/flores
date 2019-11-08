<?php
class publicarController extends Controller{
	private $_principal;
  public $_seccion;
    public function __construct() {
        parent::__construct();
  	 	$this->_publicar=$this->loadModel('publicar');	
    }

    public function index(){
          	
      
      $this->_view->setJs(array('dropzone','js'));
		  $this->_view->setCss(array('css'));
       $this->_view->titulo = 'publicar';
       $this->_view->categorias = $this->_publicar->secciones();
      
		  $this->_view->renderizar('index');
	  }	
    public function upfile(){


      $this->getLibrary('simpleimage');

      

      for ($i=0; $i < count($_FILES['fotos']['name']) ; $i++) {      

        $array['grande'][$i]=$ruta="public/img/images/big-images/".$_FILES['fotos']['name'][$i];
        $array['pequena'][$i]=$ruta60="public/img/images/".$_FILES['fotos']['name'][$i];
        $array['titulo'][$i]=$_POST["titulo"]; 
        $array['descrip'][$i]=$_POST["descrip"]; 
        $array['categ'][$i]=$_POST["categ"];
       
        move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $ruta);
        copy($ruta,$ruta60);
        
   

      
      
     
     
    } 

      $this->_publicar->guardar($array);

      $this->redireccionar("publicar/");
}


}
?>