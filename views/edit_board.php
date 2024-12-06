<?php 
$id = $_GET['id'] ?? 0;
$table = Tabla::Busca_Producto($id);
$tipo_tabla = Tabla::tipo_tabla();
$eventos = Evento::CatalogoCompleto();
$catalogo_tipo = Tipo::Tipo_name();
$catalogo_modelos = Modelo::Modelo_name();
$catalogo_marca = Marcas::Marcas_name();
$eventos_seleccionados = $table->getEventos_ids();
echo("<pre>");
print_r("asnjkhsakhj");
print_r($eventos_seleccionados);
print_r($eventos);
echo("</pre>");

                

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tabla</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<div class="form-container">
    <h1>Administrador Editor tabla</h1>
    <h2>Edita los datos de una tabla</h2>
    <form action="actions/edit_board_acc.php?id=<?= $table->getId() ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">


            <div>
                <label for="imagen_url">Imagen actual del Producto:</label>
                <?php if ($table->getImagen()): ?>
                    <div>
                        <img src="../img_productos/<?= $table->getImagen() ?>" alt="Imagen del producto" style="max-width: 200px; max-height: 200px;">
                    </div>
                <?php endif; ?>
                <input type="hidden" id="imagen_og" name="imagen_og" class="form-control" value="<?= $table->getImagen() ?>">
            </div>
            <div>
                <label for="imagen" class="form-label">Reemplazar imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
        </div>


        <div class="form-group">
            <label for="modelo_id">Nombre del modelo:</label>
            <?php
                foreach($catalogo_modelos as $modelo) {
                if($modelo->getModelo_id() == $table->getModelo_id()){?> 
                <input type="text" id="modelo_id" name="modelo_id" value="<?=$modelo->getNombre_modelo()?>" placeholder="Nombre del modelo" required>
                <?php break; } ?>
            <?php  };    ?>
            
        </div>


        <div class="form-group">
            <label for="tipo_id">Tipo de Tabla:</label>
            <select id="tipo_id" name="tipo_id" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($catalogo_tipo as $tipo) {?>
                    <option value="<?= $tipo->getTipo_id() ?>" <?= $tipo->getTipo_id() == $table->getTipo() ? 'selected' : '' ?>>
                        <?= $tipo->getNombre_tipo() ?>
                    </option>
                <?php } ?>
            </select>
        </div>


        <div class="form-group">
            <label for="talla">Talle:</label>
            <select id="talla" name="talla" required>
                <option value="" disabled>Seleccionar</option>
                <option value="S" <?= $table->getTalla() == 'S' ? 'selected' : '' ?>>S</option>
                <option value="M" <?= $table->getTalla() == 'M' ? 'selected' : '' ?>>M</option>
                <option value="L" <?= $table->getTalla() == 'L' ? 'selected' : '' ?>>L</option>
                <option value="XL" <?= $table->getTalla() == 'XL' ? 'selected' : '' ?>>XL</option>
            </select>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?= $table->getColor() ?>" required>
        </div>


        <div class="form-group">
            <label for="marca_id">Marca:</label>
            <select name="marca_id" id="marca_id" required>
                <option value="" disabled>Seleccionar</option>
                <?php foreach ($catalogo_marca as $marca) { ?>
                    <option value="<?= $marca->getMarcas_id() ?>" <?= $marca->getMarcas_id() == $table->getMarca_id() ? 'selected' : '' ?>>
                        <?= $marca->getMarcas_nombre() ?>
                    </option>
                <?php } ?>
            </select> 
        </div>


        <div class="form-group">
            <label for="publicacion">Publicación:</label>
            <input type="date" id="publicacion" name="publicacion" value="<?= $table->getPublicacion() ?>" required>
        </div>


        <div class="form-group">
            <label for="material">Material:</label>
            <input type="text" id="material" name="material" value="<?= $table->getMaterial() ?>" placeholder="Material de la tabla" required>
        </div>


        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required><?= $table->getDescripcion() ?></textarea>
        </div>


        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?= $table->getPrecio() ?>" placeholder="Precio" step="0.01" required>
        </div>

        <div class="col-md-12 mb-3">
                    <label class="form-label d-block">Eventos</label>
                    <?PHP                    
                    foreach ($eventos as $evento) {
                    ?>
                        <div class="form-check form-check-inline">
                            <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="eventos[]" 
                            id="eventos_<?= $evento->getEvento_id() ?>" 
                            value="<?= $evento->getEvento_id() ?>"                             
                            <?= in_array($evento->getEvento_id(), $eventos_seleccionados) ? "checked" : "" ?>>
                            <label class="form-check-label mb-2" for="eventos_<?= $evento->getEvento_id() ?>"><?= $evento->getNombre_evento() ?></label>
                        </div>
                    <?PHP } ?>
                </div>

        <button type="submit" class="btn">Finalizar edición</button>
    </form>
</div>
</body>
</html>