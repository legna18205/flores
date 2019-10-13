<?php
class principalModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
	public function secciones(){
		$sql="SELECT * FROM 
			  secciones";
		$datos = $this->_db->query($sql);
        return $datos->fetchall();
	}

	public function traer_img($id){
		 $sql="SELECT DISTINCT * FROM fotos WHERE id_publicacion='$id' ORDER BY `id_publicacion` DESC";
		$datos = $this->_db->query($sql);
        return $datos->fetchall();
	}

}
?>