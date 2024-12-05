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
    <h2>Agregar Nuevo rider</h2>
    <form action="actions/add_rider_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="rider_id">Nombre del rider:</label>
            <input type="text" id="rider_id" name="rider_id" placeholder="Nombre del rider" required>
        </div>
        <button type="submit" class="btn">Agregar Rider</button>
    </form>
</div>
</body>
</html>