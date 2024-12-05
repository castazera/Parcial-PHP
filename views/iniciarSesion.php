<?php 
require_once "functions/autoload.php";

?>

<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">

                <div>
                    <?= Alerta::obtenerAlertas(); ?>
                </div>


                    <form action="admin/actions/auth_login.php" method="POST">
                        <div class="mb-3">
                            <label for="user" class="form-label">Usuario:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="username"
                                id="user"
                                aria-describedby="helpId"
                                placeholder="User"
                                Required />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password:</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                id="password"
                                placeholder="Password"
                                Required />
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </div>
    </div>
</div>