<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- prueba script bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>BioSecurity - Orden Completado</title>
    <meta charset="utf-8">
    <style>
    .container{padding: 20px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Inicio</a></li>
</ul>
</div>

<div class="panel-body">

    <h1>Estado de su Compra</h1>
    <p>Su pedido ha sido enviado exitosamente. La ID del pedido es #<?php echo $_GET['id']; ?></p>
           </div>
 <div class="panel-footer"><span styles="margin: 0 10px;"><img src="../img/logo/logo_.jpeg" style="max-width:200px; margin: 0 10px; float: right;"/></span><b>BioSecurity</b><br> 
<ul class="text-dark" style="list-style: none; margin: auto;">
  <li role="listbox"><span>Contáctanos</li>
  <li role="listbox"><span>Celular: 300 11 122 23</li>
  <li role="listbox"><span>Dirección: Av 5ta No 10-205</li>
  <li role="listbox"><span>Correo: biosecurity123@correo.com</li>
</ul>
	</div>
 </div><!--fin-->
</div>
</body>
</html>