<?php
$id = $_GET['id'] ?? false;
$rider = Rider::get_x_id($id);
echo("<pre>");
print_r($_GET['id']);
echo("</pre>");
?>
<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este rider?</h1>
    

    <div class="col-12 col-md-6">


        <h2 class="fs-6">Nombre rider</h2>
        <p><?= $rider->getNombre_rider() ?></p>


        <a href="actions/delete_rider_acc.php?id=<?= $id ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
    </div>



</div>