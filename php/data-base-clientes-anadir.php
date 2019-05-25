<?php require 'data-base-conexion.php'; ?>
<?php
require 'functions.php'; 
session_start();

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Nombre_comercial = isset($_POST['Nombre_comercial']) ? $_POST['Nombre_comercial'] : '';
	$Razon_social = isset($_POST['Razon_social']) ? $_POST['Razon_social'] : '';
	$Cif = isset($_POST['Cif']) ? $_POST['Cif'] : '';
	$Direccion_descarga = isset($_POST['Direccion_descarga']) ? $_POST['Direccion_descarga'] : '';	
	$Direccion_fiscal = isset($_POST['Direccion_fiscal']) ? $_POST['Direccion_fiscal'] : '';
	$Telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : '';
	$Movil = isset($_POST['Movil']) ? $_POST['Movil'] : '';
	$Fax = isset($_POST['Fax']) ? $_POST['Fax'] : '';
	$Persona_contacto = isset($_POST['Persona_contacto']) ? $_POST['Persona_contacto'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
	$Forma_pago = isset($_POST['Forma_pago']) ? $_POST['Forma_pago'] : '';
	$Comercial_asociado = isset($_POST['Comercial_asociado']) ? $_POST['Comercial_asociado'] : '';
	$Today = date("Y/m/d h:i:sa");



	//Asignamos la query como una cadena de texto a una variable
	$sql= "INSERT INTO clientes (cif_cliente, nombre_comercial, razon_social, direccion_descarga, direccion_fiscal, telefono_contacto, movil_contacto, fax_cliente, persona_contacto, email_cliente, forma_pago, COMERCIALES_id_comercial, fecha_creacion) VALUES ('$Cif','$Nombre_comercial','$Razon_social','$Direccion_descarga','$Direccion_fiscal','$Telefono','$Movil','$Fax','$Persona_contacto','$Email','$Forma_pago','$Comercial_asociado',NOW())";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
			$_SESSION['mensaje'] = "Se ha insertado un nuevo registro en la base de datos.";
		} else {
			$_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
		}
	
	header("Location: http://localhost/bootstrap/index.php?page=clientes"); /* Redirect browser */
	exit();
?>  
