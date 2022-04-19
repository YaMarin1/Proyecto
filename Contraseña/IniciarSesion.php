<?php 
include ('database.php');
$ = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Iniciar Sesion</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Index.css">
</head>

<body class="my-login-page">
	<header class="main-header">
        <div class="container">
          <nav class="navbar navbar-expand-lg main-nav px-0">
            <a class="navbar-brand" href="PaginaPrincipal.html"><img src="MundoAnimal.png" alt=""></a>
            
            <div class="navbar-collapse" id="mainMenu">
				<ul class="navbar-nav ml-auto text-uppercase">
					<li>
					  <a href="PaginaPrincipal.html">Inicio</a>
					</li>
					<li>
					  <a href="Alimentos.html">Alimentos</a>
					</li>
					<li>
					  <a href="Medicinas.html">Medicinas</a>
					</li>
					<li>
					  <a href="Accesorios.html">Accesorios</a>
					</li>
					<li>
					  <a href="IniciarSesion.html">Iniciar Sesion</a>
					</li>
					<li>
					  <a href="Registrarse.html">Registrarse</a>
					</li>
					<li>
					  <a href="Contacto.html">Contactanos</a>
					</li>
				  </ul>
            </div>
          </nav>
        </div>
      </header>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">

							<h4 class="card-title">Iniciar Sesion</h4>

							<form method="POST" class="my-login-validation">

								<div class="form-group">
									<label>Correo</label>
									<input type="text" class="form-control" name="email">
								</div>

								<div class="form-group">
									<label>Contraseña
										<a href="RestablecerContraseña.html" class="float-right">
											Olvidaste la contraseña?
										</a>
									</label>
									<input type="password" class="form-control" name="password">
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Iniciar sesion
									</button>
								</div>

								<div class="mt-4 text-center">
									No tienes una cuenta? <a href="Registrarse.html">Crea una</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; Mundo Animal 
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>