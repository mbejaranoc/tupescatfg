<?php 
require 'php/functions.php'; 
session_start();
//pintar($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php siteName(); ?> | <?php pageTitle(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<!--Hoja de estilos propia-->
<link rel="stylesheet" href="css/style.css">
   


<body>
    <div class="container"></div>
        <?php mostrarMensaje(); ?>
        <form class="form-signin"  action="php/login_function.php" method="post"> 

        <h2 class="form-signin-heading text-center">Grupo Tu Pesca<br></h2>

            <div class style="padding-bottom: 10px ">
                <label for="UserName" class="sr-only">Usuario</label>
                <input type="text" class="form-control" id="UserName" placeholder='Usuario' name="UserName" required autofocus>
            </div>

            <div class>
                <label for="Password" class="sr-only">Contraseña</label>
                <input type="password" class="form-control" id="Password" placeholder='Contraseña' name="Password" required>
            </div>

            <button type="submit" class="btn btn-lg btn-primary btn-block btn-responsive" type="submit" id="search">Entrar</button>
            </div>
  
        </form>
</body>
</html>    