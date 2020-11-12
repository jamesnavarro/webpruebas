<?php
//configuracion de conexion con la base de datos
$servidorbd = "localhost";
$usuarioBaseDatos = "root";
$claveBaseDatos = ""; 
$baseDatos = "_james";
$con = @mysqli_connect($servidorbd,$usuarioBaseDatos,$claveBaseDatos,$baseDatos);
if (!$con)
die('Hubo un error al conectarse con la base de datos ' . mysqli_error($con));

?>