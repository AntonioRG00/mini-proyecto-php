<?php 

require '../conexion/conexion.php';

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];

$sql = "INSERT INTO categoriaperro (nombre, precio, unidades) VALUES ('$nombre',$precio,$unidades)";

if(!pg_query($conexion,$sql)){
    throw new Exception("Se ha producido un error");
} 

pg_query($conexion)
?>