<?php 
class Imagen 
{
    public static function SubirImagen($directorio, $fileData ):string{

        $name_img = explode(".", $fileData["name"]);
        $extension = end($name_img);
        $name_nuevo_img = time() . ".$extension";

        $archivosubido = move_uploaded_file($fileData['tmp_name'], "$directorio/$name_nuevo_img");

        if(!$archivosubido){
            throw new Exception("No se puede subir la imagen");
        } else{
            return $name_nuevo_img;
        };

    }
}

?>