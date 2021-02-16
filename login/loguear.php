<?php 

require '../conexion/conexion.php';
session_start();

$correo = $_POST['loginCorreo'];
$password = $_POST['loginContraseña'];

$passHash = crypt($password, "misal");

$sql = "SELECT * FROM usuario WHERE correo = '$correo' and password = '$passHash'";
$consulta = pg_query($conexion,$sql);
$array = pg_fetch_array($consulta);

//Sizeof a veces da error porque la select no devuelve datos
if($array != null){
    $_SESSION['correo'] = $array['correo'];
    $_SESSION['nombre'] = $array['nombre'];
    $_SESSION['rol'] = $array['rol'];
    echo json_encode($array['nombre']);
} else {
    echo json_encode("Usuario o password incorrectos");
}

pg_close($conexion)
?>