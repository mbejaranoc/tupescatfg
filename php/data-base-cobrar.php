<?php 
    require 'data-base-conexion.php'; 
    require 'functions.php'; 
    session_start();
    ?>
<?php

	//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	
	$Id_pedido = isset($_POST['Id_pedido']) ? $_POST['Id_pedido'] : '';
	$chkbox = $_POST['chk'];    // array
	


	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
    //Asignamos la query como una cadena de texto a una variable
    
    foreach($chkbox as $a ){

	    $sql= "UPDATE pedidos SET cobrado='1' WHERE id_pedido='$id'";
		//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
		if ($conn->query($sql) === TRUE) {
			echo $id;
            //$_SESSION['mensaje'] .= "Se ha insertado un nuevo detalle.";
	    } else {
		    $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
	    }
	    //	echo "se ha modificado un registro en la base de datos.<br/><br/>";
		//} else {
		//    echo "Error: " . $sql . "<br>" . $conn->error;
		//}
    }
	//header("Location: http://localhost/bootstrap/index.php?page=cobros");
     /* Redirect browser */
     pintar($_SESSION);
	exit();
?>  