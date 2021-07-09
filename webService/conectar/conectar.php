<?php

$localhost = 'localhost';
$dbusername = 'root';
$dbpassword ='';
$dbname = 'inventario';
$db = new mysqli($localhost,$dbusername,$dbpassword,$dbname);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
}
?>
