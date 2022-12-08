<?php session_start();
// iniciar compra
include 'La-carta.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html>
<head>
    <title>ZonaSport - Carrito</title>
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
                alert('Ah ocurrido un error, vuelve a intentarlo...');
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
			<!--método de pago-->
			<!--<td><img src="img/pagos/tj-credito.jpg" style="max-width: 50px;"><input id="pago1" type="checkbox" onclick="seleccionarPago1()" ></td>
			<td><img src="img/pagos/pse.png" style="max-width: 40px;"><input id="pago2" type="checkbox" onclick="seleccionarPago2()" ></td>
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
			
          <!--  <td><a href="Pagos.php" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td> -->
			<!--<td><a href="Pagos.php" id="pago" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>-->
			<td>
				
				<!--<a id="pago" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>-->
            <?php }
        if($cart->total_items() > 0){ 
			print "<h4>Métodos de pago</h4>";
				print "<table>";
			    	print "<thead>";
					print "<tr>";
						print "<th>Crédito</th>";
						print "<th>PSE</th>";
					print "</tr>";	
		//<!--método de pago-->
						print '<td><img src="img/pagos/tj-credito.jpg" style="max-width: 50px;"><input id="pago1" type="checkbox" onclick="seleccionarPago1()" ></td>';
						print '<td><img src="img/pagos/pse.png" style="max-width: 40px;"><input id="pago2" type="checkbox" onclick="seleccionarPago2()" ></td>';
					print "</thead>";
				print "</table>";
		}
					?>
        </tr>
		<!--fin-->
    </tfoot>
    </table>
    </div>
		<!--- prueba -->
		<div id="formPago"></div>		
		<!--- fin prueba -->
 <div class="panel-footer"><span styles="margin: 0 10px;"></span><b>Tienda de Zapatos G16</b><br> 
<ul class="text-dark" style="list-style: none; margin: auto;">
	<li role="listbox"><span>Contactanos</li>
  <li role="listbox"><span>Celular: 300 11 122 23</li>
  <li role="listbox"><span>Direccion: Av 5ta No 10-205</li>
  <li role="listbox"><span>Correo: zapatosg16@correo.com</li>
</ul>
	</div>
 </div><!--Fin panel-->
</div>
<!--fin cuerpo de la pagina-->
</body>
<!--script para capturar el método de pago-->
<script>
  function seleccionarPago1(){
      var checkedPago1 = document.getElementById("pago1").checked;
	  document.getElementById("pago2").checked = false;
   	  //document.getElementById("pago").setAttribute('href','Pagos.php');
	  document.getElementById("formPago").innerHTML = '<form method="post" action="Pagos.php"> <div class="caja1" style="text-align: center; margin-top: 20px; background-color: lightgray; border-radius: 5px; padding: 5px;"><h4 class="formtlo">PAGO TARJETA DE CRÉDITO</h4><div class="ub1">&#128273; Nombre Titular</div><input type="text" name="nombreTitular" required><div class="ub1">&#128273; Numero Tarjeta</div><input type="text" name="tarjeta" required><div class="ub1">&#128273; CVV</div><input type="text" name="tarjetaCVV" required><div class="ub1">&#128273; Banco</div><input type="text" name="Banco" required><div class="ub1">&#128273; Celular</div><input type="text" name="celular" required><div class="ub1">&#128273; Correo</div><input type="text" name="correo" required><div style="margin-bottom: 20px;"></div><input type="submit" href="Pagos.php" class="btn btn-success" Value="Pagos"></div></form>';
  }
  function seleccionarPago2(){
      var checkedPago2 = document.getElementById("pago2").checked;
	  document.getElementById("pago1").checked = false;
	  //document.getElementById("pago").setAttribute('href','Pagos.php');
   		document.getElementById("formPago").innerHTML = '<form method="post" action="Pagos.php"><div class="caja1" style="text-align: center; margin-top: 20px; background-color: lightgray; border-radius: 5px; padding: 5px;"><h4 class="formtlo">PAGAR POR PSE</h4><div class="ub1">&#128273; Nombre Titular</div><input type="text" name="nombreTitular" required><div class="ub1">&#128273; Numero Tarjeta</div><input type="text" name="tarjeta" required><div class="ub1">&#128273; Banco</div><input type="text" name="Banco" required><div class="ub1">&#128273; Celular</div><input type="text" name="celular" required><div class="ub1">&#128273; Correo</div><input type="text" name="correo" required><div style="margin-bottom: 20px;"></div><input type="submit" href="Pagos.php" class="btn btn-success" Value="Pagos"></div></form>';
  }
</script>
</html>