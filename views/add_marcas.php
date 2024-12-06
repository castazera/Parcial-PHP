<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar un nuevo rider</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<div class="form-container">
    <h1>Administrador nuevo rider</h1>
    <h2>Agregar Nuevo rider</h2>
    <form action="actions/add_marcas_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="marcas_id">Nombre de la marca:</label>
            <input type="text" id="marcas_id" name="marcas_id" placeholder="Nombre del marcas" required>
        </div>
        <button type="submit" class="btn">Agregar marcas</button>
    </form>
</div>
</body>
</html>