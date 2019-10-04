<?php

class errorController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index($cod=false)
    {
        $this->_view->titulo = 'Error';
        $this->_view->mensaje = $this->_getError($cod);
        $this->_view->setCss(array('css'));
        $this->_view->renderizar('index');
    }

    
    public function access($codigo)
    {
        $this->_view->titulo = 'Error';
        $this->_view->mensaje = $this->_getError($codigo);
        $this->_view->renderizar('access');
    }
    
    private function _getError($codigo = false)
    {
        if(!$codigo){
             $codigo = 'default';
        }
        else{
           
        }        
        
        $error['default'] = 'Ha ocurrido un error y la página no puede mostrarse';
        $error['5050'] = 'Acceso restringido!';
        $error['8080'] = 'Tiempo de la sesion agotado';
        $error['1234'] = 'disculpe. este usuario no existe';
        $error['963'] = 'disculpe. esta publicacion no existe';
        $error['964'] = 'disculpe. usted no posee los permisos para modificar esta publicacion';
        
        if(array_key_exists($codigo, $error)){
            return $error[$codigo];
        }
        else{
            return $error['default'];
        }
    }
}

?>