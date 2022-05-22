<?php
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;


// include database configuration file
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['idproductos'])){
        $productID = $_REQUEST['idproductos'];
        // get product details
        $query = $db->query("SELECT * FROM productos WHERE idproductos = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'idproductos' => $row['idproductos'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarta.php':'ofertas.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['idproductos'])){
        $itemData = array(
            'rowid' => $_REQUEST['idproductos'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['idproductos'])){
        $deleteItem = $cart->remove($_REQUEST['idproductos']);
        header("Location: VerCarta.php");
        
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orden (documento_id, total_price, created) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_articulos (order_id, productos_id, quantity) VALUES ('".$orderID."', '".$item['idproductos']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id_orden=$orderID");
            }else{
                header("Location: Pagos.php");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: ofertas.php");
    }
}else{
    header("Location: ofertas.php");
}