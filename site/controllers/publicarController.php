<?php
class publicarController extends Controller{
	private $_principal;
  public $_seccion;
    public function __construct() {
        parent::__construct();
  	 //	$this->_publicar=$this->loadModel('publicar');	
    }

    public function index(){
          	
      
      $this->_view->setJs(array('dropzone','js'));
		  //$this->_view->setCss(array('css'));
       $this->_view->titulo = 'publicar';
		  $this->_view->renderizar('index');
	  }	
    public function upfile(){


      $this->getLibrary('simpleimage');


      for ($i=0; $i < count($_FILES['file']['name']) ; $i++) {      

        $array['grande'][$i]=$ruta="public/img/propiedades500/".$_FILES['file']['name'][$i];
        $array['pequena'][$i]=$ruta60="public/img/propiedades64/".$_FILES['file']['name'][$i];
        $array['prueba'][$i]=$prueba="public/img/prueba/".$_FILES['file']['name'][$i];

        move_uploaded_file($_FILES['file']['tmp_name'][$i], $ruta);
        // copy($ruta,$ruta60);
        $image = new SimpleImage();
        $image->load($ruta);
        //-----
        $h=$image->get_height();
        $w=$image->get_width();
        
        //-----
        $min = ($h < $w) ? $h : $w ;
        $max = ($h > $w) ? $h : $w ;

        $resto=$max-$min;

        $lados = ($resto/2);

        echo "max:".$max." -- >min:".$min;
        echo "---h:".$h." -- >w:".$w;
        echo "---resto:".$resto." -- >lados:".$lados;
        if($max==$w){
          $image->crop($lados,0,($w-$lados),$h);
        }
        else{
          $image->crop(0,$lados,$w,($h-$lados));
        }
        $image->resize(450,450);
        $image->save($grande);
        $image->resize(80,80);
        $image->save($ruta60);
      }

      if ($_POST['bn']==0) {
      $this->_propiedad->guardar($_POST,$array);
     
      }else{
       
      $this->_propiedad->actualiza($_POST,$array);
      }
    } 




}
?>