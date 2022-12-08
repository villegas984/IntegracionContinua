<?php session_start();
//Se hace la conexion a la base de datos
include 'Configuracion.php';

if(empty($_SESSION['usuario'])){
	$usu = "";
} else {
	$usu = $_SESSION['usuario'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>ZonaSport</title>
    <meta charset="utf-8">
	<!--conexion librerias estilos css-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--conexion librerias js-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
    .container{padding: 20px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
		/*Estilo para el container de la IMAGEN*/
		.imagen_dimen{
			margin: auto;
			padding: auto;
			max-height: 500px;
			max-width: 500px;
			height: 100%;
			width: 100%;
			min-height: 250px;
			min-width: 250px;
			border-radius: 5px;
			text-align: center;
			background-size:contain;
  			background-repeat: no-repeat;
  			background-position: center;
		}
    </style>
</head>
</head>
<body>

<!--Cuerpo de la pagina-->
<div class="container">
<div class="panel panel-default">
<!--barra navegacion-->	
<div class="panel-heading"> 
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarta.php">Ver Carrito</a></li>
  <li role="presentation">
  	<?php 
	#$usu = $_SESSION['usuario'];
	if (!empty($usu)){
		print "<a href='#' style='color:red;'>Hola ".$usu." :)</a>";
	} else {
		print "<a href='login.html'>Ingresa o Registrate</a>";
	}
	?>
   </li>
   <?php 
	#$usu = $_SESSION['usuario'];
	if (!empty($usu)){
		print "<li role='presentation'><a href='loginOut.php'>Cerrar Sesion</a></li>";
	} else {
		print "<li></li>";
	}
   ?>
 <!--  <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
  </form> 
</nav> -->
	
</ul>
</div>
<!--fin barra navegacion-->
<!--seccion de productos-->
<div class="panel-body">
    <h2>Mis Productos</h2>
    <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group-horizontal">
        <?php
        //traer los valores con la consulta a base de datos
	//	$query_pd = $db->query("SELECT * FROM producto_detalle");
	//	$campo_pd = $query_pd->fetch_assoc();
	//	$productvisual = $campo_pd["productselected"];
		$query_productoseleccionado = $db->query("SELECT * FROM producto_detalle ORDER BY id DESC LIMIT 0, 1");
		$ps = $query_productoseleccionado->fetch_assoc();
		$ps["productselected"];
		
		if(empty($_SESSION['idpro'])){
			$idpro = "";
		}else {
			$idpro = $_SESSION['idpro'];
		}
		#$idpro = $_SESSION['idpro'];
        $query = $db->query("SELECT * FROM mis_productos WHERE id = ".$ps["productselected"]);
        if($query->num_rows > 0){ 
            $campo = $query->fetch_assoc();
			
			$queryStock = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$campo["id"]);
            		$rowStock = $queryStock->fetch_assoc();
/*		    if($_REQUEST['action'] == 'detalle' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
	$query = $db->query("INSERT INTO producto_detalle (productselected) VALUE ('$productID');");
//    $query = $db->query("SELECT * FROM mis_productos WHERE id = '$productID');");
    //        $campo = $query->fetch_assoc();
header("Location: producto_detalle.php");
	} else {
		header("Location: producto_detalle.php");
*/		
        ?>
        <div class="item col-12">
            <div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $campo["nombre"];?></h4>
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-12" style="margin-bottom: 5px;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="max-height: 500px; height:500px; background-image: url('."'".$campo["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>	
							
                        </div>						
                        <div class="col-md-4">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$campo["precio"].' COP'; ?></p>
                        </div>
						<div class="col-md-2">
							<!--se imprime el stock del producto-->
                         <p style="color: black;"><?php echo 'Genero:'.$campo["genero"]; ?></p>   
                        </div>
						<div class="col-md-2">
							<!--se imprime el talla del producto-->
                            <p style="color: black;"><?php echo 'Talla:'.$campo["talla"]; ?></p>
                        </div>
						<div class="col-md-2">
							<!--se imprime el stock del producto-->
                            <p style="color: black;"><?php echo 'Color:'.$campo["color"]; ?></p>
                        </div>
						<div class="col-md-2">
							<!--se imprime el stock del producto-->
									<?php
				if($campo["stock"]== 0){
					print "Agotado";
				}
					?>
                            <p style="color: red;"><?php echo $campo["stock"].' Disponibles'; ?></p>
                        </div>
                        <div class="col-md-12">
							<!--se agrega boton para cargar al carrito-->
							<?php
				if($campo["stock"]== 0){
					print "<span class='btn btn-danger'>Agotado</span>";
				} else {
					?>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $campo["id"]; ?>">Agregar al carrito</a>
							<?php }?>
                        </div>	
                    </div>
					<!--se imprime la descripcion-->
                    <p class="list-group-item-text" style="padding: 20 px;"><?php echo $campo["descripcion"]; ?></p>
					<!--fin seccion producto-->
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <p>Producto(s) no existe.....</p>
        <?php } ?>
    </div>
</div>
<!--fin seccion productos-->
 <div class="panel-footer"><span styles="margin: 0 10px;"></span><b>Tienda de Zapatos G16</b><br> 
<ul class="text-dark" style="list-style: none; margin: auto;">
	<li role="listbox"><span>Contactanos</li>
  <li role="listbox"><span>Celular: 300 11 122 23</li>
  <li role="listbox"><span>Direccion: Av 5ta No 10-205</li>
  <li role="listbox"><span>Correo: zapatosg16@correo.com</li>
</ul>
	</div>
 </div>
</div>
<!--fin cuerpo de la pagina-->
	<!--conexion librerias js-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="js/main.js"></script>		
</body>
</html>