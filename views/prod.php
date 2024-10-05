<?php 

$id = $_GET['id'] ?? 0; //null coalcese - Operar
$table = Tabla::Busca_Producto($id);
?>

<div class="container h-rest">
    <div class="row">
            <?php 
                if(!empty($table)){   ?>              
                <div class="col">
                    <img class="" src="img_productos/<?= $table->getImagen()?>" alt="Skateboard">
                </div>
                <div class="col">
                    <h2 class="font-bold"><?= $table->getModelo() ?></h2>
                    <h3><?= $table->precioUnidad() ?></h3>
                    <hr class="separador">
                        <div class="d-flex flex-column">
                            <span>Medidas: </span><button class="square btn "><a><?= $table->getTalla() ?></a></button>
                        </div>
                    <hr class="separador">

                    <p>Color: <?= $table->getColor() ?></p>
                    <p>Material: <?= $table->getMaterial() ?></p>
                    <button class="btn btn-primary">Agregar al carrito</button>
                </div>

                <div class="accordion" id="accordionDescription">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingDescription">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
                                Descripción
                            </button>
                        </h2>
                        <div id="collapseDescription" class="accordion-collapse collapse" aria-labelledby="headingDescription" data-bs-parent="#accordionDescription">
                            <div class="accordion-body">
                                <?= $table->getDescripcion() ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php   }else{  ?> 
                <h1 class="text-center m-5">No se encontro el producto</h1>
                <?php  }  ?> 
    </div>
</div>