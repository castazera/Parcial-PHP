<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;
$postData = $_POST;

try{
    $rider = Rider::get_x_id($id);

    $rider->editar_rider(
        $rider->getRider_id(),
        $postData['rider_id'],
    );

} catch(Exception $e){
        echo "<pre>";
        echo print_r($e);
        echo "</pre>";
}
header('Location: ../index.php?sec=admin_riders');

?>