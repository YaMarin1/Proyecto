<?php
if(!isset($_REQUEST['id_orden'])){
    header("Location: ofertas.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <title>Compra Completada</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/nicepage.css" media="screen">
    <link rel="stylesheet" href="../css/index.css" media="screen">
    <script class="u-script" type="text/javascript" src="../js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="../css/nicepage2.css" media="screen">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">
   
 
    <style>
    .container{padding: 20px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
<body class="u-body u-xl-mode">
  <header class="u-clearfix u-custom-color-1 u-header u-sticky u-sticky-1a32 u-header" id="sec-090a">
    <div class="u-clearfix u-sheet u-sheet-1">
      <a href="ofertas.php" class="u-image u-logo u-image-1" data-image-width="600" data-image-height="600"><img src="../images/MundoAnimal.png" class="u-logo-image u-logo-image-1"></a>
      <a href="logout.php" class="u-border-1 u-border-palette-1-light-1 u-btn u-btn-round u-button-style u-palette-1-light-3 u-radius-3 u-text-palette-1-dark-2 u-btn-1">
          <span class="u-file-icon u-icon u-icon-1"><img src="../images/149408.png" alt=""></span></a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="MD">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
        <a class="u-button-style u-custom-active-color u-custom-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-file-icon u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-text-white u-file-icon-2" href="#">
            <img src="../images/3.png" alt=""></a>
        </div>
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">

            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-white" href="ofertas.php" style="padding: 10px 11px 10px 20px;">PRODUCTOS</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-white" href="VerCarta.php" style="padding: 10px 11px 10px 20px;">CARRITO</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-white" href="Pagos.php" style="padding: 10px 11px 10px 20px;">PAGOS</a></li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-white" href="ofertas.php" style="padding: 10px 11px 10px 20px;">PRODUCTOS</a>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="VerCarta.php" style="padding: 10px 11px 10px 20px;">CARRITO</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-white" href="Pagos.php" style="padding: 10px 11px 10px 20px;">PAGOS</a></li>  
            </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
<div class="container">
  <br>
  <br>
  <center>
    <h1>Resumen de estado</h1>
    <p>Su pedido ha sido registrado exitosamente.</p>
    <p>La ID del pedido es #<?php echo $_GET['id_orden']; ?></p>
    <img src="../images/check.png" alt=""></center>
           

 <!--Panek cierra-->
</div>
</body>
</html>