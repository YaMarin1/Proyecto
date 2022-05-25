<?php
	session_start();
	include_once('../db/database.php');

	if(isset($_POST['editar'])){
		$database = new Database();
		$db = $database->connect_db();
		try{
			$documento = $_GET['documento'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$rol_id = $_POST['rol_id'];

			$sql = "UPDATE usuarios SET documento = '$documento', nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', direccion = '$direccion', username = '$username', password = '$password', rol_id = '$rol_id', WHERE documento = '$documento'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuario actualizado correctamente' : 'No se puso actualizar usuario';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: index.php');

?>