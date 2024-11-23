<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;
$postData = $_POST;
$fileData = $_FILES['imagen'];

echo "<pre>";
print_r($postData);
echo "</pre>";
echo "<pre>";
print_r($fileData);
echo "</pre>";
echo "<pre>";
print_r($id);
echo "</pre>";
// echo "<pre>";
// print_r(Tabla::get_x_id($id));
// echo "</pre>";

try{
    $board = Tabla::get_x_id($id);
    
    // Convertir los datos a los tipos correctos
    $tipo_id = (int)$postData['tipo_id']; // Convertir a int
    $marca_id = (int)$postData['marca_id']; // Convertir a int
            // Obtener el nombre del modelo ingresado
            $nombre_modelo = $postData['modelo_id'];

            // Verificar si el modelo ya existe
            $modeloExistente = Modelo::Busca_Modelo($nombre_modelo); // Método que debes implementar
        
            if (!$modeloExistente) {
                // Si no existe, agregar el nuevo modelo
                $nuevoModeloId = Modelo::Agregar_Modelo($nombre_modelo); // Método que debes implementar
            } else {
                // Si existe, obtener su ID
                $nuevoModeloId = $modeloExistente->getModelo_id();
            }
    $rider_id = (int)$postData['rider_id']; // Convertir a int
    $evento_id = (int)$postData['evento_id']; // Convertir a int
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
    $precio = (float)$postData['precio']; // Asegúrate de que sea float


    

    echo "<pre>";
    print_r([
        'id' => $id,
        'tipo_id' => $tipo_id,
        'marca_id' => $marca_id,
        'modelo_id' => $nuevoModeloId,
        'talla' => $talla,
        'publicacion' => $publicacion,
        'color' => $color,
        'imagen_url' => $imagen_url,
        'descripcion' => $descripcion,
        'material' => $material,
        'precio' => $precio,
    ]);
    echo "</pre>";


    $board->editar_tabla(
        $tipo_id,
        $marca_id,
        $nuevoModeloId,
        $rider_id,
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
?>