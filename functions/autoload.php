<?php
session_start();

function autoloadClasses($nombreClase) {
    $archivoClase = __DIR__ . "/../clases/$nombreClase.php";

    if (file_exists($archivoClase)) {
        require_once $archivoClase;
    } else {
        echo "No se pudo cargar la clase"; // Cambié esto para que imprima un mensaje
    }
}

spl_autoload_register('autoloadClasses');
?>