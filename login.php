<?php
session_start();
 include('Configuracion.php');

//Iniciar sesion
$email 	= $_POST["correo"];
$pass 	= $_POST["password"];
// traer los detalles de la sesion iniciada
$query = $db->query("SELECT * FROM clientes WHERE correo ='$email' and password ='$pass'");
//$queryusuario = mysqli_query($conn,"SELECT * FROM clientes WHERE nombre ='$usu' and password ='$pass'");
//$nr = mysqli_num_rows($queryusuario);

//Validamos que el correo y la contrase�a utilizada sea correcta, sino, les colocamos un mensaje
$custRow = $query->fetch_assoc();
if($custRow["correo"] == $email && $custRow["password"] != $pass){
	echo "<script> alert('Contrase�a errada');window.location= 'login.html' </script>";
}elseif($custRow["correo"] != $email){
	echo "<script> alert('No existe el usuario.');window.location= 'login.html' </script>";
} else {

//Declaro las variables de la sesion para usarlas en el carrito y demas funciones
$_SESSION['usuario'] = $custRow['nombre'];
$_SESSION['password'] = $custRow['password'];
$_SESSION['idusuario'] = $custRow['id'];

if ($query == 1 ){
header("Location: index.php");
} else {
echo "<script> alert('Usuario, contrase�a.');window.location= 'login.html' </script>";
}
}
?>
