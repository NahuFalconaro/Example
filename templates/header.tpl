<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="./css/css2.css" />
  <link rel="icon" href="./img/logo_fitnessclub.ico">
  <base href='.BASE_URL.' >
  <title>Document</title>
</head>

<body>
  <header>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="home" class="logo"><img   src="http://www.dmoov.com/web2019/wp-content/uploads/2019/03/cropped-dmoov-fitness-logo.png"></img></a>
  
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link ext" href="rutinas">Rutinas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ext" href="tienda">Tienda</a>
          </li>
          {if $loged == "anonimo"}
          <li class="nav-item">
            <a class="nav-link ext" href="registro">Registro</a>
          </li>
          {/if}
          {if $loged == "admin" || $loged == "easteregg"}
          <li class="nav-item">
            <a class="nav-link ext" href="usuario">Usuarios</a>
          </li>
          {/if}
          {if $loged == "admin" || $loged == "user" || $loged == "easteregg"}
          <li class="nav-item">
            <a class="nav-link ext" href="logout" >Salir</a>
          </li>
          {else}
          <li class="nav-item">
            <a class="nav-link ext" href="logout">Login</a>
          </li>
          {/if}
        </ul>
      </div>
  
    </nav>
  </header>