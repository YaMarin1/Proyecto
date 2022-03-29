<?php 

    class Registro extends Database{

        public function insertRegistro($documento, $nombre, $apellido, $telefono, $direccion, $username, $password,$rol_id){
            $sql = "INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('$documento','$nombre','$apellido','$telefono','$direccion','$username','$password','$rol_id')";

            if($result = $this->connect()->query($sql)){
                return true;
            }else{
                return false;
            }
            
        }
    }