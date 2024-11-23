<?php
function autoloadClasses($nombreClase){
    echo "<p>SE SOLICITÓ UNA CLASE NO INCLUIDA: $nombreClase</p>";
    $archivoClase = __DIR__ ."/../clases/$nombreClase.php";

    $dir = __DIR__;
    echo "Este es el valor de DIR $dir";
    if(file_exists($archivoClase)){
        require_once $archivoClase;
    } else{
        "No se pudo cargar la clase";
    }
}

spl_autoload_register('autoloadClasses');
?>