<?php 
require_once "../../functions/autoload.php";

$postData = $_POST;

        try {        
            Evento::insert_evento(
             $postData['evento_id']
            );
        } catch (Exception $e) {
            die("No se pudo cargar: $e");
        }

header('Location: ../index.php?sec=admin_eventos');
?>