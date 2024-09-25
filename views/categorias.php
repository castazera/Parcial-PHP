<?php 
$board = isset($_GET['board']) ? $_GET['board'] : null;
$Catalogo_Tabla = Tabla::catalogo_tabla($board);

?>

<div class=" d-flex justify-content-center p-5">
                <!-- Si se encontro el personaje -->
<?php if($board){?>
    <div>
        <h1 class="text-center mb-5 fw-bold">¡Elige uno y empeza a andar!</h1>
        <h2><?= $board ?></h2>
        <div class="container">
            <div class="row">
                <?php foreach($Catalogo_Tabla as $marca => $detalles) { ?>

            <div class="card" style="width: 21rem; margin-right :40px; background-color:rgb(33, 37, 41);">
                <div class="container mt-3">
                    <img class="card-img-top" src="img_productos/<?= $detalles->getImagen()?>" alt="Skateboard">
                </div>
                <div class="card-body" style="color:white;">
                    <h2 class="card-title"><?= $detalles->getModelo() ?></h2>
                    <p class="card-text">Talle: <?= $detalles->getTalla() ?></p>
                    <p class="card-text">Color: <?= $detalles->getColor() ?></p>
                    <p class="card-text">Material: <?= $detalles->getMaterial() ?></p>
                    <p class="card-text">Descripción: <?= $detalles->recortar_descripcion() ?></p>
                    <p class="card-text text-end">$<?= $detalles->PrecioUnidad() ?></p>
                    <a href="#" class="btn btn-primary">Comprar</a>
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