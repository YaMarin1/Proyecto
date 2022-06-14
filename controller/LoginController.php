<?php
    include_once '../database.php';
    
    session_start();
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ../view/admin.php');
            break;

            case 2:
            header('location: ../view/ofertas.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[7];
            $documento = $row[0];
            $tokenUser = $row[8];
            
            $_SESSION['rol'] = $rol;
            $_SESSION['documento'] = $documento;
            $_SESSION['tokenUser'] = $tokenUser;

            switch($rol){
                case 1:
                    header('location: ../view/admin.php');
                break;

                case 2:
                    header('location: ../view/ofertas.php');
                break;

                default:
            }
        }else{
            // No existe el usuario
            echo '<div class="alert alert-danger" role="alert">
                Correo de usuario o contraseña incorrecto
            </div>';
            
        }
            
    }

?>