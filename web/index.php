<?php session_start();
//Se hace la conexion a la base de datos
include 'Configuracion.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>BioSecurity</title>
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
<!--banner presentacion full imagen-->	
	<div class="hero-wrap js-fullheight" style="background-image: url('img/fondo/bg_1.jpg');">
	<div class="overlay"></div>
		<div class="container">	
	<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
        <span class="subheading">Bienvenido a BioSecurity</span>
        <h1 class="mb-4">La seguridad no es cuestión de horóscopo, suerte o azar</h1>
        <p class="caps">Por eso nosotros te brindamos todos los elementos de protección personal para que estés 100% seguro.</p>
    </div>
	</div>	
	</div>
</div>
<!--fin banner-->
<!--Cuerpo de la pagina-->
<div class="container">
<div class="panel panel-default">
<!--barra navegacion-->	
<div class="panel-heading"> 
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="VerCarta.php">Ver Carrito</a></li>
  <li role="presentation"><a href="Pagos.php">Pagos</a></li>
  <li role="presentation">
  	<?php 
	$usu = $_SESSION['usuario'];
	if (!empty($usu)){
		print "<a href='#'>Hola ".$usu."</a>";
	} else {
		print "<a href='login.html'>Ingresa o Registrate</a>";
	}
	?>
   </li>
   <?php 
	$usu = $_SESSION['usuario'];
	if (!empty($usu)){
		print "<li role='presentation'><a href='loginOut.php'>Cerrar Sesion</a></li>";
	} else {
		print "<li></li>";
	}
   ?>
   <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
	
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
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $row["nombre"]; ?></h4>
					<!--se imprime la descripcion-->
                    <p class="list-group-item-text"><?php echo $row["descripcion"]; ?></p>
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-8" style="margin-bottom: 5px;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="background-image: url('."'".$row["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>									
                        </div>						
                        <div class="col-md-6">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$row["precio"].' COP'; ?></p>
                        </div>
                        <div class="col-md-6">
							<!--se agrega boton para cargar al carrito-->
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar al carrito</a>
                        </div>	
                    </div>
					<!--fin seccion producto-->
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Producto(s) no existe.....</p>
        <?php } ?>
    </div>
</div>
<!--fin seccion productos-->
 <div class="panel-footer"><span styles="margin: 0 10px;"><img src="img/logo/logo_.jpeg" style="max-width:200px; margin: 0 10px; float: right;"/></span><b>BioSecurity</b><br> 
<ul class="text-dark" style="list-style: none; margin: auto;">
  <li role="listbox"><span>Contáctanos</li>
  <li role="listbox"><span>Celular: 300 11 122 23</li>
  <li role="listbox"><span>Dirección: Av 5ta No 10-205</li>
  <li role="listbox"><span>Correo: biosecurity123@correo.com</li>
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