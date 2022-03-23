<?php 
if (isset($_GET['id_usuarios'])){
	include('db/database.php');
	$usuarios = new Database();
	$id_usuarios=intval($_GET['id_usuarios']);
	$res = $usuarios->delete($id_usuarios);
	if($res){
		header('location: index2.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>
