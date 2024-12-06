<?php
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? false;

try{
    $marcas = Marcas::get_x_id($id);
    $marcas->borrar_marcas();
} catch (Exception $e){
    die("No se pudo eliminar el marcas");
}
header('Location: ../index.php?sec=admin_marcas');
?>