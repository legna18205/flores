<?php
class registroController extends Controller{
    private $_registro;
    
    public function __construct() {
        parent::__construct();        
        $this->_registro = $this->loadModel('registro');
    }
    
    public function index(){
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        $this->_view->titulo = 'Registro';
       	//$this->_view->setJs(array('js','validate'));
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('index'));
        $this->_view->renderizar('index', 'registro');
    }

    public function registrar(){
        echo json_encode($this->_registro->registrarUsuario(
            $_POST['clave'],
            $_POST['email']
        ));
    }

    public function verificarEmail(){
        if($this->_registro->verificarEmail($_POST['email'])){
            echo 0;                
        }else{
            echo 1;
        }
    }
}
?>