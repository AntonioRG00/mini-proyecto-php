<?php
session_start();
if (isset($_SESSION['correo'])) {
    header("location: web/index.php");
}
?>

<!doctype html>
<html lang="es">

<head>
    <?php include("head.php") ?>
</head>

<body>
    <?php include("body.php") ?>
    <script>
        $(function() {
            $("#containerLogin").draggable();
        });
    </script>
    <script type="text/javascript">
        /** Añade o quita el input de nombre dependiendo del login*/
        function tipoLogin(idBoton) {
            if (idBoton == "btSign") {
                document.getElementById('login').setAttribute('tipo', 'sign')
                $("#header").text("Darse de alta")
                $("#signNombre").get(0).type = "text"
            } else {
                document.getElementById('login').setAttribute('tipo', 'login')
                $("#header").text("Loguearse")
                $("#signNombre").get(0).type = "hidden"
            }
        }
    </script>

    <div class="container" id="containerLogin">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 id="header" class="encabezado centrado bg-light rounded shadow mb-2 mt-2">Loguearse</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col-md-3 mb-1">
                <button id="btSign" type="button" class="btn btn-primary btn-block" onclick="tipoLogin(this.id)">Sign
                    in</button>
            </div>
            <div class="col-md-3 mb-1">
                <button id="btLogin" type="button" class="btn btn-warning btn-block" onclick="tipoLogin(this.id)">Log
                    in</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="login">
                    <div class="form-group">
                        <input type="text" name="loginCorreo" class="form-control" id="loginCorreo" placeholder="Correo" style="margin-bottom: 10px;" required>
                        <input type="password" name="loginContraseña" class="form-control" id="loginContraseña" placeholder="Contraseña" style="margin-bottom: 10px;" required>
                        <input type="hidden" name="signNombre" class="form-control" id="signNombre" placeholder="Nombre" style="margin-bottom: 10px;" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-block">Entrar</button>
                    </div>
                </form>
                <script src="login/fetch.js"></script>
            </div>
        </div>
    </div>

    <!-- Modal para los mensajes -->
    <div class="modal fade" id="global-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modal-head"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="modal-body"></h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>