<?php 
$id = $_GET['id'] ?? 0;
$table = Tabla::Busca_Producto($id);

     echo "<pre>";
            echo print_r($table);
            echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tabla</title>
    <link rel="stylesheet" href="../estilos/style_admin.css">
</head>
<body>
<div class="form-container">
    <h2>Editar una tabla</h2>
    <form action="actions/edit_board_acc.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="imagen_url">Imagen del Producto:</label>
            <input type="file" id="imagen_url" name="imagen_url" required>
        </div>
        <div class="form-group">
            <label for="modelo_id">Nombre del modelo:</label>
            <input type="text" id="modelo_id" name="modelo_id" placeholder="Nombre del modelo" required>
        </div>
        <div class="form-group">
            <label for="tipo_id">Tipo de Tabla:</label>
            <select id="tipo_id" name="tipo_id" required>
                <option value="" disabled selected> Seleccionar</option>
                <option value="Skateboard">Skateboard</option>
                <option value="Longboard">Longboard</option>
                <option value="Mountainboard">Mountainboard</option>
                <option value="Snowboard">Snowboard</option>
            </select>
        </div>
        <div class="form-group">
            <label for="talla">Talle:</label>
            <select id="talla" name="talla" required>
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
            <label for="marcas_id">Marca:</label>
            <input type="text" id="marcas_id" name="marcas_id" placeholder="Marca de la tabla" required>
        </div>
        <div class="form-group">
            <label for="publicacion">Publicación:</label>
            <input type="date" id="publicacion" name="publicacion" placeholder="Publicación de la tabla" required>
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

        <button type="submit" class="btn">Finalizar edición</button>
    </form>
</div>
</body>
</html>