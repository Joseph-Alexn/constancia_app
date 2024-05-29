<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) and !empty($_POST["cargo"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $cargo = $_POST["cargo"];

        // verificar si existe duplicado
        $verificar_duplicado = $conexion->query("SELECT id_persona FROM persona WHERE cedula = '$cedula'");
        if ($verificar_duplicado->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe un registro con la cedula proporcionada</div>';
        } else {
            $sql = $conexion->query("INSERT INTO persona (nombre, apellido, cedula, cargo) VALUES ('$nombre', '$apellido', $cedula, '$cargo')");
            if ($sql == 1) {
                header("location: index.php");
                echo '<div class="alert alert-success">Registrado con Exito</div>';
            } else {
                echo '<div class="alert alert-danger">Error al Modificar los Datos</div>';
                echo mysqli_error($conexion);
            }
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>