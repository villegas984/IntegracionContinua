<?php
//session_start();
 include('Configuracion.php');

//Iniciar sesion
$usuR 	= $_POST["nombre"];
$emailR	= $_POST["correo"];
$passR 	= $_POST["password"];
$passR2	= $_POST["password2"];
$dir 	= $_POST["direccion"];
$cel 	= $_POST["celular"];
$fecha = date("Y-m-d H:i:s");
//Evaluamos que esten los campos diligenciados
if($passR!=$passR2){
	print "<script> alert('No coinciden las contraseñas. Vuelve a intentarlo');window.location= 'registro.php' </script>";
} elseif(strlen($passR)<8){
	print "<script> alert('La contraseña debe tener mínimo 8 caracteres');window.location= 'registro.php' </script>";
} elseif(empty($emailR)){
	print "<script> alert('Debes ingresar un correo');window.location= 'registro.php' </script>";
} elseif(empty($dir)){
	print "<script> alert('Debes ingresar una dirección');window.location= 'registro.php' </script>";
}elseif(empty($cel)){
	print "<script> alert('Debes ingresar un número telefónico');window.location= 'registro.php' </script>";
} else {
	
// Validamos que no haya un correo repetido, que en nuestro caso es el usuario. Si es así, le indicamos que debe iniciar sesión
$query_clientes = $db->query("SELECT * FROM clientes WHERE correo = '$emailR'");
$clienteRow = $query_clientes->fetch_assoc();
$correo = $clienteRow["correo"];

if($emailR != $correo){	
	$query = $db->query("INSERT INTO clientes(nombre, correo, celular, direccion, creado, modificado, password) VALUES ('$usuR','$emailR','$cel','$dir','$fecha','$fecha','$passR');");
	
	
	echo "<script> alert('Se ha registrado con éxito. Por favor inicie sesión...');window.location= 'login.html' </script>";
	//header ("Location: login.html");
} else {
	$usuarioExiste["usextist"] = "s";
	echo "<script> alert('Ya existe el usuario con ese correo. Inicie sesión');window.location= 'login.html' </script>";

	}
}

?>