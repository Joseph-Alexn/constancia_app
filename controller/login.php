<?php
session_start();
if(!empty($_POST["btningresar"])){
    if(!empty($_POST["usuario"]) and !empty($_POST["clave"])) {
        $usuario=$_POST["usuario"];
        $clave=$_POST["clave"];

        $sql = $conexion->query("SELECT *  FROM usuario WHERE usuario = '$usuario' AND clave='$clave'");

        if($datos=$sql->fetch_object()) {
            $_SESSION["id_usuario"]=$datos->id_usuario;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["apellido"]=$datos->apellido;
            header("location: view/index.php");
        } else {
                echo '<div class="alert alert-danger">Acceso Denegado</div>'; 
            }
        } else {
        echo '<script>  // Example starter JavaScript for disabling form submissions if there are invalid fields
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