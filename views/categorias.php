<?php 
$board = isset($_GET['board']) ? $_GET['board'] : null;
$Catalogo_Tabla = Tabla::catalogo_tabla($board);

?>

<div class=" d-flex justify-content-center p-5">
                <!-- Si se encontro el personaje -->
<?php if($board){?>
    <div>
        <h1 class="text-center mb-5 fw-bold">¡Elige un <?= $board ?> y empezá a andar!</h1>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <?php foreach($Catalogo_Tabla as $marca => $detalles) { ?>

            <div class="card mx-2 my-2 col-sm-12 col-md-4 col-lg-3 col-xl-3 ancho">
                <div class="container mt-3">
                    <img class="card-img-top" src="img_productos/<?= $detalles->getImagen()?>" alt="Skateboard">
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $detalles->getModelo_id() ?></h2>
                    <p class="card-text">Talle: <?= $detalles->getTalla() ?></p>
                    <p class="card-text">Color: <?= $detalles->getColor() ?></p>
                    <p class="card-text">Material: <?= $detalles->getMaterial() ?></p>
                    <p class="card-text">Descripción: <?= $detalles->recortar_descripcion(30) ?></p>
                    <p class="card-text text-end"><?= $detalles->precioUnidad() ?></p>
                    <div class="d-flex w-100 justify-content-center">
                        <a href="index.php?sec=prod&id=<?= $detalles->getId()?>" class="btn btn-primary w-50 mx-auto">Ver más</a>
                    </div>
                 </div>
            </div>
                <?php }?>    
            </div>
        </div>
    </div>
</div>

<div>
<?php }else{?>
    
    <h1 class="text-center mb-5 fw-bold">No existe</h1>

    <?php } ?>
</div>