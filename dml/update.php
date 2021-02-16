<?php 

require '../conexion/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];

$sql = "UPDATE categoriaperro SET nombre='$nombre', precio=$precio, unidades=$precio WHERE id=$id";

if(!pg_query($conexion,$sql)){
    throw new Exception("Se ha producido un error");
} 

pg_query($conexion)
?>