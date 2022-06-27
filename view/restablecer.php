<?php
    include "../db/database.php";
    // Traemos la variable por post
    $username = $_POST['username'];
    // Se genera un token
    $token = random_bytes(5);

    include "../mail/mail_reset.php";
    if ($enviado) {
        $con->mysqli_query("INSERT INTO passwords(username,token,codigo)
        VALUES('$username','$token','$codigo')" or die($con->error));
        echo '<p>Verifica tu email para restablecer tu cuenta</p>';
    }
    
?>