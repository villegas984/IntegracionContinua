<?php session_start();
//incluir configuracion a base de datos
include 'Configuracion.php';

//inicio de la compra
include 'La-carta.php';
$cart = new Cart;

//devolver al index si el carro esta vacio
if($cart->total_items() <= 0){
    header("Location: index.php");
}

//Iniciar sesion
//$_SESSION['usuario'];
//$_SESSION['password'] = $pass;
//$_SESSION['sessCustomerID'] = $_SESSION['idusuario'];
//$idusuario = $_SESSION['idusuario']; 
//include 'login.php';
//$idusuario 	= 1;
//$pass 	= $_POST["password"];
// traer los detalles de la sesion iniciada
$idus = $_SESSION['idusuario'];
$query = $db->query("SELECT * FROM clientes WHERE id = '$idus'");
$custRow = $query->fetch_assoc();
$_SESSION['sessCustomerID'] = $idus;
$usu = $_SESSION['usuario'];
$pass = $_SESSION['password'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>ZonaSport - Pagar</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
    .container{padding: 20px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarta.php">Ver Carta</a></li>
  <li role="presentation" class="active"><a href="Pagos.php">Pagos</a></li>
</ul>
</div>

<div class="panel-body">
    <h1>Vista previa de la Orden</h1>
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
        if($cart->total_items() > 0){
            //traer los productos de la sesion
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["nombre"]; ?></td>
            <td><?php echo '$'.$item["precio"].' COP'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' COP'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay articulos en tu carrito......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' COP'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>

    <div class="shipAddr">
        <h4>Detalles de envio</h4>
        <p><?php echo $custRow['nombre']; ?></p>
        <p><?php echo $custRow['correo']; ?></p>
        <p><?php echo $custRow['celular']; ?></p>
        <p><?php echo $custRow['direccion']; ?></p>
	<!---seccion metodo de pago-->
	<div class="caja1" style="text-align: center; margin-top: 20px; background-color: lightgray; border-radius: 5px; padding: 5px;">
	<h4 class="formtlo">Datos de la tarjeta</h4>
	<div class="ub1">&#128273; Nombre Titular</div>
	<input type="text" name="nombreTitular" required>
	<div class="ub1">&#128273; Numero Tarjeta</div>
	<input type="text" name="tarjeta" required>
	<div class="ub1">&#128273; CVV</div>
	<input type="text" name="tarjetaCVV" required>
	<div class="ub1">&#128273; Banco</div>
	<input type="text" name="Banco" required>
	<div class="ub1">&#128273; Celular</div>
	<input type="text" name="celular" required>
	<div class="ub1">&#128273; Correo</div>
	<input type="text" name="correo" required>
	<div style="margin-bottom: 20px;"></div>
	</div>
	<!----->
    </div>

    <div class="footBtn">
        <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
		<input type="submit">
        <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
        </div>
 <div class="panel-footer"><span styles="margin: 0 10px;"></span><b>Tienda de Zapatos G16</b><br> 
<ul class="text-dark" style="list-style: none; margin: auto;">
	<li role="listbox"><span>Contactanos</li>
  <li role="listbox"><span>Celular: 300 11 122 23</li>
  <li role="listbox"><span>Direccion: Av 5ta No 10-205</li>
  <li role="listbox"><span>Correo: zapatosg16@correo.com</li>
</ul>
	</div>
 </div><!--Panek cierra-->
</div>
</body>
</html>