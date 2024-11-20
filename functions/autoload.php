<?php
//spl_autoload_register registra las funciones como una implementación de autoload
function autoloadClasses($nombreClase){
    $archivoClase = __DIR__ ."/../clases/$nombreClase.php";

    if(file_exists($archivoClase)){
        require_once $archivoClase;
    } else{
        "No se pudo cargar la clase";
    }
}

//Este método se dispara cuando hay clases no incluidas en el autoloadClasses
spl_autoload_register('autoloadClasses');
?>