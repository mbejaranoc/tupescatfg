<?php require 'functions.php'; ?>
<?php require 'data-base-conexion.php'; ?>
<?php
	session_start();
	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$UserName = isset($_POST['UserName']) ? $_POST['UserName'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

	//Asignamos la query como una cadena de texto a una variable
	//$sql= "SELECT usuario_id, usuario_nombre, usuario_contraseña FROM usuarios WHERE usuario_nombre = '$UserName' AND usuario_contraseña = '$Password'";	
	



	$sql= "SELECT id_comercial, User_Name, User_Password, User_Type FROM comerciales WHERE User_Name = '$UserName' ";
	if ($result = $conn->query($sql)) {
		if ($row = $result->fetch_assoc()) {
	    	$User_Password = $row['User_Password'];
	    	if (password_verify($Password, $User_Password)){
	    		$_SESSION['user'] = array(
			        'id'           => $row['id_comercial'],
			        'user'         => $row['User_Name'],
			        'user_type'    => $row['User_Type'],
			        'access_level' => getAccessLevel($row['User_Type']),
	    		);
    		header("Location: http://localhost/bootstrap/index.php"); /* Redirect browser */
			}else{
	    		$_SESSION['user'] = array(
			        'id'           => 0,
			        'user'         => 'public',
			        'user_type'    => 'public',
			        'access_level' => 0,
	    		);
	    		$_SESSION['mensaje'] = "Contraseña invalida";
	    		 header("Location: http://localhost/bootstrap/login.php");
			}
		} else {
		    header("Location: http://localhost/bootstrap/login.php");
		}
	}else{
		echo "Fallo al ejecutar la query";
	}

	
?> 

	    