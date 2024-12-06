<?php 
require_once "../../functions/autoload.php";


$postData = $_POST;
$fileData = $_FILES['imagen_url'];


        try {
            $marcas_id = Tabla::insertar_o_actualizar_marca($postData['marcas_id']);
            $modelo_id = Tabla::insertar_o_actualizar_modelo($postData['modelo_id']);
            $tipo_id = Tabla::insertar_o_actualizar_tipo($postData['tipo_id']); 
            $imagen = Imagen::SubirImagen("../../img_productos", $fileData);
        
            $idTabla = Tabla::insert_tabla(
                $tipo_id,
                $marcas_id,
                $modelo_id,
                $postData['talla'],
                $postData['publicacion'],
                $postData['color'],
                $imagen,    
                $postData['descripcion'],
                $postData['material'],
                $postData['precio'],

            );
            if (isset($postData['eventos'])) {
                foreach ($postData['eventos'] as $evento_id) {
                    Tabla::add_eventos($idTabla, $evento_id);
                }
            }
        } catch (Exception $e) {
            die("No se pudo cargar: $e");
        }

header('Location: ../index.php?sec=admin_board');
?>