<?php
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? false;

try{
    $board = Tabla::get_x_id($id);
    $board->borrar_tabla();
} catch (Exception $e){
    die("No se pudo eliminar al personaje");
}
header('Location: ../index.php?sec=admin_board');
?>