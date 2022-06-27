<?php
    include "conexion.php";
    include "../db/database.php";
    // Traemos la variable por post
    $email = $_POST['email'];
    // Se genera un token
    $token = random_bytes(5);

    include "../mail/mail_reset.php";
    if ($enviado) {
        $conexion->query("INSERT INTO passwords(email,token,codigo)
        VALUES('$email','$token','$codigo')" or die($conexion->error));
        echo '<p>Verifica tu email para restablecer tu cuenta</p>';
    }
    
?>