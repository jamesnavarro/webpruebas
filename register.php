<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Pruebas de James</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="controller/control.js?v=<?php echo rand(1,100) ?>"></script>
    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin">
        <p>REGISTRATE AQUI</p>
  <h1 class="h3 mb-3 font-weight-normal">Extreme Tecnology.</h1>
  <div class="form-group">
        <label for="inputEmail">Nombre</label>
        <input type="email" id="nombre" class="form-control" placeholder="Tu Nombres" required autofocus>
        <span id="v1"></span>
  </div>
  <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Tu Email" required autofocus>
        <span id="v2"></span>
  </div>
  <div class="form-group">
      <label for="inputPassword">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" required>
      <span id="v3"></span>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="button" onclick="create_user()">Registrar Usuario</button>
  <hr>
  <a href="index.php" class="btn btn-lg btn-info btn-block" type="button" >Iniciar Sesion</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>

     
</body>
</html>

