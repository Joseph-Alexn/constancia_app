<?php

require "../model/conexion.php";
require "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

// Verificar si se ha subido un archivo
if (isset($_FILES['archivo_excel']) && $_FILES['archivo_excel']['error'] === UPLOAD_ERR_OK) {
    $tempFile = $_FILES['archivo_excel']['tmp_name'];

    // Utilizar PhpSpreadsheet para cargar el archivo desde el archivo temporal
    $documento = IOFactory::load($tempFile);
    $hojaActual = $documento->getSheet(0);
    $numeroFilas = $hojaActual->getHighestDataRow();
    $letra = $hojaActual->getHighestColumn();

    for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
        $valorA = $hojaActual->getCell('A' . $indiceFila)->getValue();
        $valorB = $hojaActual->getCell('B' . $indiceFila)->getValue();
        $valorC = $hojaActual->getCell('C' . $indiceFila)->getValue();
        $valorD = $hojaActual->getCell('D' . $indiceFila)->getValue();
        $valorE = $hojaActual->getCell('E' . $indiceFila)->getValue();

        if (empty($valorA) || empty($valorB) || empty($valorC) || empty($valorD) || empty($valorE)) {
            echo "Error: Todos los campos son requeridos en la fila $indiceFila. Por favor revise el archivo.<br>";
            continue; // Pasar a la siguiente iteración del bucle
        }

        // Validar si la cédula contiene solo números
        if (!is_numeric($valorC)) {
            echo "Error: El campo cédula en la fila $indiceFila debe contener solo números.<br>";
            continue; // Pasar a la siguiente iteración del bucle
        }

        // Verificar si la cédula ya existe en la tabla
        $sql_select = "SELECT * FROM persona WHERE cedula = '$valorC'";
        $resultado = $conexion->query($sql_select);

        if ($resultado->num_rows > 0) {
            // La cédula ya existe, realizar actualización
            $sql_update = "UPDATE persona SET nombre = '$valorA', apellido = '$valorB', cargo = '$valorD', gerencia = '$valorE' WHERE cedula = '$valorC'";
            $conexion->query($sql_update);
        } else {
            // La cédula no existe, realizar inserción
            $sql_insert = "INSERT INTO persona (nombre, apellido, cedula, cargo, gerencia) VALUES ('$valorA', '$valorB', '$valorC', '$valorD', '$valorE')";
            $conexion->query($sql_insert);
        }
        header("location: ../view/index.php");
    }
    // Limpiar el archivo temporal
    unlink($tempFile);
} else {
    // Mostrar un mensaje de error si no se seleccionó ningún archivo o si ocurrió un error durante la carga
    echo "Lo sentimos, se debe seleccionar un archivo para subir.";
}
