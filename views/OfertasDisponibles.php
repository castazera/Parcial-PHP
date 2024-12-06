<?php 
$catalogo = Tabla::Busca_Precio();
$catalogo_modelos = Modelo::Modelo_name();
$catalogo_marcas = Marcas::Marcas_name();

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">¡Tablas en oferta!</h1>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <?php foreach($catalogo as $marca => $detalles) { ?>

            <div class="card mx-2 my-2 col-sm-12 col-md-4 col-lg-3 col-xl-3 ancho">
                <div class="container mt-3">
                    <img class="card-img-top" src="img_productos/<?= $detalles->getImagen()?>" alt="Skateboard">
                </div>

                <div class="card-body">
                <?php            
                        foreach($catalogo_modelos as $modelo) {
                        if($modelo->getModelo_id() == $detalles->getModelo_id()){?> 
                           <h2 class="card-title"><?= $modelo->getNombre_modelo(); ?></h2>
                        <?php break; } ?>
                        <?php  };    ?>
                       <hr>
                        <?php  
                        foreach($catalogo_marcas as $marca) {
                        if($marca->getMarcas_id() == $detalles->getMarca_id()){?> 
                           <p class="card-text">Marca: <?= $marca->getMarcas_nombre(); ?></p>
                        <?php break; } ?>
                        <?php  };    ?>   
                        <hr>
                    <p class="card-text">Talle: <?= $detalles->getTalla() ?></p>
                    <hr>
                    <p class="card-text">Color: <?= $detalles->getColor() ?></p>
                    <hr>
                    <p class="card-text">Material: <?= $detalles->getMaterial()?></p>
                    <hr>
                    <p class="card-text"><strong>Descripción:</strong><br><?=$detalles->recortar_descripcion(100) ?></p>
                    <hr>
                    <p class="card-text text-end mb-5 fw-bold "><?= $detalles->precioUnidad() ?></p>
                    <a href="index.php?sec=prod&id=<?= $detalles->getId()?>" class="btn btn-primary position-absolute bottom-0 start-50 translate-middle-x
                    mb-2">Ver más</a>
                 </div>
            </div>

                <?php }?>    
            </div>
        </div>
    </div>
</div>


