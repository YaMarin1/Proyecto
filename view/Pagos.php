<?php
// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
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
      width: 95%;
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
                  <td><?php echo $item["nombre"]; ?></td>
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
          <p><?php echo $custRow['nombre']; ?></p>
          <p><?php echo $custRow['username']; ?></p>
          <p><?php echo $custRow['telefono']; ?></p>
          <p><?php echo $custRow['direccion']; ?></p>
          <p>Contra-Entrega (Efectivo)</p>
        </div>
        <div class="footBtn">
          <a href="ofertas.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
          <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
        </div>
      </div>

    </div>
    <!--Panek cierra-->
    <style>
      #footer {
      width: 100%;
      height: 205px;
      }       
    </style>
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-e03f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-6c39"></use>
              </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-6c39">
                <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                <path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path>
              </svg></span>
          </a>
          <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7c16"></use>
              </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-7c16">
                <circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle>
                <path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path>
              </svg></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-05c0"></use>
              </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-05c0">
                <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                <path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path>
                <path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path>
                <path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path>
              </svg></span>
          </a>
          <a class="u-social-url" title="linkedin" target="_blank" href=""><span class="u-icon u-social-icon u-social-linkedin u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c26f"></use>
              </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-c26f">
                <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                <path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path>
              </svg></span>
          </a>
        </div>
      </div>
    </footer>
  </body>

</html>