<?php require 'data-base-conexion.php'; ?>
<?php

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Id_comercial = isset($_POST['Id_comercial']) ? $_POST['Id_comercial'] : '';
	$Nombre_comercial = isset($_POST['Nombre_comercial']) ? $_POST['Nombre_comercial'] : '';
	$Apellidos_comercial = isset($_POST['Apellidos_comercial']) ? $_POST['Apellidos_comercial'] : '';
	$Dni = isset($_POST['Dni']) ? $_POST['Dni'] : '';
	$Direccion = isset($_POST['Direccion_comercial']) ? $_POST['Direccion_comercial'] : '';	
	$Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : '';
	$Movil = isset($_POST['Movil']) ? $_POST['Movil'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';


	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
	//Asignamos la query como una cadena de texto a una variable
	$sql= "UPDATE comerciales SET dni_comercial='$Dni', nombre_comercial='$Nombre_comercial', apellidos_comercial='$Apellidos_comercial', direccion_comercial='$Direccion', telefono_contacto='$Telefono', telefono_movil='$Movil', email='$Email' WHERE id_comercial='$Id_comercial'";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
	    	echo "se ha modificado un nuevo registro en la base de datos.<br/><br/>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	header("Location: http://localhost/bootstrap/index.php?page=comerciales");
	 /* Redirect browser */
	exit();
?>  