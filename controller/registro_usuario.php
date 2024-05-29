<?php
if (!empty($_POST["btnRegistrarUsuario"])) {
    if  (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["clave"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        // verificar si existe duplicado
        $verificar_duplicado = $conexion->query("SELECT id_usuario FROM usuario WHERE usuario = '$usuario'");
        if ($verificar_duplicado->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe ese nombre de Usuario</div>';
        } else {
            $sql = $conexion->query("INSERT INTO usuario (nombre, apellido, usuario, clave) VALUES ('$nombre', '$apellido', '$usuario', '$clave')");
            if ($sql == 1) {
                echo '<div class="alert alert-success">Usuario Registrado con Exito</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar Usuario</div>';
            }
        }
    } else {
        echo
        '<script>  // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
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