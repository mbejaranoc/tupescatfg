<?php 
require 'php/functions.php';

/*Cambios POVUV */
//error_reporting(E_ALL);
ini_set("display_errors", 0);
session_start();
$_SESSION['activa'] = true;
$acceso = 1;
$user = getUser($_SESSION);
if($user['access_level'] < $acceso){
  header('Location: //'.$_SERVER['HTTP_HOST'].'/bootstrap/login.php');
}
/*FIN Cambios POVUV */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grupo Tu Pesca</title>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <!--Hoja de estilos propia-->
  <link rel="stylesheet" href="css/style.css">
  <!--desarrollos propios de javasacript-->
  <script type="text/javascript" src="js/script.js"></script>
  <!--librería para usar jquery-->
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <!--librería para usar material icons de google-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>


<body >

  <header >
      <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top justify-content-center">
        
        <a class="navbar-brand" href="http://localhost/bootstrap/index.php">Grupo Tu Pesca</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">

          <ul class="navbar-nav">
            <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbardrop" data-toggle="dropdown">Pedidos</a>
            <div class="dropdown-menu dropdown-content">
              <a class="dropdown-item" href="/bootstrap/index.php?page=anadir_pedido">Pedido nuevo</a>
              <a class="dropdown-item" href="/bootstrap/index.php?page=pedidos">Listado pedidos</a>
              <a class="dropdown-item" href="/bootstrap/index.php?page=cobros">Cobros</a>
            </div>
            </li>

            <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle dropbtn" href="javascript:void(0)" id="navbardrop" data-toggle="dropdown">Clientes</a>
            <div class="dropdown-menu dropdown-content">
              <a class="dropdown-item" href="/bootstrap/index.php?page=anadir_cliente">Añadir cliente</a>
              <a class="dropdown-item" href="/bootstrap/index.php?page=clientes">Listado clientes</a>
            </div>
            </li>
            
            <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbardrop" data-toggle="dropdown">Artículos</a>
            <div class="dropdown-menu dropdown-content">
              <a class="dropdown-item" href="/bootstrap/index.php?page=anadir_articulo">Añadir artículo</a>
              <a class="dropdown-item" href="/bootstrap/index.php?page=articulos">Listado artículos</a>
            </div>
            </li>

            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Usuarios</a>
              <div class="dropdown-menu dropdown-content">
                <a class="dropdown-item" href="/bootstrap/index.php?page=anadir_comercial">Añadir usuario</a>
                <a class="dropdown-item" href="/bootstrap/index.php?page=comerciales">Consultar usuarios</a>
              </div>
            </li>
    
            <li class="nav-item active">
              <a class="nav-link" href="#">Estádisticas</a>
            </li>
    
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/bootstrap/index.php?page=catalogos">Catálogo y ofertas</a>
            </li> 
          
            <li class="nav-item active">
              
            </li> 
          </ul>
          <form class="form-inline" action = "php/logout.php" method="post">
                <input type="submit" class="btn btn-danger btn-sm " value="Cerrar Sesion">
          </form>
        </div>

      </nav>
    </header>

    <article>
      <?php
      mostrarMensaje();
      pageContent($acceso) 
      ?>
    </article>

    <footer>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>. All rights reserved.</footer>

</body>
</html>

