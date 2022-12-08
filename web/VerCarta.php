<?php
// iniciar compra
include 'La-carta.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html>
<head>
    <title>BioSecurity - Carrito</title>
    <meta charset="utf-8">
	<!--conexion librerias estilos css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--conexion librerias js-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
	/*estilos*/	
    .container{padding: 20px;}
    input[type="number"]{width: 20%;}
	/*fin estilos*/
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>
</head>
<body>
<!--Cuerpo de la pagina-->
<div class="container">
<div class="panel panel-default">
<!--barra navegacion-->	
<div class="panel-heading"> 	
<ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Inicio</a></li>
  <li role="presentation" class="active"><a href="VerCarta.php">Ver Carrito</a></li>
  <li role="presentation"><a href="Pagos.php">Pagos</a></li>
</ul>
</div>
<!--fin barra navegacion-->	
<div class="panel-body">
    <h1>Carrito de compras</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //trae los productos de la sesion
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
			<!--productos agregados al carrito-->
            <td><?php echo $item["nombre"]; ?></td>
            <td><?php echo '$'.$item["precio"].' COP'; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
			<!--subtotal carrito-->
            <td><?php echo '$'.$item["subtotal"].' COP'; ?></td>
            <td>
				<!--eliminar producto en carrito-->
                <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Tu carrito se encuentra vacío...</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
		<!--volver al index o pagar-->
        <tr>
            <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continuar Comprando</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' COP'; ?></strong></td>
            <td><a href="Pagos.php" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
		<!--fin-->
    </tfoot>
    </table>
    </div>
 <div class="panel-footer"><span styles="margin: 0 10px;"><img src="../img/logo/logo_.jpeg" style="max-width:200px; margin: 0 10px; float: right;"/></span><b>BioSecurity</b><br> 
<ul class="text-dark" style="list-style: none; margin: auto;">
  <li role="listbox"><span>Contáctanos</li>
  <li role="listbox"><span>Celular: 300 11 122 23</li>
  <li role="listbox"><span>Dirección: Av 5ta No 10-205</li>
  <li role="listbox"><span>Correo: biosecurity123@correo.com</li>
</ul>
	</div>
 </div><!--Fin panel-->
</div>
<!--fin cuerpo de la pagina-->
</body>
</html>