<?php 

require '../conexion/conexion.php';
session_start();

$correo = $_POST['loginCorreo'];
$password = $_POST['loginContraseña'];
$nombre = $_POST['signNombre'];

$passHash = crypt($password, "misal");
$sql = "INSERT INTO usuario (nombre, rol, correo, password) VALUES ('$nombre', 'Usuario','$correo','$passHash')";

if(pg_query($conexion,$sql)){
    $_SESSION['nombre'] = $_POST['signNombre'];
    $_SESSION['correo'] = $_POST['loginCorreo'];
    $_SESSION['rol'] = 'Usuario';
    echo json_encode($_POST['signNombre']);
}

pg_close($conexion)
?>