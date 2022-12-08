<?php session_start();
date_default_timezone_set("America/Lima");
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;

$idus = $_SESSION['idusuario'];

//se inicia configuracion con include
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        //se traen los detalles de los productos
        $query = $db->query("SELECT * FROM mis_productos WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarta.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: VerCarta.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        //se inserta el detalle de la orden en la tabla
		
		
        $insertOrder = $db->query("INSERT INTO orden (customer_id, total_precio, creado, modificado) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            //se traen los productos
            $cartItems = $cart->contents();
			//se actualiza el stock del producto
			
            foreach($cartItems as $item){
				$query_productos = $db->query("Select * FROM mis_productos WHERE id = ".$item['id']);
				$stock = $query_productos->fetch_assoc();
				$query_editar = $db->query("UPDATE mis_productos SET stock='".($stock['stock'] - $item['qty'])."' WHERE id = ".$item['id']);
                $sql .= "INSERT INTO orden_articulos (order_id, product_id, cantidad, id_cliente) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."', '".$_SESSION['sessCustomerID']."');";
            }
            //se insertan los productos en la tabla
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: Pagos.php");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
      //  header("Location: index.php");
		echo "<script> alert('Por favor inicie sesión o regístrese para continuar con el pago...');window.location= 'index.php' </script>";
    }
}else{
    header("Location: index.php");
}