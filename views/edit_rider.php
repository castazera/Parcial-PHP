<?php
$id = $_GET['id'] ?? 0;
$rider = Rider::Busca_Rider($id);
$catalogo_riders = Rider::CatalogoCompleto();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rider</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>

<body>
    <div class="form-container">
        <h1>Administrador Editor rider</h1>
        <h2>Editar un Rider</h2>
        <form action="actions/edit_rider_acc.php?id=<?= $rider->getRider_id() ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="rider_id">Nombre del Rider:</label>
                <?php
                foreach ($catalogo_riders as $riderSeleccionado) {
                    if ($riderSeleccionado->getRider_id() == $riderSeleccionado->getRider_id()) { ?>
                        <input type="text" id="rider_id" name="rider_id" value="<?= $rider->getNombre_rider() ?>" placeholder="Nombre del rider" required>
                    <?php break;
                    } ?>
                <?php  };    ?>

            </div>
            <button type="submit" class="btn">Finalizar edición</button>
        </form>
    </div>
</body>

</html>