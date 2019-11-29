<?php
class nosotrosController extends Controller{
	private $_controlador;
  public $_seccion;
    public function __construct() {
        parent::__construct();
  	 	//$this->modelo=$this->loadModel('Galeria');	
    }

    public function index(){
    
    
    
      //$this->_view->setJs(array('index'));
		  //$this->_view->setCss(array('css'));
       $this->_view->titulo = 'Nosotros';
		  $this->_view->renderizar('index');
	  }	
	
}
?>