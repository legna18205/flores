<?php


class reportesController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
  	// $this->_index=$this->loadModel('principal');	
    }

    public function index()
    {

    	 $array = array();
       
		
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'reportes';
			$this->_view->renderizar('index');
							
			
	}	
	
}


?>