<?php
if (isset($_GET['idcategoria'])) {
  $idcategoria = intval($_GET['idcategoria']);
} else {
  header("location:categoria.php");
}
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
        <a class="nav-link px-3" href="../view/logout.php">Cerrar sesion</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../view/admin.php">
                <span data-feather="home"></span>
                Panel admin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/productos.php">
                <span data-feather="shopping-cart"></span>
                Productos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/user.php">
                <span data-feather="users"></span>
                Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/empleados.php">
                <span data-feather="users"></span>
                Empleados
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="../view/categoria.php">
                <span data-feather="layers"></span>
                Categorias
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/roles.php">
                <span data-feather="tool"></span>
                Roles
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/proveedores.php">
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
        </div>

        <div class="container">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-sm-8">
                  <h2>Editar <b>Categoria</b></h2>
                </div>
                <div class="col-sm-4">
                  <a href="../view/categoria.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver</a>
                </div>
              </div>
            </div>
            <?php

            include("../db/database.php");
            $categoria = new Database();

            if (isset($_POST) && !empty($_POST)) {
              $nombrec = $categoria->sanitize($_POST['nombrec']);
              $id_cliente2 = intval($_POST['id_cliente2']);

              $res = $categoria->updateCat($nombrec, $id_cliente2);
              if ($res) {
                $message = "Datos actualizados con éxito";
                $class = "alert alert-success";
              } else {
                $message = "No se pudieron actualizar los datos";
                $class = "alert alert-danger";
              }

            ?>

              <div class="<?php echo $class ?>">
                <?php echo $message; ?>
              </div>
            <?php
            }
            $datos_categoria = $categoria->single_recordCat($idcategoria);

            ?>

            <div class="row">
              <form method="post">
                <div class="col-md-6">
                  <label>Nombre:</label>
                  <input type="text" name="nombrec" id="nombrec" class='form-control' maxlength="45" required value="<?php echo $datos_categoria->nombrec; ?>">
                  <input type="hidden" name="id_cliente2" id="id_cliente2" class='form-control' maxlength="100" value="<?php echo $datos_categoria->idcategoria; ?>">
                </div>

                <div>
                  <hr>
                  <button type="submit" class="btn btn-success">Actualizar datos</button>
                </div>
              </form>
            </div>
          </div>
        </div>


      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../js/dashboard.js"></script>
</body>

</html>