<?php 
require_once "../../clases/Conexion.php";
require_once "../../clases/Tabla.php";

$postData = $_POST;
$fileData = $_FILES;

        // echo "<pre>";
        // echo print_r($postData);
        // echo "</pre>";

        // echo "<pre>";
        // echo print_r($fileData);
        // echo "</pre>";

try{
    Tabla::insert_tabla(
        'logo1.webp',
        $postData['modelo'],
        $postData['tipo'],
        $postData['talle'],
        $postData['color'],
        $postData['material'],
        $postData['descripcion'],
        $postData['precio'],
    );
}catch(Exception $e){
    die("No se pudo cargar $e");
}
 //CORREGIR ACA
 
echo "Funciono";
?>