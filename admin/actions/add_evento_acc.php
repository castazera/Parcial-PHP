<?php 
require_once "../../functions/autoload.php";

$postData = $_POST;
echo("<pre>");
print_r($postData);
echo("</pre>");

        try {        
            Evento::insert_evento(
             $postData['evento_id']
            );
        } catch (Exception $e) {
            die("No se pudo cargar: $e");
        }

header('Location: ../index.php?sec=admin_eventos');
?>