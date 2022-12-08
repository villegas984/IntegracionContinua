<?php session_start();

include('Configuracion.php');
        //traer los valores con la consulta a base de datos
//		$idpro = $_SESSION['idpro'];
		//$productoselec = $_SESSION["idproducto"];
        //$sql = "INSERT INTO producto_detalle (productselected) VALUES ('8');";
		//$query = $db->query("INSERT INTO producto_detalle mis_productos ORDER BY id DESC");
//		$query = $db->query("INSERT INTO producto_detalle (productselected) VALUE ('$idpro');");
            //$row = $query->fetch_assoc();

//if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'detalle' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
	$query = $db->query("INSERT INTO producto_detalle (productselected) VALUE ('$productID');");
//    $query = $db->query("SELECT * FROM mis_productos WHERE id = '$productID');");
    //        $campo = $query->fetch_assoc();
header("Location: producto_detalle.php");
	} else {
		header("Location: producto_detalle.php");
	}
//	header("Location: producto_detalle.php");
//}
?>