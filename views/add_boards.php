<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar una nueva tabla</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<div class="form-container">
    <h2>Agregar Nueva Tabla</h2>
    <form action="actions/add_board_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="imagen">Imagen del Producto:</label>
            <input type="file" id="imagen" name="imagen" required>
        </div>
        <div class="form-group">
            <label for="modelo">Nombre del Modelo:</label>
            <input type="text" id="modelo" name="modelo" placeholder="Nombre del modelo" required>
        </div>
        <!-- <div class="form-group">
            <label for="marca">Marca de la tabla:</label>
            <input type="text" id="marca" name="marca" placeholder="Marca de la tabla" required>
        </div> -->
        <div class="form-group">
            <label for="tipo">Tipo de Tabla:</label>
            <select id="tipo" name="tipo" required>
                <option value="" disabled selected> Seleccionar</option>
                <option value="2">Skateboard</option>
                <option value="4">Longboard</option>
                <option value="3">Mountainboard</option>
                <option value="1">Snowboard</option>
            </select>
        </div>
        <div class="form-group">
            <label for="talle">Talle:</label>
            <select id="talle" name="talle" required>
                <option value="" disabled selected>Seleccionar</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" placeholder="Color de la tabla" required>
        </div>
        <div class="form-group">
            <label for="material">Material:</label>
            <input type="text" id="material" name="material" placeholder="Material de la tabla" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción del producto" required></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio" step="0.01" required>
        </div>

        <button type="submit" class="btn">Agregar Producto</button>
    </form>
</div>
</body>
</html>