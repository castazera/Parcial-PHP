<?php
$id = $_GET['id'] ?? false;
$evento = Evento::get_x_id($id);
echo("<pre>");
print_r($_GET['id']);
echo("</pre>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar evento</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="form-container">
<div class="text-center mb-4">
<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este evento?</h1>
    

    <div class="conta col-12 col-md-6 mx-auto">

        <h2 class="fs-6">Nombre Evento</h2>
        <p><?= $evento->getNombre_evento() ?></p>


        <div class="text-center">
        <a href="actions/delete_evento_acc.php?id=<?= $id ?>" role="button" class="ov-btn-grow-skew-1 mt-4">Eliminar</a>
        <a href="index.php?sec=admin_eventos" class="ov-btn-grow-skew">Cancelar</a>
        </div>
    </div>


</div>
</div>
</div>
</body>
</html>