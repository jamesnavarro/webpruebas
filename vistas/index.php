<?php
session_start();
include '../configuracion/dbconf.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Pruebas James</title>

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Extreme Tecnology</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        
      <a class="nav-link" href="#"><?php echo $_SESSION['nombre']; ?></a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link" href="#" onclick="form_pqr(0,'Nuevo')">
              <span data-feather="file"></span>
              Nuevo PQR
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="list_pqr(1)">
              <span data-feather="file"></span>
              Listado PQR
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../salir.php">
              <span data-feather="file"></span>
               Cerrar Sesion
            </a>
          </li>
         
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <BR>
        <h2 id="titulo">BIENVENIDO A NUESTRO SISTEMA PQR</h2>
        <hr>
        <div class="table-responsive" id="principal">
            <p>PQR es una sigla que significa, literalmente, ”peticiones, quejas y reclamos”. 1​ Se trata de una actividad mediante la cual, ya sea un cliente o un usuario, de un bien o servicio, se dirige al proveedor del mismo o a la autoridad competente, para expresarle una solicitud, una inconformidad, o que adelante una acción, o deje de hacer algo que pueda ser perjudicial para el consumidor o ciudadano.</p>
      </div>
    </main>
  </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../controller/control.js?v=<?php echo rand(1,100) ?>"></script>
      </body>
</html>
