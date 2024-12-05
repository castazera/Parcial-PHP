<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar un nuevo evento</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<div class="form-container">
    <h1>Administrador nuevo evento</h1>
    <h2>Agregar Nuevo Evento</h2>
    <form action="actions/add_evento_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="evento_id">Nombre del evento:</label>
            <input type="text" id="evento_id" name="evento_id" placeholder="Nombre del evento" required>
        </div>
        <button type="submit" class="btn">Agregar Evento</button>
    </form>
</div>
</body>
</html>