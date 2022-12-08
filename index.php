<?php session_start();
//Se hace la conexion a la base de datos
include 'Configuracion.php';
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
	<div class="hero-wrap js-fullheight" style="background-image: url('img/fondo/bg_2.jpg');">
	<div class="overlay"></div>
		<div class="container">	
	<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
        <span class="subheading">Bienvenido a la Tienda de Zapatos G16</span>
        <h1 class="mb-4">Obtén el cuerpo que quieres<tener></tener></h1>
        <p class="caps">Por eso nosotros te brindamos todos los elementos necesarios para lograrlo.</p>
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
	if (!empty($usu) && $usu != "Administrador"){
		print "<li role='presentation'><a href='loginOut.php'>Cerrar Sesion</a></li>";
		print "<li role='presentation'><a href='historiaCliente.php'>Mi Histórico de Compras</a></li>";
	} else {
		print "<li></li>";
	}
   ?>
	<li>
		<?php
			if($usu == "Administrador"){
				print "<li role='presentation'><a href='loginOut.php'>Cerrar Sesion</a></li>";
				print '<li role="presentation"><a href="modulo_administrador.php" style="margin-right:5px;" class="btn btn-dark">Administrar Productos</a></li>';
			} else {
				print '<li role="presentation"><a href="loginOutAdmin.php">Ingresar Como Administrador</a></li>';
			}
		?>
	<div>
  <form class="form-inline" method="post">
  	<input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese palabra clave">  
    <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
   <!-- <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search"> -->
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</div>
</li>	
</ul>

	
</div>
<!--fin barra navegacion-->
<!--seccion de productos-->
<div class="panel-body">
	<h1>Jenkins buena herramienta</h1>
    <h2>Mis Productos</h2>
    <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group-horizontal">

<!--FILTRO-->
	
	<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Filtros</a>
            <ul class="dropdown-menu">
                <li><a href="#">Talla<span class="caret"></span></a>
                   <ul class="dropdown-menu sub-menu">
        <?php
					$countT = 0;	  
		$queryTalla = $db->query("SELECT * FROM mis_productos GROUP BY(talla)");
            		while($rowTalla = $queryTalla->fetch_assoc()){	
						$countT = $countT + 1;
			print '<form method="post">';
			print "<li><button style='width:100%;' class='btn btn-outline-success my-2 my-sm-0' name='filtro' type='submit' value='".$rowTalla['talla']."'>".$rowTalla['talla']."</button></li>";
			print '</form>';		
		 } 
		?>
						   
                    </ul>
                </li>
                <li><a href="#">Color<span class="caret"></span></a>
                   <ul class="dropdown-menu sub-menu">
        <?php
		$queryColor = $db->query("SELECT * FROM mis_productos GROUP BY(color)");
            		while($rowColor = $queryColor->fetch_assoc()){	
			print '<form method="post">';
			print "<li><button style='width:100%;' class='btn btn-outline-success my-2 my-sm-0' name='filtroC' type='submit' value='".$rowColor['color']."'>".$rowColor['color']."</button></li>";
			print '</form>';	
            //  print "<li><a href='#'>".$rowColor['color']."</a></li>";
			
		
		 } 
		?>
                    </ul>
                </li>
				<li><a href="#">Género<span class="caret"></span></a>
                   <ul class="dropdown-menu sub-menu">
        <?php
		$queryGen = $db->query("SELECT * FROM mis_productos GROUP BY(genero)");
            		while($rowGen = $queryGen->fetch_assoc()){	
			print '<form method="post">';
			print "<li><button style='width:100%;' class='btn btn-outline-success my-2 my-sm-0' name='filtroG' type='submit' value='".$rowGen['genero']."'>".$rowGen['genero']."</button></li>";
			print '</form>';
            //  print "<li><a href='#'>".$rowGen['genero']."</a></li>";
		
		 } 
		?>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>      
  </div>		
		
<?php
 
	/*aqui fue*/
