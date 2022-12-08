<?php session_start();
//Se hace la conexion a la base de datos
include 'Configuracion.php';
if($_SESSION['usuario'] != "Administrador"){
    header("Location: index.php");
}
if(empty($_SESSION['usuario'])){
	$usu = "";
} else {
	$usu = $_SESSION['usuario'];
}
$_SESSION["tl"] = "";
function consultaTalla(){
	$_SESSION["tl"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tienda de Zapatos G16</title>
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
			max-height: 200px;
			max-width: 200px;
			height: 100%;
			width: 100%;
			min-height: 50px;
			min-width: 50px;
			border-radius: 5px;
			text-align: center;
			background-size:contain;
  			background-repeat: no-repeat;
  			background-position: center;
		}
		
		    .sidebar-nav {
        padding: 9px 0;
    }

    .dropdown-menu .sub-menu {
        left: 100%;
        position: absolute;
        top: 0;
        visibility: hidden;
        margin-top: -1px;
    }

    .dropdown-menu li:hover .sub-menu {
        visibility: visible;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
		position: absolute;
    }

    .nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
        margin-top: 0;
    }

    .navbar .sub-menu:before {
        border-bottom: 7px solid transparent;
        border-left: none;
        border-right: 7px solid rgba(0, 0, 0, 0.2);
        border-top: 7px solid transparent;
        left: -7px;
        top: 10px;
    }
    .navbar .sub-menu:after {
        border-top: 6px solid transparent;
        border-left: none;
        border-right: 6px solid #fff;
        border-bottom: 6px solid transparent;
        left: 10px;
        top: 11px;
        left: -6px;
    }
    </style>
</head>
<body>
<!--banner presentacion full imagen-->	
<!--	<div class="hero-wrap js-fullheight" style="background-image: url('img/fondo/bg_2.jpg');">
	<div class="overlay"></div>
		<div class="container">	
	<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
        <span class="subheading">Bienvenido a ZonaSport</span>
        <h1 class="mb-4">Obtén el cuerpo que quieres<tener></tener></h1>
        <p class="caps">Por eso nosotros te brindamos todos los elementos necesarios para lograrlo.</p>
    </div>
	</div>	
	</div>
</div>-->
<!--fin banner-->
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
	if (!empty($usu) || $usu != null){
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
	<li>

</li>	
</ul>

	
</div>
<!--fin barra navegacion-->

	<!--seccion de productos-->
<div class="panel-body">
    <h2>Agregar Productos</h2>
    
    <div id="products" class="row list-group-horizontal">
		
		
		<?php
 
	/*aqui fue*/
#if(!empty($_POST["filtro"])){
	#$filtro = $_POST["filtro"];	
	#$queryT2 = $db->query("SELECT * FROM mis_productos ORDER BY stock ASC");
	#print "<div class='item col-lg-12'><p>Estos son los resultados de tu filtro por: <b style='color:green;'>". $_POST['filtro']."</b></p></div>";
     #       While($rowT2 = $queryT2->fetch_assoc()){
				#$query = $db->query("SELECT * FROM mis_productos WHERE id =".$rowT["product_id"]);
				#$queryStockT2 = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$rowT2["id"]);
           		#$rowStockT2 = $queryStockT2->fetch_assoc();
				#$rowT2 = $query->fetch_assoc();
				#$queryT3 = $db->query("SELECT * FROM orden WHERE id =".$rowT["order_id"]);
				#$fecha_compra = $queryT3->fetch_assoc();
		?>		
<!--este es una prueba2-->
        <div class="item col-12">
			<div class="thumbnail">
                <div class="caption">
					
					<form method="post" action="agregar_producto_final.php" enctype="multipart/form-data">
					
					<table class="table">
						<thead>
							<tr>
								
								<th>Cod Producto</th>
								<th>Producto</th>
								<th>Imagen</th>
								<th>Precio</th>
								<th>Descripción</th>
								<th>Stock</th>
								<th>Talla</th>
								<th>Color</th>
								<th>Género</th>
							</tr>
						</thead>
						<tbody>
							<tr>
					
								<td><textarea name="cod_referencia" style="width: 80px; max-width: 80px; min-width: 80px; max-height: 30px; min-height: 30px;"></textarea></td>
								<td><textarea name="nombre" style="width: 120px; max-width: 140px; min-width: 140px; max-height: 40px; min-height: 40px;"></textarea></td>
								<td class="" style="max-width: 150px;"><input type="file" href="agregar_producto_final.php" name="imagen" size="20"><label for="imagen"></label></td>
								<td><textarea name="precio" style="width: 90px; max-width: 90px; min-width: 70px; max-height: 30px; min-height: 30px;"></textarea></td>
								<td><textarea name="descripcion" style="width: 120px; max-width: 140px; min-width: 140px; max-height: 40px; min-height: 40px;"></textarea></td>
								<td><textarea name="stock" style="width: 40px; max-width: 40px; min-width: 40px; max-height: 30px; min-height: 30px;"></textarea></td>
								<td><textarea name="talla" style="width: 40px; max-width: 40px; min-width: 40px; max-height: 30px; min-height: 30px;"></textarea></td>
								<td><textarea name="color" style="width: 80px; max-width: 80px; min-width: 80px; max-height: 30px; min-height: 30px;"></textarea></td>
								<td><textarea name="genero" style="width: 40px; max-width: 40px; min-width: 40px; max-height: 30px; min-height: 30px;"></textarea></td>
								<td><input type="submit" href="agregar_producto_final.php" class="btn btn-success" Value="Agregar"></td>
							</tr>
						</tbody>
					</table>				
					</form>
                    </div>
					
					<!--fin seccion producto2-->
                </div>
            </div>
			
       
  <?php
#		}
        
	
    

?>		
		
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
	
<script>
  function buscarTallaS(){
      var talla = "<?php $_SESSION['tl'] = 'S'; consultaTalla(); ?>"
		  document.getElementById("resultadoTalla").innerHTML = talla;	  
  }
  function buscarTallaM(){
      var talla = "<?php $_SESSION['tl'] = 'M'; consultaTalla(); ?>"
		  document.getElementById("resultadoTalla").innerHTML = talla;	  
  }
  function buscarTallaL(){
      var talla = "<?php $_POST['filtro'] = 'L'; ?>"
		  	  
  }
  function buscarTallaXS(){
      var talla = "<?php $_SESSION['tl'] = 'XS'; consultaTalla(); ?>"
		  document.getElementById("resultadoTalla").innerHTML = talla;	  
  }
  function buscarTallaXL(){
      var talla = "<?php $_SESSION['tl'] = 'XL'; consultaTalla(); ?>"
		  document.getElementById("resultadoTalla").innerHTML = talla;	  
  }
  function borraFiltro(){
      var talla = "<?php borrarFiltrop(); ?>"
  		document.getElementById("resultadoTalla").innerHTML = talla;
  }
  function buscarTallaXXL(){
      var talla = "<?php $_SESSION['tl'] = 'XXL'; consultaTalla(); ?>"
		  document.getElementById("resultadoTalla").innerHTML = talla;	  
  }
</script>
</html>