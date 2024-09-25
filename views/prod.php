<?php 

$id = $_GET['id'] ?? 0; //null coalcese - Operar
$table = Tabla::Busca_Producto($id);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php 
                if(!empty($table)){   ?> 
                    <h1 class="text-center m-5">Detalle del producto</h1>
                    <div class="card" style="width: 21rem; margin-right :40px;">
                <div class="container mt-3">
                    <img class="card-img-top" src="img_productos/<?= $table->getImagen()?>" alt="Skateboard">
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $table->getModelo() ?></h2>
                    <p class="card-text">Talle: <?= $table->getTalla() ?></p>
                    <p class="card-text">Color: <?= $table->getColor() ?></p>
                    <p class="card-text">Material: <?= $table->getMaterial() ?></p>
                    <p class="card-text">Descripción: <?= $table->recortar_descripcion(30)?></p>
                    <p class="card-text text-end">$<?= $table->PrecioUnidad() ?></p>
                 </div>
            </div>
                    <?php   }else{  ?> 
                    <h1 class="text-center m-5">No se encontro el producto</h1>
                    <?php  }  ?> 
                      
                    



        </div>
    </div>
</div>