<?php
class loginModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password){
      $sql="SELECT * FROM usuario 
                WHERE email = '$usuario' 
                AND password = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'";
    $datos = $this->_db->query( 
                "SELECT * FROM usuario 
                WHERE email = '$usuario' 
                AND password = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
                );        
        return $datos->fetch();
    }

    public function getUsuario_google($email){
        $sql="select * from usuario " .
                "where email = '$email' ";
        $datos = $this->_db->query( $sql );        
        return $datos->fetch();
    }

    public function registrarUsuario($foto,$email,$nombre,$password,$login){
        $sql="insert into usuario values ('','$foto','2', '$email','$login','" . Hash::getHash('sha1', $password, HASH_KEY) ."','1','$nombre')";
        $this->_db->query($sql);
        $id=$this->_db->lastInsertId();
        $sql="INSERT INTO `persona` (`per_codigo`, `per_rut`, `per_nombre`, `per_telefono`, `per_obs`, `per_usu_codigo`) VALUES (NULL, '', '', '', '', '$id')";
        $this->_db->query($sql);    
    }

    public function actualizar_foto_google($foto,$email){
        $sql="update usuario set foto='$foto' where email='$email'";
        $this->_db->query($sql);    
    }

}
?>