<?php
if (!empty($_POST["btnactualizar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) and !empty($_POST["cargo"] and !empty($_POST["gerencia"]))) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $cargo = $_POST["cargo"];
        $gerencia = $_POST["gerencia"];

        $sql = $conexion->query("UPDATE persona SET nombre='$nombre', apellido='$apellido', cedula=$cedula, cargo='$cargo', gerencia='$gerencia' WHERE id_persona=$id");
        if ($sql == 1) {
            header("location:index.php");
        } else {
            echo '<div class="alert alert-danger">Error al Modificar los Datos</div>';
            echo mysqli_error($conexion);
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacio</div>';
    }
}
