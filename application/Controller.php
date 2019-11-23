<?php

ob_start();

abstract class Controller
{
    protected $_view;
    protected $_modelo;
    
    public function __construct() {
        $this->_view = new View(new Request);

        $this->_modelo=$this->loadModel('galeria');
        $this->_view->menus=$this->_modelo->sub_menu();
        //print_r($this->_view);
    }
    
    abstract public function index();
    
    protected function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'site'.DS.'models' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo '.$modelo);
        }
    }
     protected function includeModel($modelo)
    {
        
        $rutaModelo = ROOT . 'site'.DS.'models' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
        }
        else {
            throw new Exception('Error en inclucion de modelo '.$modelo);
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    
   
    
    protected function redireccionar($ruta = false){

       print_r(header_remove());
       print_r(headers_list());
  
       
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            
        }
        else{
            header('location:' . BASE_URL);
           
        }
    }

   
	

	
	
}

?>