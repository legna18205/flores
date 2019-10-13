<?php
class GaleriaModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
	public function traer_id($nombre_galeria){

	 $sql="SELECT * FROM secciones WHERE titulo = '$nombre_galeria'";

		    $datos = $this->_db->query($sql);        
        return $datos->fetch(PDO::FETCH_ASSOC);

	}

	public function fotos($id){

	  $sql="SELECT * FROM fotos WHERE id_seccion = '$id'";

		    $datos = $this->_db->query($sql);        
        return $datos->fetchall(PDO::FETCH_ASSOC);

	}
	public function sub_menu(){

	  $sql="SELECT * FROM secciones";

		    $datos = $this->_db->query($sql);        
        return $datos->fetchall(PDO::FETCH_ASSOC);

	}




}
?>