<?php 
if (isset($_GET['idproductos'])){
	include('../db/database.php');
	$productos = new Database();
	$idproductos=intval($_GET['idproductos']);
	$res = $productos->deleteProductos($idproductos);
	if($res){
		header('location: ../view/productos.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
