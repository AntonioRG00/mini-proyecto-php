<?php 

require '../conexion/conexion.php';

$id = $_POST['id'];

$sql = "DELETE FROM categoriaperro WHERE id = '$id'";

if(!pg_query($conexion,$sql)){
    throw new Exception("Se ha producido un error");
} 

pg_query($conexion)
?>