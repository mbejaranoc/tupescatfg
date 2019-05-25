<?php require 'data-base-conexion.php'; ?>
<?php

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Id_cliente = isset($_POST['Id_cliente']) ? $_POST['Id_cliente'] : '';
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


	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
	//Asignamos la query como una cadena de texto a una variable
	$sql= "UPDATE clientes SET cif_cliente='$Cif', nombre_comercial='$Nombre_comercial', razon_social='$Razon_social', direccion_descarga='$Direccion_descarga', direccion_fiscal='$Direccion_fiscal', telefono_contacto='$Telefono', movil_contacto='$Movil', fax_cliente='$Fax', persona_contacto='$Persona_contacto', email_cliente='$Email', forma_pago='$Forma_pago', COMERCIALES_id_comercial='$Comercial_asociado' WHERE id_cliente='$Id_cliente'";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
	    	echo "se ha modificado un registro en la base de datos.<br/><br/>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	header("Location: http://localhost/bootstrap/index.php?page=clientes");
	 /* Redirect browser */
	exit();
?>  