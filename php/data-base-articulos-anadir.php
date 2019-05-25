<?php require 'data-base-conexion.php'; ?>
<?php
require 'functions.php'; 
session_start();

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Descripcion = isset($_POST['Descripcion']) ? $_POST['Descripcion'] : '';
	$Iva = isset($_POST['Iva']) ? $_POST['Iva'] : '';
	$Precio = isset($_POST['Precio']) ? $_POST['Precio'] : '';
	



	//Asignamos la query como una cadena de texto a una variable
	$sql= "INSERT INTO articulo (descripcion_art, iva_articulo, precio_articulo) VALUES ('$Descripcion','$Iva','$Precio')";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
			$_SESSION['mensaje'] = "Se ha insertado un nuevo registro en la base de datos.";
		} else {
			$_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
		}
	
	header("Location: http://localhost/bootstrap/index.php?page=articulos"); /* Redirect browser */
	exit();
?>  
