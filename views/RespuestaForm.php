<?php 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['email'];
$prod = $_POST['producto'];
$comentario = $_POST['comentario'];
?>

<div class="container d-flex justify-content-center">
        <div class="row justify-content-center m-4 w-75">
            <div class="col-md-8 form-container">
                <h2 class="text-center form-title mt-2">🛹 - Confirmar Queja - 🛹</h2>
                    <div class="mb-3">
                        <p class="lead">Resumen de la queja:</p>
                    </div>
                    
                    <div class="col mb-3">
                        <div class="col-md-6 mb-3">
                            <span>Nombre: <strong><?=$nombre?></strong></span>
                        </div>
                        <div class="col-md-6">
                            <span>Apellido: <strong><?=$apellido?></strong></span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <span>Email: <strong><?=$mail?></strong> </span>
                    </div>
                    
                    <div class="mb-2">
                        <span>¿Con cual producto tuviste incovenientes?</span>
                    </div>
                    <div class="mb-3">
                    <span><strong><?=$prod?></strong></span>
                    </div>
      
                    
                    <div class="mb-4">
                        <span>Tu incoveniente</span>
                        <p><strong><?=$comentario?></strong></p>
                    </div>
                    
                    <div class="text-center">
                        <a href="index.php?sec=QuejaConfirmada" class="btn btn-primary btn-submit">Confirmar Queja</a>
                    </div>
            </div>
        </div>
    </div>