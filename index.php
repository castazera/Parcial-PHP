<?php 
require_once "functions/autoload.php";
$vista = Vista::ValidarVista($_GET['sec'] ?? null);


Autenticacion::verify($vista->getRestringida());
$userData = $_SESSION['loggedIn'] ?? FALSE;


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
                        <a class="navbar-brand logo-responsive" href="index.php?sec=inicio">
                            <div class="container-fluid logoContainer">
                                <img class="logo" src="img/logo1.webp" alt="Logo">
                                <span class="brand-responsive">BOARDS</span>
                            </div>
                        </a>
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="collapsibleNavId">
                            <ul class="justify-content-center navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link font-responsive active" href="index.php?sec=inicio" aria-current="page"
                                        >Inicio
                                        <span class="visually-hidden">(current)</span><a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href="index.php?sec=quienes_somos">¿Quiénes somos?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href= "index.php?sec=catalogo_completo">Catalogo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href= "index.php?sec=OfertasDisponibles">Ofertas disponibles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-responsive" href= "index.php?sec=FormularioDeQuejas">Contacto</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link font-responsive dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categorias</a>
                                    <div
                                        class="dropdown-menu"
                                        aria-labelledby="dropdownId">
                                        <a class="dropdown-item" href="index.php?sec=categorias&board=Snowboard"
                                            >Snowboard</a>
                                        <a class="dropdown-item" href="index.php?sec=categorias&board=Skateboard"
                                            >Skateboard</a>
                                        <a class="dropdown-item" href="index.php?sec=categorias&board=Mountainboard"
                                            >Mountainboard</a>
                                        <a class="dropdown-item" href="index.php?sec=categorias&board=Longboard"
                                            >Longboard</a>
                                    </div>
                                </li>
                                <li class="nav-item
                                 <?= ($userData['rol'] == "superadmin" || $userData['rol'] == "admin") ? '' : 'd-none' ?>">
                                    <a class="nav-link font-responsive" href= "admin/index.php?sec=admin_board">ADMIN</a>
                                </li> 
                                <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                                    <a class="nav-link font-responsive fw-bold" href= "index.php?sec=iniciarSesion">Login</a>
                                </li> 

                                <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                                    <a class="nav-link font-responsive fw-bold" href= "admin/actions/auth_logout.php">Logout</a>
                                </li> 
                                
                                <?PHP if ($userData) { ?>
                                <li class="nav-item">
                                     <a class="nav-link font-responsive bg-danger text-light rounded me-2" href= "#"> <?= $userData['nombre_completo'] ?? "" ?> </a>
                                </li> 
                                <?php }?>
                                
                            </ul>
    
                        </div>
                    </div>
                </nav>
            </header>
            <main>
    
                <?php if($_GET['sec'] ?? null){
                    require_once "views/{$vista->getNombre()}.php";
                }else { ?>
    
<div class="container-index">
 <div class="container-index-1">
 <h1>BOARDS</h1>
 <p>Explora nuestra selección de skateboards, longboards, mountainboards y snowboards de alta calidad. Ya sea que estés buscando adrenalina en la montaña, deslizarte por la ciudad, o conquistar nuevos terrenos, tenemos el equipo perfecto para ti.<br> ¡Encuentra tu tabla ideal y comienza la aventura!</p>
 </div>
</div>
    
                <?php }?>
            </main>
            <footer>
            <div class="sticky-bottom">
                <div class="card">
                <div class="card-body text-center margin-top">
                    <span class="card-title">Web realizada por <a href="index.php?sec=datos_devs">Brian Fernandez & Bruno de Renzis</a></span>
                    </div>
                </div>
            </footer>
        </header>
        <main>
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
