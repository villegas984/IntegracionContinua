<?php
session_start();
 include('Configuracion.php');

//Iniciar sesion
$usu 	= $_POST["nombre"];
$pass 	= $_POST["password"];
// traer los detalles de la sesion iniciada
$query = $db->query("SELECT * FROM clientes WHERE nombre ='$usu' and password ='$pass'");
//$queryusuario = mysqli_query($conn,"SELECT * FROM clientes WHERE nombre ='$usu' and password ='$pass'");
//$nr = mysqli_num_rows($queryusuario);
$custRow = $query->fetch_assoc();
$_SESSION['usuario'] = $custRow['nombre'];
$_SESSION['password'] = $custRow['password'];
$_SESSION['idusuario'] = $custRow['id'];

if ($query == 1 ){
header("Location: index.php");
} else {
echo "<script> alert('Usuario, contraseña.');window.location= 'index.php' </script>";
}

?>
