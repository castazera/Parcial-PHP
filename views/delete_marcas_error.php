<?php
require_once "../functions/autoload.php"; // Asegúrate de que la ruta sea correcta
$id = $_GET['id'] ?? false;
$marca = Marcas::get_x_id($id); // Obtener la marca que se intenta eliminar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error al Eliminar Marca</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="form-container">
        <div class="text-center mb-4">
            <h2 class="color-blanco">No se puede eliminar la marca</h2>
            <p>La marca <strong><?= $marca->getMarcas_nombre() ?></strong> está siendo utilizada por una o más tablas.</p>
        </div>
        <div class="text-center">
            <a href="../admin/index.php?sec=admin_marcas" class="ov-btn-grow-skew">Volver a la lista de marcas</a>
        </div>
    </div>
</body>
</html>