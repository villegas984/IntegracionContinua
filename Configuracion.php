<?php
//DB detalles
$dbHost = 'basedatos:3306';
$dbUsername = 'root';
$dbPassword = 'abc123';
$dbName = 'tienda_zapatos';

//Crear conexion a la base de datos
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} //else {
    //    echo "Connected to MySQL Server successfully!";

//}
?>