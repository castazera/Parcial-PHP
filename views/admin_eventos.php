<?php
$catalogo = Evento::CatalogoCompleto();
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
    <h1>Panel de Eventos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del evento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($catalogo as $evento) { ?>
                <tr>
                    <td><?= $evento->getNombre_evento() ?></td>
                    <td class="TDbutton">
                        <a href="index.php?sec=edit_evento&id=<?= $evento->getEvento_id() ?>" role="button" class="button edit">Editar</a>
                        <a href="index.php?sec=delete_evento&id=<?= $evento->getEvento_id() ?>" role="button" class="button delete">Eliminar</a>
                    </td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
    <div class="div_button">
        <a href="index.php?sec=add_evento"><button class="ov-btn-slide-close">Cargar nueva evento</button></a>
    </div>
</body>

</html>