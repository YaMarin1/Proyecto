<?php
    $conexion = new mysqli('localhost','root','root','mundoanimal');
    if ($conexion-> connect_error) {
        die('No se pudo conectar al servidor');
    }
?>