<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;
$postData = $_POST;
$fileData = $_FILES['imagen'];
echo "<pre>";
echo print_r($postData);
echo "</pre>";
try{
    $board = Tabla::get_x_id($id);
    $tipo_id = (int)$postData['tipo_id']; 
    $marca_id = (int)$postData['marca_id']; 
            $nombre_modelo = $postData['modelo_id'];
            $modeloExistente = Modelo::Busca_Modelo($nombre_modelo); 
        
            if (!$modeloExistente) {
                $nuevoModeloId = Modelo::Agregar_Modelo($nombre_modelo); 
            } else {
                $nuevoModeloId = $modeloExistente->getModelo_id();
            }
    $talla = $postData['talla'];
    $publicacion = $postData['publicacion'];
    $color = $postData['color'];
    if(!empty($fileData['tmp_name'])){
        $imagen_url = Imagen::SubirImagen("../../img_productos", $fileData);
        Imagen::BorrarImagen("../../img_productos/".$board->getImagen());
    }else{
        $imagen_url = $postData['imagen_og'];
    }
    $descripcion = $postData['descripcion'];
    $material = $postData['material'];
    $precio = (float)$postData['precio']; 

    $board->editar_tabla(
        $tipo_id,
        $marca_id,
        $nuevoModeloId,
        $evento_id,
        $talla,
        $publicacion,
        $color,
        $imagen_url,
        $descripcion,
        $material,
        $precio,
    );

} catch(Exception $e){
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
}
//header('Location: ../index.php?sec=admin_board');

?>