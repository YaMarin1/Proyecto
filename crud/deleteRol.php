<?php 
if (isset($_GET['id_rol'])){
	include('../db/database.php');
	$rol = new Database();
	$id_rol=intval($_GET['id_rol']);
	$res = $rol->deleteRol($id_rol);
	if($res){
		header('location: ../view/roles.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
