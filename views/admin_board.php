<?php
$catalogo = Tabla::CatalogoCompleto();
$tipo_tabla = Tabla::tipo_tabla();
$catalogo_modelos = Modelo::Modelo_name();
$catalogo_tipo = Tipo::Tipo_name();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<h1>Panel de Boards</h1>
<table>
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Modelo</th>
            <th>Tipo</th>
            <th>Talle</th>
            <th>Color</th>
            <th>Material</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    
        <?php 
            
  ?>

        <?php foreach ($catalogo as $board){ ?>
        <tr>
            <td class="box_img">
                <img src="../img_productos/<?= $board->getImagen()?>" alt="Skateboard" class="img_admin">
            </td> 
                
            <?php
            foreach($catalogo_modelos as $modelo) {
            if($modelo->getModelo_id() == $board->getModelo_id()){?> 
            <td><?= $modelo->getNombre_modelo()?></td>
            <?php break; } ?>
            <?php  };    ?>

            <?php
            foreach($catalogo_tipo as $tipo) {
            if($tipo->getTipo_id() == $board->getTipo()){?> 
            <td><?= $tipo->getNombre_tipo()?></td>
            <?php break; } ?>
            <?php  };    ?>
            <td><?= $board->getTalla() ?></td>
            <td><?= $board->getColor() ?></td>
            <td><?= $board->getMaterial() ?></td>
            <td><?= $board->getDescripcion() ?></td>
            <td><?= $board->getPrecio() ?></td>

            <td>
                <button class="button edit">Editar</button>
                <button class="button delete">Eliminar</button>
            </td>
        </tr>
        <?php }; ?>
    </tbody>
</table>
<div class="div_button">
<a href="index.php?sec=add_boards"><button class="add-button">Cargar nueva board</button></a>
</div>
</body>
</html> 