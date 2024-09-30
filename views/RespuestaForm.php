<?php 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['email'];
$prod = $_POST['producto'];
$comentario = $_POST['comentario'];
?>
    <style>
        footer{
            position: absolute;
            bottom: 0;
            width:100%;
            height: auto;
        }
        .form-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .form-title {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .btn-submit {
            background-color: #007bff;
            border: none;
            padding: 10px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>

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