<?php
// include database configuration file
include '../db/Configuracion.php';

// initializ shopping cart class
include '../model/La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
  header("Location: ofertas.php");
}

// set customer ID in session
$_SESSION['sessCustomerID'] =  $_SESSION['documento'];
// get customer details by session customer ID
$query = $db->query("SELECT * FROM usuarios WHERE documento = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <title>Facturacion - Mundo Animal</title>

  <meta charset="utf-8">
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
  <style>
    .container {
      padding: 0em;
    }

    .table {
      width: auto;
      float: left;
    }

    .shipAddr {
      width: auto;
      float: left;
      margin-left: 30px;
    }

    .footBtn {
      width: 90%;
      float: left;
    }

    .orderBtn {
      float: right;
    }
  </style>
  
  </head>

  <body>
    <div class="container">
      <div class="panel-body">
        <br>
        <br>
        <br>
        <h1>Facturación - Vista previa</h1>
        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Sub total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($cart->total_items() > 0) {
              //get cart items from session
              $cartItems = $cart->contents();
              foreach ($cartItems as $item) {
            ?>
                <tr>
                  <td><?php echo $item["nombrep"]; ?></td>
                  <td><?php echo '$' . $item["precio"] . ' COP'; ?></td>
                  <td><?php echo $item["qty"]; ?></td>
                  <td><?php echo '$' . $item["subtotal"] . ' COP'; ?></td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="4">
                  <p>No hay articulos en tu carta......</p>
                </td>
              <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <?php if ($cart->total_items() > 0) { ?>
                <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' COP'; ?></strong></td>
              <?php } ?>
            </tr>
          </tfoot>
        </table>
        <div class="shipAddr">
          <h4>Detalles de envío</h4>
          <p><?php echo $custRow['nombre']." ". $custRow['apellido']; ?></p>
          <p><?php echo $custRow['username']; ?></p>
          <p><?php echo $custRow['telefono']; ?></p>
          <p><?php echo $custRow['direccion']; ?></p>
          <p>Contra-Entrega (Efectivo)</p>
        </div>
        <div class="footBtn">
          <a href="ofertas.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
          <a href="../controller/AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
        </div>
      </div>

    </div>
    <!--Panek cierra-->
  </body>
</html>