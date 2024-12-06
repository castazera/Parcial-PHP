<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar una nueva marca</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<div class="form-container">
    <h1 class="mb-4">Agregar nueva marca</h1>
    <form action="actions/add_marcas_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="marcas_nombre">Nombre de la marca:</label>
            <input type="text" id="marcas_nombre" name="marcas_nombre" placeholder="Nombre de la marca" required>
        </div>
        <button type="submit" class="ov-btn-grow-box">Agregar marcas</button>
        <a href="index.php?sec=admin_marcas" class="ov-btn-grow-box-1">Cancelar</a>
    </form>
</div>
</body>
</html>