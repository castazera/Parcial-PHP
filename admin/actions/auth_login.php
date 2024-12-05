<?php
require_once "../../functions/autoload.php";
$postData= $_POST;



$login = Autenticacion::log_in($postData['username'],$postData['password']);


if($login){
    if($login == "usuario"){
        header('location: ../../index.php?sec=inicio');
    }else{
        header('location: ../index.php?sec=admin_board');
    }
}else{
    header('location: ../../index.php?sec=iniciarSesion');
}

header('location: ../../index.php?sec=iniciarSesion');

?>