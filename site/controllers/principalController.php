<?php
class principalController extends Controller{
	private $_principal;
  public $_seccion;
    public function __construct() {
        parent::__construct();
  	 	$this->_principal=$this->loadModel('principal');	
    }

    public function index(){
          	
      $this->_view->_seccion=$this->_principal->secciones();
      $this->_view->setJs(array('index'));
		  //$this->_view->setCss(array('css'));
       $this->_view->titulo = 'Gerbera';
		  $this->_view->renderizar('index');
	  }	
	
}
?>