<?php
class galeriaController extends Controller{
	private $_controlador;
  public $_seccion;
    public function __construct() {
        parent::__construct();
  	 	$this->modelo=$this->loadModel('galeria');	
    }

    public function index($seccion=false){
    
    
     $this->_view->_seccion=$this->modelo->traer_id($seccion);
   

     $this->_view->_seccion['fotos']=$this->modelo->fotos($this->_view->_seccion['id_seccion']);
    
      $this->_view->setJs(array('index'));
		  $this->_view->setCss(array('css'));
       $this->_view->titulo = ''.$seccion;
		  $this->_view->renderizar('index');
	  }	
    public function eliminar()
    {
      
      $this->modelo->eliminar($_POST['id']);
    }
	
}
?>