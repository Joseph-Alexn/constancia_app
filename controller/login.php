<?php
session_start();

// Verificar si el usuario ya está autenticado antes de mostrar el formulario de inicio de sesión
if (isset($_SESSION["id_usuario"])) {
    if ($_SESSION["rol"] == "administrador") {
        header("location: view/index.php");
    } else {
        header("location: view/nomina.php");
    }
    exit; // Importante: detener la ejecución del resto del código una vez redirigido
}

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["clave"])) {
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario = '$usuario'");

        if ($datos = $sql->fetch_object()) {
            // Verificar la contraseña usando password_verify
            if (password_verify($clave, $datos->clave)) {
                $_SESSION["id_usuario"] = $datos->id_usuario;
                $_SESSION["nombre"] = $datos->nombre;
                $_SESSION["apellido"] = $datos->apellido;
                $_SESSION["rol"] = $datos->rol; // Guardar el rol real del usuario en la sesión
                if ($datos->rol == "administrador") {
                    header("location: view/index.php");
                } else {
                    header("location: view/nomina.php");
                }
                exit; // Importante: detener la ejecución del resto del código una vez redirigido
            } else {
                echo '<div class="alert alert-danger">Acceso Denegado</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Acceso Denegado</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Por favor, ingrese usuario y contraseña</div>';
    }
}
