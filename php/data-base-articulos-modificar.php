<?php require 'data-base-conexion.php'; ?>
<?php

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Id_articulo = isset($_POST['Id_articulo']) ? $_POST['Id_articulo'] : '';
	$Descripcion = isset($_POST['Descripcion']) ? $_POST['Descripcion'] : '';
	$Iva = isset($_POST['Iva']) ? $_POST['Iva'] : '';
	$Precio = isset($_POST['Precio']) ? $_POST['Precio'] : '';


	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
	//Asignamos la query como una cadena de texto a una variable
	$sql= "UPDATE articulo SET descripcion_art='$Descripcion', precio_articulo='$Precio', iva_articulo='$Iva' WHERE id_articulo='$Id_articulo'";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
	    	echo "se ha insertado un nuevo registro en la base de datos.<br/><br/>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	header("Location: http://localhost/bootstrap/index.php?page=articulos");
	/*cambiar al subir al servidor*/
	 /* Redirect browser */
	exit();
?>  