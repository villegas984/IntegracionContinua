<?php
//session_start();
 include('Configuracion.php');

$id	= $_POST["id"];
/*$codReferencia 	= $_POST["cod_referencia"];
$nombreProducto	= $_POST["nombre"];
$imagen = "img/zapatos/1.jpg";
$precio	= $_POST["precio"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$talla = $_POST["talla"];
$color = $_POST["color"];
$genero = $_POST["genero"];
$fecha = date("Y-m-d H:i:s");*/

$query_editar = $db->query("DELETE FROM mis_productos WHERE id = $id");
	echo "<script> alert('Se ha eliminado el producto con éxito...');window.location= 'modulo_administrador.php' </script>";

?>