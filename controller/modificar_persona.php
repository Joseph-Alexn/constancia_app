<?php
if (!empty($_POST["btnactualizar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) and !empty($_POST["f_nac"]) and !empty($_POST["correo"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $f_nac = $_POST["f_nac"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("UPDATE persona SET nombre='$nombre', apellido='$apellido', cedula=$cedula, f_nac='$f_nac', correo='$correo' WHERE id_persona=$id");
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
?>