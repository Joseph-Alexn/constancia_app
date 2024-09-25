<?php
session_start();
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
            if($usuario == "admin" || $usuario == "Admin"){
                header("location: view/index.php");
            }else{
                header("location: view/nomina.php");
            }
            } else {
                echo '<div class="alert alert-danger">Acceso Denegado</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Acceso Denegado</div>';
        }
    } else {
        echo '<script>
        (() => {
            "use strict";

            const forms = document.querySelectorAll(".needs-validation");

            Array.from(forms).forEach((form) => {
                form.addEventListener("submit", (event) => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add("was-validated");
                }, false);
            });
        })();</script>';
    }
}
?>