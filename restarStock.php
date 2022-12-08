<?php
//session_start();
 include('Configuracion.php');

//Iniciar sesion
$id	= $_POST["id"];
$codReferencia 	= $_POST["cod_referencia"];
$nombreProducto	= $_POST["nombre"];
$imagen = "img/zapatos/1.jpg";
$precio	= $_POST["precio"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$talla = $_POST["talla"];
$color = $_POST["color"];
$genero = $_POST["genero"];
$fecha = date("Y-m-d H:i:s");

if(!empty($_POST["Eliminar"])){
	$query = $db->query("DELETE FROM mis_productos WHERE id =$id");
	echo "<script> alert('Se ha eliminado el producto con éxito...$codReferencia');window.location= 'modulo_administrador.php' </script>";
	
} else {
$query_editar = $db->query("UPDATE mis_productos SET cod_referencia='$codReferencia',nombre='$nombreProducto',descripcion='$descripcion',imagen='$imagen',precio='$precio',creado='$fecha',modificado='$fecha',stock='$stock',talla='$talla',color='$color',genero='$genero',estado='$genero' WHERE id = $id");
	echo "<script> alert('Se ha modificado el producto seleccionado...');window.location= 'modulo_administrador.php' </script>";
}

?>