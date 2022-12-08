<?php
session_start();
include("Configuracion.php");

	  $queryStock = mysql_query("SELECT SUM(cantidad) AS total * FROM orden_articulos");
            		$rowStock = mysql_fetch_array($queryStock,0);
?>