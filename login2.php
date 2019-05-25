<?php require 'php/functions.php'; ?>
<?php require 'php/data-base-conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php siteName(); ?> | <?php pageTitle(); ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<!--Hoja de estilos propia-->
<link rel="stylesheet" href="css/style.css">

<?
if(!$_POST) {
?>


<body>
    <div class="container"></div>
        <form class="form-signin"  action="<? $_POST ?>" method="post" target="_parent"> 

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


<?
} else {
    $email = $_POST['UserName'];
    $password = $_POST['Password'];
    
    if(!$email || !$password) {
        echo "Debe llenar los campos Correo Electronico y Password";
        exit;
    }

    $sql = "SELECT * FROM comerciales WHERE User_Name='$email' and User_Password='$password'";  
    if ($result = $conn->query($sql)) { 
        if ($row = $result->fetch_assoc()) {
            session_start();
            session_register("registrado");
            $registrado = "SI";
            header ("Location: http://localhost/bootstrap/index.php");
            exit();
        }else {
            header("Location: http://localhost/bootstrap/login.php");
        } 
    }else{
    echo "Fallo al ejecutar la query";
    }
}
?>
        
</body>
</html>    