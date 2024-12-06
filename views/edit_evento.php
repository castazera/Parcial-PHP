<?php
$id = $_GET['id'] ?? 0;
$evento = Evento::Busca_Evento($id);
$catalogo_eventos = Evento::CatalogoCompleto();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>

<body>
    <div class="form-container">
        <h1>Editor eventos</h1>
        <h2>Editar un Evento</h2>
        <form action="actions/edit_evento_acc.php?id=<?= $evento->getEvento_id() ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="evento_id">Nombre del Evento:</label>
                <?php
                foreach ($catalogo_eventos as $eventoSeleccionado) {
                    if ($eventoSeleccionado->getEvento_id() == $eventoSeleccionado->getEvento_id()) { ?>
                        <input type="text" id="evento_id" name="evento_id" value="<?= $evento->getNombre_evento() ?>" placeholder="Nombre del evento" required>
                    <?php break;
                    } ?>
                <?php  };    ?>

            </div>
            <button type="submit" class="ov-btn-grow-box">Finalizar edición</button>
            <a href="index.php?sec=admin_eventos" class="ov-btn-grow-box-1">Cancelar</a>
        </form>
    </div>
</body>

</html>