<?php
require_once "../../functions/autoload.php";
$id = $_GET['id'] ?? false;

try{
    $board = Tabla::get_x_id($id);
    $board->clear_eventos();
    $board->borrar_tabla();
} catch (Exception $e){
    die("No se pudo eliminar el board");
}
header('Location: ../index.php?sec=admin_board');
?>