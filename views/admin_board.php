<?php
$catalogo_completo = Tabla::CatalogoCompleto();
$tipo_tabla = Tabla::tipo_tabla();
$catalogo_modelos = Modelo::Modelo_name();
$catalogo_tipo = Tipo::Tipo_name();
$catalogo_marcas = Marcas::Marcas_name();
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
            <tr >
                <th>Imagen</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Talle</th>
                <th>Color</th>
                <th>Material</th>
                <th>Descripción</th>
                <th>Eventos</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php

            ?>

            <?php foreach ($catalogo_completo as $board) { ?>
                <tr>
                    <td class="box_img">
                        <img src="../img_productos/<?= $board->getImagen() ?>" alt="Skateboard" class="img_admin">
                    </td>

                    <?php
                    foreach ($catalogo_modelos as $modelo) {
                        if ($modelo->getModelo_id() == $board->getModelo_id()) { ?>
                            <td><?= $modelo->getNombre_modelo() ?></td>
                        <?php break;
                        } ?>
                    <?php  };    ?>

                    <?php
                    foreach ($catalogo_tipo as $tipo) {
                        if ($tipo->getTipo_id() == $board->getTipo()) { ?>
                            <td><?= $tipo->getNombre_tipo() ?></td>
                        <?php break;
                        } ?>
                    <?php  };    ?>
                    <td><?= $board->getTalla() ?></td>
                    <td><?= $board->getColor() ?></td>
                    <td><?= $board->getMaterial() ?></td>
                    <td><?= $board->getDescripcion() ?></td>
                    <td>
                        <?PHP
                        foreach ($board->getEventos() as $evento) {
                            echo "<p>" . $evento->getNombre_evento() . "</p>";
                        }
                        ?>
                    </td>
                    <td><?= $board->getPrecio() ?></td>
                    <td>
                    <?php
                    foreach ($catalogo_marcas as $marca) {
                        if ($marca->getMarcas_id() == $board->getMarca_id()) {
                            echo $marca->getMarcas_nombre();
                            break;
                        }
                    }
                    ?>
                </td>

                    <td class="TDbutton">
                        <a href="index.php?sec=edit_board&id=<?= $board->getId() ?>" role="button" class="ov-btn-grow-spin">Editar</a>
                        <a href="index.php?sec=delete_board&id=<?= $board->getId() ?>" role="button" class="ov-btn-grow-spin">Eliminar</a>
                    </td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
    <div class="div_button">
        <a href="index.php?sec=add_boards"><button class="ov-btn-slide-close">Cargar nueva board</button></a>
    </div>
</body>

</html>