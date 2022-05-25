<?php
	session_start();
	include_once('../db/database.php');

	if(isset($_GET['documento'])){
		$database = new Database();
		$db = $database->connect_db();
		try{
			$sql = "DELETE FROM usuarios WHERE documento = '".$_GET['documento']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Usuario Borrado' : 'Hubo un error al borrar usuario';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: index.php');

?>