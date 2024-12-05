<?php
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? false;

try{
    $evento = Evento::get_x_id($id);
    $evento->borrar_evento();
} catch (Exception $e){
    die("No se pudo eliminar el evento");
}
header('Location: ../index.php?sec=admin_eventos');
?>