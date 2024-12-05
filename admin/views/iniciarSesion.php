<?php 
require_once "../../functions/autoload.php";

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Boards - <?= $vista['titulo'] ?></title>
        <meta charset ="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"/>
        <link rel="stylesheet" href="estilos/estilos.css">
    </head>
        <div class="contenedor">
            <header>
                <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
                    <div class="container">
                        <a class="navbar-brand logo-responsive">
                            <div class="container-fluid logoContainer">
                                <span class="brand-responsive">PANEL DE ADMIN</span>
                            </div>
                        </a>
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="collapsibleNavId">
                            <ul class="justify-content-center navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link font-responsive active" href= "../index.php?sec=admin_board">Admin Boards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href= "../index.php?sec=add_boards">Agregar Boards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href="../../index.php?sec=inicio">Volver a inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive fw-bold" href= "iniciarSesion.php">Login</a>
                                </li> 
                        </div>
                    </div>
                </nav>
            </header>
            <main> 
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header bg-info">Login</div>
                <div class="card-body">


                <div>
                    <?= Alerta::obtenerAlertas(); ?>
                </div>
    
                    <form action="../actions/auth_login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario:</label>
                            <input
                                type="text"
                                class="form-control"
                                name="username"
                                id="username"
                                aria-describedby="helpId"
                                placeholder="Username"
                                Required />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
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
                <div class="card-footer text-muted bg-info"></div>
            </div>
        </div>
    </div>
</div>    
</main>
<script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>


