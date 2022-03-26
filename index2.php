<?php 
    

include ('db/database.php');
$usuarios = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Listado de <b>Usuarios</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="view/admin.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Volver</a>
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar usuario</a>
                        </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Rol</th>
                        
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $listado=$usuarios->read(); ?>
                    <?php 
                        while ($row=mysqli_fetch_object($listado)){
                            $id_usuarios=$row->id_usuarios;
                            $documento=$row->documento;
                            $nombre=$row->nombre. " " .$row->apellido;
                            $telefono=$row->telefono;
                            $direccion=$row->direccion;
                            $username=$row->username;
                            $password=$row->password;
                            $rol_id=$row->rol_id;
                            ?>
                    <tr>
                        <td><?php echo $documento;?></td>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $password;?></td>
                        <td><?php echo $rol_id;?></td>
                        <td>
                            <a href="update.php?id_usuarios=<?php echo $id_usuarios;?>" class="edit" title="Editar"
                                data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id_usuarios=<?php echo $id_usuarios;?>" class="delete" title="Eliminar"
                                data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php
}
?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>