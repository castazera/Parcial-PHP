<?php
$id = $_GET['id'] ?? false;
$board = Tabla::get_x_id($id);
$catalogo_modelos = Modelo::Modelo_name();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tabla</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="form-container">
        <div class="text-center mb-4">
        <h2 class="color-blanco">¿Está seguro que desea eliminar esta tabla?</h2>
            <img src="../img_productos/<?= $board->getImagen() ?>" alt="Imagen de la tabla" class="img_admin rounded shadow-sm">
        </div>
        <?php
                    foreach ($catalogo_modelos as $modelo) {
                        if ($modelo->getModelo_id() == $board->getModelo_id()) { ?>
                            <td><strong>Modelo de la tabla: <?= $modelo->getNombre_modelo() ?></strong></td>
                        <?php break;
                        } ?>
                    <?php  };    ?>
        <div class="text-center">
            <a href="actions/delete_board_acc.php?id=<?= $board->getId() ?>" class="ov-btn-grow-skew-1 mt-4">Eliminar</a>
            <a href="index.php?sec=admin_board" class="ov-btn-grow-skew">Cancelar</a>
        </div>
    </div>
</body>
</html>