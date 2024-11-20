<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;
$postData = $_POST;
$fileData = $_FILES['imagen_url'];

// echo "<pre>";
// print_r($postData);
// echo "</pre>";
// echo "<pre>";
// print_r($fileData);
// echo "</pre>";
// echo "<pre>";
// print_r($id);
// echo "</pre>";
// echo "<pre>";
// print_r(Tabla::get_x_id($id));
// echo "</pre>";

try{

    $board = Tabla::get_x_id($id);
    $board->editar_tabla(
        $id,
        $postData['tipo_id'],
        $postData['modelo_id'],
        $postData['talla'],
        $postData['publicacion'],
        $postData['color'],
        $postData['imagen_url'],
        $postData['descripcion'],
        $postData['material'],
        $postData['precio'],
    );

} catch(Exception $e){
    echo "<pre>";
        echo print_r($e);
        echo "</pre>";
}
?>