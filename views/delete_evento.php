<?php
$id = $_GET['id'] ?? false;
$evento = Evento::get_x_id($id);
echo("<pre>");
print_r($_GET['id']);
echo("</pre>");
?>
<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este evento?</h1>
    

    <div class="col-12 col-md-6">


        <h2 class="fs-6">Nombre Evento</h2>
        <p><?= $evento->getNombre_evento() ?></p>


        <a href="actions/delete_evento_acc.php?id=<?= $id ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
    </div>



</div>