<?php
class publicarModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
	public function secciones(){
		$sql="SELECT * FROM 
			  secciones";
		$datos = $this->_db->query($sql);
        return $datos->fetchall();
	}

	
    function guardar($datos){
for ($i=0; $i < count($datos['grande']) ; $i++) { 
     $sql ="INSERT into fotos values(null,'".$datos['categ'][$i]."','".$datos['titulo'][$i]."','".$datos['descrip'][$i]."','".$datos['grande'][$i]."','".$datos['pequena'][$i]."')";
   	$this->_db->query($sql);
   	}
   }

}
?>