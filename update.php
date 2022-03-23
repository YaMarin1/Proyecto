<?php
	if (isset($_GET['id_usuarios'])){
		$id=intval($_GET['id_usuarios']);
	} else {
		header("location:index2.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Actualizar datos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index2.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("db/database.php");
				$clientes= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$documento = $usuarios->sanitize($_POST['documento']);
					$nombre = $usuarios->sanitize($_POST['nombre']);
					$apellido = $usuarios->sanitize($_POST['apellido']);
					$telefono = $usuarios->sanitize($_POST['telefono']);
					$direccion = $usuarios->sanitize($_POST['direccion']);
					$username = $usuarios->sanitize($_POST['username']);
					$password = $usuarios->sanitize($_POST['password']);
					$rol_id = $usuarios->sanitize($_POST['rol_id']);
					$id_usuarios=intval($_POST['id_usuarios']);

					$res = $usuarios->update($documento,$nombre,$apellido,$telefono,$direccion,$username,$password,$rol_id,$id_usuarios);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
					
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
					$datos_cliente=$usuarios->single_record($id_usuarios);
				}
				
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Documento:</label>
					<input type="number" name="documento" id="documento" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->documento;?>">
				</div>
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->nombre;?>">
					<input type="hidden" name="id_usuarios" id="id_usuarios" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->id_usuarios;?>">
				</div>
				<div class="col-md-6">
					<label>Apellido:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->apellido;?>">
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" required><?php echo $datos_cliente->direccion;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->telefono;?>">
				</div>
				<div class="col-md-6">
					<label>Username:</label>
					<input type="email" name="username" id="username" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->username;?>">
				</div>
				<div class="col-md-6">
					<label>Password:</label>
					<input type="text" name="password" id="password" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->password;?>">
				</div>
				<div class="col-md-6">
					<label>Rol:</label>
					<input type="number" name="rol_id" id="rol_id" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->rol_id;?>">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>
