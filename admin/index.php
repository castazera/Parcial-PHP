<?php 
require_once "../functions/autoload.php";

$vista = Vista::ValidarVista($_GET['sec'] ?? 'index');

Autenticacion::verify($vista->getRestringida());
$userData = $_SESSION['loggedIn'] ?? FALSE;

if (!$userData) {
    header("Location: views/iniciarSesion.php");
    exit(); 
}

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Boards - <?= $vista->getTitulo() ?></title>
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

    <body>
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
                                <?PHP if ($userData) { ?>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive active" href= "index.php?sec=admin_board">Admin Boards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive active" href= "index.php?sec=admin_eventos">Admin Eventos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive active" href= "index.php?sec=admin_riders">Admin Riders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href="../index.php?sec=inicio">Volver a inicio</a>
                                </li>

                                <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                                    <a class="nav-link font-responsive fw-bold" href= "index.php?sec=iniciarSesion">Login</a>
                                </li> 

                                <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                                    <a class="nav-link font-responsive fw-bold" href= "actions/auth_logout.php">Logout</a>
                                </li> 
                                <?php } ?>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
    
                <?php if($_GET['sec'] ?? 'null'){
                    require_once "../views/{$vista->getNombre()}.php";
                }else { 
                ?>
    
<div class="container-index">
 <div class="container-index-1">
 <h1>Panel de administración</h1>
 </div>
</div>
    
                <?php }?>
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
    </body>
</html>
