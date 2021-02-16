<?php
session_start();
$correo = $_SESSION['correo'];
$rol = $_SESSION['rol'];
$nombre = $_SESSION['nombre'];
if (!isset($correo)) {
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../head.php") ?>
</head>

<body>
    <?php include("../body.php") ?>
    <script src="tabla-config.js"></script>
    <script src="crud-fetch.js"></script>
    <script src="new-producto.js"></script>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="../imagenes/logo.png" class="img-responsive" width="100em">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pt-2 ml-5" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <p class="nav-link h3">Inicio</p>
                </li>
            </ul>
            <?php echo '<h5 class="mr-4">Bienvenido ' . $_SESSION['nombre'] . '! <br/><small class="text-muted">Rol: ' . $_SESSION['rol'] . '</small></h5>'; ?>
            <button class="btn btn-danger" onclick="location.href='../login/salir.php'">Salir</button>
        </div>
    </nav>

    <!-- Body -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="encabezado centrado bg-light rounded shadow mb-2 mt-2 text-center">Sección para perros</h1>
            </div>
        </div>
        <!-- Botón de añadir una fila -->
        <?php if ($rol === "Administrador") echo ' <div class="row mb-2"><div class="col-12"><button id="addRow" onclick="prepararInsert()" class="btn btn-success pull-right fa fa-plus" onclick=""> Insertar nueva fila</button></div></div>' ?>
        <div class="row">
            <div class="col-12">
                <table id="tablaperros" class="display table table-responsive table-bordered table-striped table-hover text-center w-100 d-block d-md-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Unidades</th>
                            <?php if ($rol === "Administrador") echo "<th>Acciones</th>" ?>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Diálogo crear nuevo producto -->
    <div id="dialog-formAddRow" title="Añadir un nuevo item">
        <form id="formAddRow">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step=".01">
            </div>
            <div class="form-group">
                <label for="unidades">Unidades:</label>
                <input type="number" class="form-control" id="unidades" name="unidades">
            </div>
        </form>
    </div>
</body>

</html>