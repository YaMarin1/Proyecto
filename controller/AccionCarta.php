<?php
// Iniciamos la clase de la carta
include '../model/La-carta.php';
$cart = new Cart;
date_default_timezone_set("America/Bogota");
$fecha = new DateTime('now', new DateTimeZone('America/Bogota'));

// include database configuration file
include '../db/Configuracion.php';
if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['idproductos'])) {
        $productID = $_REQUEST['idproductos'];
        // get product details
        $query = $db->query("SELECT * FROM productos WHERE idproductos = " . $productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'idproductos' => $row['idproductos'],
            'nombrep' => $row['nombrep'],
            'precio' => $row['precio'],
            'qty' => 1
        );

        $insertItem = $cart->insert($itemData);
        echo $insertItem ? 
            "<script> alert('El producto ha sido enviado al carrito correctamente'); </script>" :
            "<script> alert('Ha habido un error al insertar'); </script>";

        // $redirectLoc = $insertItem ? '../view/VerCarta.php' : '../view/ofertas.php';
        // header("Location: ../view/ofertas.php");
        echo "<script> window.location.href = '../view/ofertas.php' </script>";
        
    } elseif ($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['idproductos'])) {
        $itemData = array(
            'rowid' => $_REQUEST['idproductos'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem ? 'ok' : 'err';
        die;
    } elseif ($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['idproductos'])) {
        $deleteItem = $cart->remove($_REQUEST['idproductos']);
        header("Location: ../view/VerCarta.php");
    } elseif ($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])) {
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orden (documento_id, total_price, created) VALUES ('" . $_SESSION['sessCustomerID'] . "', '" . $cart->total() . "', '" . date("Y-m-d H:i:s") . "')");

        if ($insertOrder) {
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach ($cartItems as $item) {
                $sql .= "INSERT INTO orden_articulos (order_id, productos_id, quantity, subtotal) VALUES ('" . $orderID . "', '" . $item['idproductos'] . "', '" . $item['qty'] . "','" . $item['subtotal'] . "');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);

            if ($insertOrderItems) {
                $cart->destroy();
                header("Location: ../view/OrdenExito.php?id_orden=$orderID");
            } else {
                header("Location: ../view/Pagos.php");
            }
        } else {
            header("Location: ../view/Pagos.php");
        }
    } else {
        header("Location: ../view/ofertas.php");
    }
} else {
    header("Location: ../view/ofertas.php");
}
