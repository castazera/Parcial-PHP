<?php
$id = $_GET['id'] ?? false;
$board = Tabla::get_x_id($id);
?>
<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta tabla?</h1>
	<div class="col-12 col-md-6">
		<img src="../img_productos/<?= $board->getImagen() ?>" alt="Imágen Illustrativa de <?= $board->getModelo_id() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
	</div>

	<div class="col-12 col-md-6">


		<h2 class="fs-6">Nombre</h2>
		<p><?= $board->getModelo_id() ?></p>


		<a href="actions/delete_board_acc.php?id=<?= $board->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
	</div>



</div>