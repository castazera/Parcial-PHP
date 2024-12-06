<?php
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? false;

try{
    $marcas = Marcas::get_x_id($id);
    $marcas->borrar_marcas();
} catch (Exception $e){
    header("Location: ../../views/delete_marcas_error.php?id=$id");
    exit();
}
header('Location: ../index.php?sec=admin_marcas');
?>