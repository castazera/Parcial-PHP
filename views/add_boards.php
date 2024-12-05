<?php
    $eventos = Evento::CatalogoCompleto();
    $marcas = Marcas::Marcas_name();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar una nueva tabla</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>

<body>
    <div class="form-container">
        <h2>Agregar Nueva Tabla</h2>
        <form action="actions/add_board_acc.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="imagen_url">Imagen del Producto:</label>
                <input type="file" id="imagen_url" name="imagen_url" required>
            </div>
            <div class="form-group">
                <label for="modelo_id">Nombre del modelo:</label>
                <input type="text" id="modelo_id" name="modelo_id" placeholder="Nombre del modelo" required>
            </div>
            <div class="form-group">
                <label for="tipo_id">Tipo de Tabla:</label>
                <select id="tipo_id" name="tipo_id" required>
                    <option value="" disabled selected> Seleccionar</option>
                    <option value="Skateboard">Skateboard</option>
                    <option value="Longboard">Longboard</option>
                    <option value="Mountainboard">Mountainboard</option>
                    <option value="Snowboard">Snowboard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="talla">Talle:</label>
                <select id="talla" name="talla" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" placeholder="Color de la tabla" required>
            </div>
            <div class="form-group">
                <label for="publicacion">Publicación:</label>
                <input type="date" id="publicacion" name="publicacion" placeholder="Publicación de la tabla" required>
            </div>
            <div class="form-group">
                <label for="material">Material:</label>
                <input type="text" id="material" name="material" placeholder="Material de la tabla" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción del producto" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio" step="0.01" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="marcas_id" class="form-label">Marca</label>
                <select class="form-select" name="marcas_id" id="marcas_id" required>
                    <option value="" selected disabled>Elija una Marca</option>
                    <?php foreach ($marcas as $m) { ?>
                        <option value="<?= $m->getMarcas_Id() ?>"><?= $m->getMarcas_nombre() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label d-block">Eventos</label>
                <?php foreach ($eventos as $evento) { ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eventos[]" id="eventos<?= $evento->getEvento_id() ?>" value="<?= $evento->getEvento_id() ?>">
                        <label class="form-check-label mb-2" for="eventos_<?= $evento->getEvento_id() ?>"><?= $evento->getNombre_evento() ?></label>
                    </div>
                <?php } ?>
            </div>

                <button type="submit" class="btn">Agregar Producto</button>
        </form>
    </div>
</body>

</html>