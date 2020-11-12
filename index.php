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
  <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Extreme Tecnology.</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <span id="msj1"></span>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <span id="msj2"></span>
      
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> James Navarro Blanco
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="button" onclick="validate_user()">Iniciar Sesion</button>
  <hr>
  <a href="register.php" class="btn btn-lg btn-info btn-block" type="button" >Registrate</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>

     
</body>
</html>