if(!empty($_POST["filtro"])){
	$filtro = $_POST["filtro"];	
	$queryT2 = $db->query("SELECT * FROM mis_productos WHERE talla='".$filtro."'");
	print "<div class='item col-lg-12'><p>Estos son los resultados de tu filtro por: <b style='color:green;'>". $_POST['filtro']."</b></p></div>";
            While($rowT2 = $queryT2->fetch_assoc()){				
				$queryStockT2 = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$rowT2["id"]);
           		$rowStockT2 = $queryStockT2->fetch_assoc();					
		?>		
<!--este es una prueba2-->
        <div class="item col-lg-4"><a href="producto.php?action=detalle&id=<?php echo $rowT2["id"]; ?>">
			<div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $rowT2["nombre"]; ?></h4>
					<!--se imprime la descripcion-->
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-12" style="margin-bottom: 5px;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="background-image: url('."'".$rowT2["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>									
                        </div>						
                        <div class="col-md-6">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$rowT2["precio"].' COP'; ?></p>
                        </div>
						<div class="col-md-6">
							<!--se imprime el stock del producto-->
                       			<?php
				if($rowT2["stock"]== 0){
					print "Agotado";
				}
					?>
                            <p style="color: red;"><?php echo $rowT2["stock"].' Disponibles'; ?></p>
                        </div>
                        <div class="col-md-12">
							<!--se agrega boton para cargar al carrito-->
							<?php
				if($rowT2["stock"]== 0){
					print "<span class='btn btn-danger'>Agotado</span>";
				} else {
					?>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $rowT2["id"]; ?>">Agregar al carrito</a>
							<?php }?>
                        </div>	
                    </div>
					
					<!--fin seccion producto2-->
                </div>
            </div>
			
			</a>
        </div>
<!--Fin de la prueba 2-->
		
		 <?php	}	}
	if(!empty($_POST["filtroC"])){
	$filtroC = $_POST["filtroC"];
	print "<div class='item col-lg-12'><p>Estos son los resultados de tu filtro por: <b style='color:green;'>". $_POST['filtroC']."</b></p></div>";
	$queryC = $db->query("SELECT * FROM mis_productos WHERE color ='".$filtroC."'");
		
            While($rowC = $queryC->fetch_assoc()){				
			$queryStockC = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$rowC["id"]);
           		$rowStockC = $queryStockC->fetch_assoc();					
		?>		
<!--este es una prueba2-->
        <div class="item col-lg-4"><a href="producto.php?action=detalle&id=<?php echo $rowC["id"]; ?>">
			<div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $rowC["nombre"]; ?></h4>
					<!--se imprime la descripcion-->
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-12" style="margin-bottom: 5px;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="background-image: url('."'".$rowC["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>									
                        </div>						
                        <div class="col-md-6">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$rowC["precio"].' COP'; ?></p>
                        </div>
						<div class="col-md-6">
							<!--se imprime el stock del producto-->
                       			<?php
				if($rowC["stock"]== 0){
					print "Agotado";
				}
					?>
                            <p style="color: red;"><?php echo $rowC["stock"].' Disponibles'; ?></p>
                        </div>
                        <div class="col-md-12">
							<!--se agrega boton para cargar al carrito-->
							<?php
				if($rowC["stock"]== 0){
					print "<span class='btn btn-danger'>Agotado</span>";
				} else {
					?>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $rowC["id"]; ?>">Agregar al carrito</a>
							<?php }?>
                        </div>	
                    </div>
					
					<!--fin seccion producto2-->
                </div>
            </div>
			
			</a>
        </div>
<!--Fin de la prueba 2-->
		
		 <?php	}	}
		 
	if(!empty($_POST["filtroG"])){
	$filtroG = $_POST["filtroG"];
	print "<div class='item col-lg-12'><p>Estos son los resultados de tu filtro por: <b style='color:green;'>". $_POST['filtroG']."</b></p></div>";
	$queryG = $db->query("SELECT * FROM mis_productos WHERE genero ='".$filtroG."'");
		
            While($rowG = $queryG->fetch_assoc()){				
			$queryStockG = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$rowG["id"]);
           		$rowStockG = $queryStockG->fetch_assoc();					
		?>		
<!--este es una prueba2-->
        <div class="item col-lg-4"><a href="producto.php?action=detalle&id=<?php echo $rowG["id"]; ?>">
			<div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $rowG["nombre"]; ?></h4>
					<!--se imprime la descripcion-->
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-12" style="margin-bottom: 5px;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="background-image: url('."'".$rowG["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>									
                        </div>						
                        <div class="col-md-6">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$rowG["precio"].' COP'; ?></p>
                        </div>
						<div class="col-md-6">
							<!--se imprime el stock del producto-->
                       			<?php
				if($rowG["stock"]== 0){
					print "Agotado";
				}
					?>
                            <p style="color: red;"><?php echo $rowG["stock"].' Disponibles'; ?></p>
                        </div>
                        <div class="col-md-12">
							<!--se agrega boton para cargar al carrito-->
							<?php
				if($rowG["stock"]== 0){
					print "<span class='btn btn-danger'>Agotado</span>";
				} else {
					?>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $rowG["id"]; ?>">Agregar al carrito</a>
							<?php }?>
                        </div>	
                    </div>
					
					<!--fin seccion producto2-->
                </div>
            </div>
			
			</a>
        </div>
<!--Fin de la prueba 2-->
		
		 <?php	}	}	
	
 
	
