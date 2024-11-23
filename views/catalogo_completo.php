<?php 
$catalogo = Tabla::CatalogoCompleto();
$catalogo_modelos = Modelo::Modelo_name();

?>

<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">¡Elige uno y empeza a andar!</h1>
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
                        <h2 class="card-title"><?= $modelo->getNombre_modelo()?></h2>
                        <?php break; } ?>
                        <?php  };    ?>
                    <p class="card-text">Talle: <?= $detalles->getTalla() ?></p>
                    <p class="card-text">Color: <?= $detalles->getColor() ?></p>
                    <p class="card-text">Material: <?= $detalles->getMaterial()?></p>
                    <p class="card-text">Descripción: <?= $detalles->recortar_descripcion(30) ?></p>
                    <p class="card-text text-end"><?= $detalles->precioUnidad() ?></p>
                    <a href="index.php?sec=prod&id=<?= $detalles->getId()?>" class="btn btn-primary position-absolute bottom-0 start-50 translate-middle-x
                    mb-2">Ver más</a>
                 </div>
            </div>

                <?php }?>    
            </div>
        </div>
    </div>
</div>

