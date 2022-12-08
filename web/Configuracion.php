<?php
//DB detalles
$dbHost = 'mysql.webcindario.com';
$dbUsername = 'pruebapsp';
$dbPassword = 'pruebapsp123';
$dbName = 'pruebapsp';

//Crear conexion a la base de datos
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
} 
?>