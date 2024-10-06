<?php 
require_once 'clases/Vista.php';
require_once 'clases/Tabla.php';

$vista = Vista::ValidarVista($_GET['sec'] ?? null);
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
                            </ul>
    
                        </div>
                    </div>
                </nav>
            </header>
            <main>
    
                <?php if($_GET['sec'] ?? null){
                    require_once "views/{$vista['archivo']}.php";
                }else { ?>
    
    <div style="height: 100vh; 
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(to right,rgb(0 0 0 / 4), rgb(0 0 0 / .1)), url(img_productos/background_inicio.webp);
                background-size:cover ;
                background-position: center;">
     <div style="color: #fff;
                text-align: center;
                width:50%;">
     <h1 style="font-family:Oswald;
                font-size:6em;">BOARDS</h1>
     <p style="font-family:Oswald;
                font-size:1.5em;">Explora nuestra selección de skateboards, longboards, mountainboards y snowboards de alta calidad. Ya sea que estés buscando adrenalina en la montaña, deslizarte por la ciudad, o conquistar nuevos terrenos, tenemos el equipo perfecto para ti.<br> ¡Encuentra tu tabla ideal y comienza la aventura!</p>
     </div>
    </div>
    
                <?php }?>
            </main>
            <footer>
            <div class="sticky-bottom">
                <div class="card">
                <div class="card-body text-center" style="margin-top: auto;">
                    <span class="card-title">Web realizada por <a href="index.php?sec=datos&dev=Brian_Fernandez">Brian Fernandez</a> & <a href="index.php?sec=datos&dev=Bruno_de_Renzis">Bruno de Renzis</a></span>
                    </div>
                </div>
            </nav>
        </header>
        <main>

            <?php if($_GET['sec'] ?? null){
                require_once "views/{$vista['archivo']}.php";
            }else { ?>

<div class="container-index">
 <div class="container-index-1">
 <h1>BOARDS</h1>
 <p>Explora nuestra selección de skateboards, longboards, mountainboards y snowboards de alta calidad. Ya sea que estés buscando adrenalina en la montaña, deslizarte por la ciudad, o conquistar nuevos terrenos, tenemos el equipo perfecto para ti.<br> ¡Encuentra tu tabla ideal y comienza la aventura!</p>
 </div>
</div>

            <?php }?>
        </main>
        <footer class="footer-form">
            <div class="sticky-bottom">
                <div class="card">
                    <div class="card-body text-center footer-margin">
                        <span class="card-title">Web realizada por Brian Fernandez</span>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JavaScript Libraries -->
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
