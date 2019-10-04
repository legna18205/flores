<?php
class registroModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function verificarEmail($email){
        $id_usuario = $this->_db->query(
                "select id_usuario from usuario where email = '$email'"
        );        
        if($id_usuario->fetch()){
            return true;
        }        
        return false;
    }

    public function registrarUsuario($pass, $email){
        $sql="insert into usuario values ('','public/img/profile/usuario_out.jpg','2','$email','','" . Hash::getHash('sha1', $pass, HASH_KEY) ."','1','')";
        $resultado = $this->_db->query($sql);
        if(!$resultado){
            return 0;
        }
        $resultado = $resultado->rowCount();
         $id=$this->_db->lastInsertId();
         $sql=" INSERT INTO `persona` (`per_codigo`, `per_rut`, `per_nombre`, `per_telefono`, `per_obs`, `per_usu_codigo`) VALUES (NULL, '', '', '', '', '$id')";
         $this->_db->query($sql);
        return $resultado;
    }

    public function getUsuario($id_usuario, $codigo){
        $usuario = $this->_db->query(
                    "select * from usuario where id_usuario = $id_usuario and codigo = '$codigo'"
        );                    
        return $usuario->fetch();
    }
        
}?>