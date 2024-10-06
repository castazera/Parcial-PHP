<?php 
$catalogo = Tabla::CatalogoCompleto();
?>
    <div class="container d-flex justify-content-center form-f">
        <div class="row justify-content-center m-4 w-75">
            <div class="col-md-8 form-container">
                <h2 class="text-center form-title mt-2">🛹 - Formulario de Quejas - 🛹</h2>
                <form action="index.php?sec=RespuestaForm" method="post">
                    <div class="mb-3">
                        <p class="lead">¿Tuviste algún inconveniente con nuestro producto?</p>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="producto" class="form-label">¿Con cual producto tuviste incovenientes?</label>
                        <select class="form-select" name="producto" required>
                        <option disabled selected>Seleccione un producto</option>
                        <?php foreach($catalogo as $marca => $detalles) { ?>
                        <option><?=$detalles->getModelo()?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="comentario" class="form-label">Contanos que sucedio.</label>
                        <textarea class="form-control" name="comentario" rows="4" required></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-submit">Enviar Queja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

