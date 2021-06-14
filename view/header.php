<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Sunset Surf</title>
    <!-- Custom styles -->
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="images/png" href="public/assets/images/icon.png" />

    <!-- Custom js -->
    <script type="text/javascript" src="public/assets/js/main.js" charset="utf-8"></script>
</head>

<body>
    <video autoplay muted loop id="myVideo">
        <source src="public/assets/media/waves-loop.mp4" type="video/mp4">
    </video>
    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header>
            <!-- NAV -->
            <nav class="transparent navbar navbar-expand-lg navbar-expand-xl navbar-light justify-content-around text-center">

                <a class="navbar-brand font-weight-bold text-light mr-5" href="?">
                    <img src="public/assets/images/icon.png" width="50" height="50" class="d-inline-block align-center mr-sm-2" alt="">
                    <h4>Sunset Surf</h4>
                </a>
                <!-- boton de menu que se muestra al colapsar pagina -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ml-5">
                        <li class="nav-item active">
                            <a class="nav-link text-light font-weight-bold" href="?">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light font-weight-bold" href="?c=frontclases">CLASES DE SURF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light font-weight-bold" href="?c=frontalquileres">ALQUILER DE MATERIAL</a>
                        </li>
                    </ul>

                    <form class="form-inline my-2 my-lg-0" id="formlogin" action="?c=login&a=autenticar" style="display:flex" method="POST" enctype="application/x-www-form-urlencoded" accept-charset="UTF-8">
                        <div class="form-group">
                            <input class="form-control mr-sm-2 mb-sm-2" type="text" name="user" placeholder="Correo/Dni" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control mr-sm-2 mb-sm-2" type="password" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-sm-2 mb-sm-2">Entrar</button>
                            <a href="?c=cliente&a=editar" class="btn btn-primary mr-sm-2 mb-sm-2">Registrarse</a>
                        </div>
                    </form>
                    <a id="btnlogout" href="?c=login&a=logout" onclick="logout()" class="btn btn-danger mr-sm-2 mb-sm-2" style="display:none">Logout</a>
                </div>
                <audio controls class="float-xl-right float-right float-sm-right mr-sm-4">
                    <source src="public/assets/media/waves-sound.mp3" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>
            </nav>
        </header>