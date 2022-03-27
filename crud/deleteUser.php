<?php 
if (isset($_GET['id_usuarios'])){
	include('../db/database.php');
	$cliente = new Database();
	$id_usuarios=intval($_GET['id_usuarios']);
	$res = $cliente->delete($id_usuarios);
	if($res){
		header('location: ../view/user.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>
