<?php

    if(isset($_POST['documento'])){
    /**Se guarda la informacion del POST en variables */
    
        $documento=$_POST['documento'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $rol_id = 2;
    
    /**Se valia que ninguno dato del POST llego vacio*/
    if(empty($documento) || empty($nombre) || empty($apellido) || empty($telefono) || empty($direccion) || empty($username) || empty($password)){
        echo '<div class="alert alert-danger">Complete los campos</div>';
    }else{
        /**Se crea objeto de REGISTRO */
        $registro = new Registro;

        /**Se llama el metodo insertRegistro*/
        if($registro->insertRegistro($documento,$nombre,$apellido,$telefono,$direccion,$username,$password,$rol_id)){
            header('Location: ../view/login.php');
        }else{
         echo '<div class="alert alert-success" role="alert">
                    Usuario registrado correctamente
            </div>';
            
        }
    }

}
?>