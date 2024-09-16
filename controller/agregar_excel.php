<?php

require "../model/conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;

// Verificar si se ha subido un archivo
if (isset($_FILES['archivo_excel']) && $_FILES['archivo_excel']['error'] === UPLOAD_ERR_OK) {
    $tempFile = $_FILES['archivo_excel']['tmp_name'];

    // Utilizar PhpSpreadsheet para cargar el archivo desde el archivo temporal
    $documento = IOFactory::load($tempFile);

    // Ahora puedes procesar el documento Excel según tus necesidades
    // Por ejemplo, obtener los datos de una hoja
    $hoja = $documento->getActiveSheet();
    $datos = $hoja->toArray();

    // Procesar los datos como sea necesario
    
    // ...

    // Limpiar el archivo temporal
    unlink($tempFile);
} else {
    // Manejar el caso en que no se haya subido un archivo o haya ocurrido un error
    echo "Error al subir el archivo";
}