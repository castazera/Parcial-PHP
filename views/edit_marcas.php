<?php
$id = $_GET['id'] ?? 0;
$marcas = Marcas::Busca_Marcas($id);
$catalogo_marcas = Marcas::CatalogoCompleto();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marcas</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>

<body>
    <div class="form-container">
        <h1>Administrador Editor marcas</h1>
        <h2>Editar un marcas</h2>
        <form action="actions/edit_marcas_acc.php?id=<?= $marcas->getmarcas_id() ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="marcas_id">Nombre del marcas:</label>
                <?php
                foreach ($catalogo_marcas as $marcasSeleccionado) {
                    if ($marcasSeleccionado->getmarcas_id() == $marcasSeleccionado->getmarcas_id()) { ?>
                        <input type="text" id="marcas_id" name="marcas_id" value="<?= $marcas->getMarcas_nombre() ?>" placeholder="Nombre del marcas" required>
                    <?php break;
                    } ?>
                <?php  };    ?>

            </div>
            <button type="submit" class="btn">Finalizar edición</button>
        </form>
    </div>
</body>

</html>