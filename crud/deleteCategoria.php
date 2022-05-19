<?php 
if (isset($_GET['idcategoria'])){
	include('../db/database.php');
	$categoria = new Database();
	$idcategoria=intval($_GET['idcategoria']);
	$res = $categoria->deleteCat($idcategoria);
	if($res){
		header('location: ../view/categoria.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
