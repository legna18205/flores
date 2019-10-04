<?php
class principalModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
	public function traer_publicacion(){
		$sql="SELECT propiedad.* FROM 
			  propiedad where activo=1
			  ORDER BY `id_propiedad` DESC ";
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