<?php 

$host = "34.105.131.200";
$port = "5432";
$usuario = "antoniorg";
$clave = "antoniorg";
$bd = "midb";

$conexion = pg_connect("dbname='$bd' host='$host' port='$port' user='$usuario' password='$clave'");

?>