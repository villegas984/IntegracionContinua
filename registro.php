<?php 
session_start();
/*$usuarioExiste = $usuarioExiste["usextist"];
function alertaNombre(){
	if ($usuarioExiste = "s"){
		echo "Ya existe el usuario con ese correo. Inicie sesión";
		return false;
		$usuarioExiste = "";
	}
}
*/
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Ingresar - Registrarse</title>
     <link rel="stylesheet" href="css/estilo_log.css">	
</head>
<body>
<div class="caja1">
	
<form method="post" action="registro_solicitud.php">
<div class="formtlo">Registrarse</div>
	
<div class="ub1">&#128273; Nombres Completos</div>
<input type="text" name="nombre" required>
<div class="ub1">&#128238; Correo</div>
<input type="email" name="correo" required>
<div class="ub1">&#128240; Dirección</div>
<input type="text" name="direccion" required>
<div class="ub1">&#128242; Celular</div>
<input type="text" name="celular" required>
	
<div class="ub1">&#128274; Contraseña <i style="font-size: 0.7em;">Debe tener mínimo 8 caracteres</i></div>
<input type="password" name="password" id="password" required>
<div class="ub1">&#128274; Confirmar contraseña</div>
<input type="password" name="password2" id="password2" required>

<div align="center">
<input type="submit" style="background-color: lightgray;" href="registro_solicitud.php" value="Registrarse">
<a href="login.html" style="background-color: lightgray;">Iniciar Sesión</a>
<a href="index.php" style="background-color: lightgray; margin-top: 5px;">Volver a la tienda...</a>
</div>
</form>
</div>
</body>

</html>