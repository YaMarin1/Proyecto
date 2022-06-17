<?php

session_start();

if (!isset($_SESSION['rol'])) {
  header('location: login.php');
} else {
  if ($_SESSION['rol'] != 1) {
    header('location: login.php');
  }
}
?>
<?php
include('../db/database.php');
$productos = new Database();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>



  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Mundo Animal</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php">Cerrar sesion</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin.php">
                <span data-feather="home"></span>
                Panel admin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="productos.php">
                <span data-feather="shopping-cart"></span>
                Productos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">
                <span data-feather="users"></span>
                Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empleados.php">
                <span data-feather="users"></span>
                Empleados
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categoria.php">
                <span data-feather="layers"></span>
                Categorias
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="roles.php">
                <span data-feather="tool"></span>
                Roles
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="proveedores.php">
                <span data-feather="briefcase"></span>
                Proveedores
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Administrador</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="../crud/createProducto.php" class="btn btn-primary">Crear producto</a>
            </div>
          </div>
        </div>


        <h2>Listado de <b>Productos</b></h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Iva</th>
                <th scope="col">Categoria</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php $listado = $productos->readProductos(); ?>
              <?php
              while ($row = mysqli_fetch_object($listado)) {
                $idproductos = $row->idproductos;
                $nombrep = $row->nombrep;
                $imagen = $row->imagen;
                $descripcion = $row->descripcion;
                $stock = $row->stock;
                $precio = $row->precio;
                $iva = $row->iva;
                $categoria_id = $row->categoria_id;
                $proveedor_id = $row->proveedor_id;
              ?>
                <tr>
                  <td><?php echo $idproductos; ?></td>
                  <td><?php echo $nombrep; ?></td>
                  <td><img src="../images/ImagesProductos/<?php echo $imagen; ?>" width="70px" height="70px" alt=""></img></td>
                  <td><?php echo $descripcion; ?></td>
                  <td><?php echo $stock; ?></td>
                  <td><?php echo $precio; ?></td>
                  <td><?php echo $iva; ?></td>
                  <td><?php echo $categoria_id; ?></td>
                  <td><?php echo $proveedor_id; ?></td>
                  <td>
                    <a href="../crud/updateProducto.php?idproductos=<?php echo $idproductos; ?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <a href="../crud/deleteProducto.php?idproductos=<?php echo $idproductos; ?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return confirm('Seguro que quieres eliminarlo?')"><i class="material-icons">&#xE872;</i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../js/dashboard.js"></script>
</body>

</html>