//if($_SESSION["filtro"] == 0){			
if(empty($_POST["PalabraClave"])){
	if (empty($_POST["filtro"]) && empty($_POST["filtroC"]) && empty($_POST["filtroG"])){
        //traer los valores con la consulta a base de datos
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC");
        if($query->num_rows > 0){ 
		
            while($row = $query->fetch_assoc()){
		
			
				$queryStock = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$row["id"]);
            		$rowStock = $queryStock->fetch_assoc();
				
        ?>


	<div id="resultadoTalla"></div>	
		
        <div class="item col-lg-4"><a href="producto.php?action=detalle&id=<?php echo $row["id"]; ?>">
			<div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $row["nombre"]; ?></h4>
					<!--se imprime la descripcion-->
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-12" style="margin-bottom: 5px;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="background-image: url('."'".$row["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>									
                        </div>						
                        <div class="col-md-6">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$row["precio"].' COP'; ?></p>
                        </div>
						<div class="col-md-6">
							<!--se imprime el stock del producto-->
							<?php
				if($row["stock"]== 0){
					print "Agotado";
				}
					?>
                            <p style="color: red;"><?php echo $row["stock"].' Disponibles'; ?></p>
                        </div>
                        <div class="col-md-12">
							<!--se agrega boton para cargar al carrito-->
							<?php
				if($row["stock"]== 0){
					print "<span class='btn btn-danger'>Agotado</span>";
				} else {
					?>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar al carrito</a>
							<?php }?>
                        </div>	
                    </div>
					
					<!--fin seccion producto-->
                </div>
            </div>
			
			</a>
        </div>
        <?php } }else{ ?>
        <p>Producto(s) no existe.....</p>
        <?php } }

	
	
	
	
	
}else{


 
if(!empty($_POST["PalabraClave"]))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);
      $queryb ="SELECT * FROM mis_productos WHERE nombre like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%' OR color like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $queryb .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $resultb = $db->query($queryb);
     echo "<div class='item col-lg-12'><p>Estos son los resultados de tu búsqueda por: <b style='color:green;'>". $_POST['PalabraClave']."</b></p></div>";
                     
     if(mysqli_num_rows($resultb) > 0) {
        $row_countb=0;
        //echo "<b><br><br><p style='padding:1px;'>Resultados encontrados: </p></b>";
        While($rowb = $resultb->fetch_assoc()) {   
            $row_countb++; 
		
		$queryStockb = $db->query("SELECT SUM(cantidad) AS total FROM orden_articulos WHERE product_id=".$rowb["id"]);
            		$rowStockb = $queryStockb->fetch_assoc();
		?>                        
            
<!--este es una prueba-->
        <div class="item col-lg-4"><a href="producto.php?action=detalle&id=<?php echo $rowb["id"]; ?>">
			<div class="thumbnail">
                <div class="caption">
					<!--se imprime el nombre del producto-->
                    <h4 class="list-group-item-heading"><?php echo $rowb["nombre"]; ?></h4>
					<!--se imprime la descripcion-->
					<!--seccion de producto-->
                    <div class="row" style="margin:auto; padding:auto; text-align:center;">
						
						<div class="col-md-12" style="margin-bottom: 5px; text-align: center;">
							<!--se imprime imagen producto-->
							<?php echo '<p class="imagen_dimen" style="background-image: url('."'".$rowb["imagen"]."'".'); background-repeat: no-repeat; border-radius: 5px; margin:auto;"></p>'; ?>									
                        </div>						
                        <div class="col-md-6">
							<!--se imprime el precio del producto-->
                            <p class="lead"><?php echo '$'.$rowb["precio"].' COP'; ?></p>
                        </div>
						<div class="col-md-6">
							<!--se imprime el stock del producto-->
                       			<?php
				if($rowb["stock"]== 0){
					print "Agotado";
				}
					?>
                            <p style="color: red;"><?php echo $rowb["stock"].' Disponibles'; ?></p>
                        </div>
                        <div class="col-md-12">
							<!--se agrega boton para cargar al carrito-->
							<?php
				if($rowb["stock"]== 0){
					print "<span class='btn btn-danger'>Agotado</span>";
				} else {
					?>
                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $rowb["id"]; ?>">Agregar al carrito</a>
							<?php }?>
                        </div>	
                    </div>
					
					<!--fin seccion producto-->
                </div>
            </div>
			
			</a>
        </div>
<!--Fin de la prueba -->
  <?php
		}
        
	
    }
    else {
        echo "<div class='item col-lg-12'><p style='color:red;'>Ninguno</p><span>Intenta nuevamente con otras palabras... :)</span></div>";
		
    }
}
 
}

?>		


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