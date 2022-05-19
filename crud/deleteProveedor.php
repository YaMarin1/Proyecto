<?php 
if (isset($_GET['idproveedor'])){
	include('../db/database.php');
	$proveedor = new Database();
	$idproveedor=intval($_GET['idproveedor']);
	$res = $proveedor->deleteProveedor($idproveedor);
	if($res){
		header('location: ../view/proveedores.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
