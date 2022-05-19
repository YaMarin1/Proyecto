<?php
if (isset($_GET['documento'])) {
	include('../db/database.php');
	$cliente = new Database();
	$documento = intval($_GET['documento']);
	$res = $cliente->delete($documento);
	if ($res) {
		header('location: ../view/user.php');
	} else {
		echo "Error al eliminar el registro";
	}
}
