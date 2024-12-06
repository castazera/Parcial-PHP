<?php
$catalogo = Marcas::CatalogoCompleto();
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
    <h1>Panel de Marcass</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($catalogo as $marcas) { ?>
                <tr>
                    <td><?= $marcas->getMarcas_nombre() ?></td>
                    <td class="TDbutton">
                        <a href="index.php?sec=edit_marcas&id=<?= $marcas->getMarcas_id() ?>" role="button" class="ov-btn-grow-spin">Editar</a>
                        <a href="index.php?sec=delete_marcas&id=<?= $marcas->getMarcas_id() ?>" role="button" class="ov-btn-grow-spin">Eliminar</a>
                    </td>

                </tr>
            <?php }; ?>
        </tbody>
    </table>
    <div class="div_button">
        <a href="index.php?sec=add_marcas"><button class="ov-btn-slide-close">Cargar nuevo marcas</button></a>
    </div>
</body>

</html>