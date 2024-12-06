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
    <h1 class="mb-4">Agregar Nuevo Evento</h1>
    <form action="actions/add_evento_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="evento_id" >Nombre del evento:</label>
            <input type="text" id="evento_id" name="evento_id" placeholder="Nombre del evento" required>
        </div>
        <button type="submit" class="ov-btn-grow-box">Agregar Evento</button>
        <a href="index.php?sec=admin_eventos" class="ov-btn-grow-box-1">Cancelar</a>
    </form>
</div>
</body>
</html>