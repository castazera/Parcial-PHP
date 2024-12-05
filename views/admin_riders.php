<?php
$catalogo = Rider::CatalogoCompleto();
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
    <h1>Panel de Riders</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($catalogo as $rider) { ?>
                <tr>
                    <td><?= $rider->getNombre_rider() ?></td>
                    <td class="TDbutton">
                        <a href="index.php?sec=edit_rider&id=<?= $rider->getRider_id() ?>" role="button" class="button edit">Editar</a>
                        <a href="index.php?sec=delete_rider&id=<?= $rider->getRider_id() ?>" role="button" class="button delete">Eliminar</a>
                    </td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
    <div class="div_button">
        <a href="index.php?sec=add_rider"><button class="add-button">Cargar nuevo rider</button></a>
    </div>
</body>

</html>