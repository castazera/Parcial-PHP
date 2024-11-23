<?php
function autoloadClasses($nombreClase){
    $archivoClase = __DIR__ ."/../clases/$nombreClase.php";

    $dir = __DIR__;
    if(file_exists($archivoClase)){
        require_once $archivoClase;
    } else{
        "No se pudo cargar la clase";
    }
}

spl_autoload_register('autoloadClasses');
?>