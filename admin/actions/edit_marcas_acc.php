<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;
$postData = $_POST;

try{
    echo "<pre>";
    echo print_r($postData);
    echo "</pre>";
    $marcas = Marcas::get_x_id($id);
    $marcas->editar_marcas(
        $marcas->getMarcas_id(),
        $postData['marcas_id'],
    );

} catch(Exception $e){
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
}
header('Location: ../index.php?sec=admin_marcas');

?>