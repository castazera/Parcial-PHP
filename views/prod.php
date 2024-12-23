<?php 

$id = $_GET['id'] ?? 0;
$table = Tabla::Busca_Producto($id);
$catalogo_modelos = Modelo::Modelo_name();
$catalogo_marca = Marcas::Marcas_name();
?>
<h1 class="m-4 text-center">Detalle del producto</h1>
<div class="container d-flex justify-content-center h-rest">
    <div class="row middle-tablet-cel">
            <?php 
                if(!empty($table)){   ?>              
                <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <img class="img-width" src="img_productos/<?= $table->getImagen()?>" alt="Skateboard">
                </div>
                <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex flex-column justify-content-center container-prod">
                        <?php            
                        foreach($catalogo_modelos as $modelo) {
                        if($modelo->getModelo_id() == $table->getModelo_id()){?> 
                        <h2 class="font_bold"><?= $modelo->getNombre_modelo()?></h2>
                        <?php break; } ?>
                        <?php  };    ?>
                    <h3><?= $table->precioUnidad() ?></h3>
                    <hr class="separador">
                        <div class="d-flex flex-column">
                            <span>Medidas: </span><button class="text-start square-size btn"><a><?= $table->getTalla() ?></a></button>
                        </div>
                    <hr class="separador">

                    <?php            
                        foreach($catalogo_marca as $marca) {
                        if($marca->getMarcas_id() == $table->getMarcas_id()){?> 
                        <p>Marca: <?=$marca->getMarcas_nombre()?></p>
                        <?php break; } ?>
                        <?php  };    ?>

                    <p>Color: <?= $table->getColor() ?></p>
                    <p>Material: <?= $table->getMaterial() ?></p>

                    <button class="btn btn-primary w-100">Agregar al carrito</button>
                </div>

                <div class="accordion mt-4" id="accordionDescription">
                    <div class="accordion-item">
                        <p class="accordion-header" id="headingDescription">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
                                Descripción
                            </button>
                        </p>
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