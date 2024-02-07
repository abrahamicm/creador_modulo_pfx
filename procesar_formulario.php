<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $moduleName = $_POST["moduleName"];
    $author = $_POST["author"];
    $description = $_POST["description"];

    // Validar que el nombre no sea vacío
    if (empty($moduleName)) {
        echo "El nombre del módulo no puede estar vacío.";
        exit();
    }

    // Reemplazar espacios en blanco con guiones bajos
    $moduleNameSlug = str_replace(' ', '_', $moduleName);

    // Rutas absolutas
    $moduleDirectory = __DIR__ . "/modules/$moduleNameSlug";
    $moduleFile = "$moduleDirectory/$moduleNameSlug.php";
    $zipFileName = __DIR__ . "/modules/$moduleNameSlug.zip";

    // Verificar si la carpeta del módulo ya existe
    if (!is_dir($moduleDirectory)) {
        // Crear la carpeta del módulo si no existe
        mkdir($moduleDirectory, 0777, true);
    }

    // Crear archivo dentro de la carpeta
    file_put_contents($moduleFile, "<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: $moduleName
Description: $description
Version: 1.0.0
Requires at least: 2.3.*
*/

// Resto del código del módulo...
");

    // Crear archivo zip
    $zip = new ZipArchive();

    if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
        $zip->addFile($moduleFile, "$moduleNameSlug/$moduleNameSlug.php");
        $zip->close();

        // Descargar el archivo zip
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$moduleNameSlug.zip");
        readfile($zipFileName);

        // Eliminar archivos temporales después de la descarga
        unlink($moduleFile);
        unlink($zipFileName);

        exit();
    } else {
        echo "Error al crear el archivo zip.";
    }
}
?>
