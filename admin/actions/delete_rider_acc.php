<?php
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? false;

try{
    $rider = Rider::get_x_id($id);
    $rider->borrar_rider();
} catch (Exception $e){
    die("No se pudo eliminar el rider");
}
header('Location: ../index.php?sec=admin_riders');
?>