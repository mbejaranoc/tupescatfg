<?php require 'data-base-conexion.php'; ?>
<?php
require 'functions.php'; 
session_start();

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
	$Apellidos = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : '';
	$Dni = isset($_POST['Dni']) ? $_POST['Dni'] : '';
	$Direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : '';	
	$Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : '';
	$Movil = isset($_POST['Movil']) ? $_POST['Movil'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
	$User_Name = isset($_POST['User_Name']) ? $_POST['User_Name'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$Tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : '';
	$Hash_Password = password_hash($Password, PASSWORD_BCRYPT);


 
	$buscarUsuario = "SELECT * FROM comerciales WHERE User_Name = '$User_Name' ";

	$result = $conn->query($buscarUsuario);

 	$count = mysqli_num_rows($result);

 	if ($count == 1) {

 		echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
		echo "<a href='http://localhost/bootstrap/index.php?page=anadir_comercial'>Por favor escoga otro Nombre</a>";
 	}else{

	



	//Asignamos la query como una cadena de texto a una variable
	$sql= "INSERT INTO comerciales (dni_comercial, nombre_comercial, apellidos_comercial, direccion_comercial, telefono_contacto, telefono_movil, email, User_Name, User_Password, User_Type) VALUES ('$Dni','$Nombre','$Apellidos','$Direccion','$Telefono','$Movil','$Email', '$User_Name', '$Hash_Password', '$Tipo')";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
			$_SESSION['mensaje'] = "Se ha insertado un nuevo registro en la base de datos.";
		} else {
			$_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	

	header("Location: http://localhost/bootstrap/index.php?page=comerciales"); /* Redirect browser */
	exit();
?>  
