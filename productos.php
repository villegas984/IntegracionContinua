<?php
include('conn.php');
//$tipo = $_GET['txtTi'];
$array = array();	
if($resultset=getSQLResultSet("SELECT * FROM mis_productos")){
	
	while ($row = $resultset->fetch_array(MYSQLI_NUM)){
		$e = array();
                $e['id'] = $row[0];
                $e['nombre'] = $row[1];
                $e['descripcion'] = $row[2];
                $e['imagen'] = $row[3];
                $e['precio'] = $row[4];
                array_push($array,$e);
	}
        echo json_encode($array);
}
?>