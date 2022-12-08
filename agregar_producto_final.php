<?php
//session_start();
 include('Configuracion.php');

#$id	= $_POST["id"];
$codReferencia 	= $_POST["cod_referencia"];
$nombreProducto	= $_POST["nombre"];
$imagen = $_FILES["imagen"]['name'];
$imagenTipo = $_FILES["imagen"]['type'];
$imagenTamano = $_FILES["imagen"]['size'];

$imagenDestino = 'img/zapatos/'.$imagen;

move_uploaded_file($_FILES['imagen']['tmp_name'],$imagenDestino);

$precio	= $_POST["precio"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$talla = $_POST["talla"];
$color = $_POST["color"];
$genero = $_POST["genero"];
$fecha = date("Y-m-d H:i:s");

$query_editar = $db->query("INSERT INTO mis_productos(cod_referencia, nombre, descripcion, imagen, precio, creado, modificado, stock, talla, color, genero, estado) VALUES ('$codReferencia','$nombreProducto','$descripcion','$imagenDestino',$precio,'$fecha','$fecha',$stock,'$talla','$color','$genero','1');");
	echo "<script> alert('Se ha agregado el producto con éxito...');window.location= 'modulo_administrador.php' </script>";

?>