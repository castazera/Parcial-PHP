<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;
$postData = $_POST;

try {
    $evento = Evento::get_x_id($id);
    $evento->editar_evento(
        $evento->getEvento_id(),
        $postData['evento_id']
    );
} catch(Exception $e) {
    echo "<pre>";
    echo print_r($e);
    echo "</pre>";
}
header('Location: ../index.php?sec=admin_eventos');
?>