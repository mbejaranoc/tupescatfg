<?php require 'data-base-conexion.php'; ?>
<?php /*
	session_start();
	if (isset($_SESSION['user'])) {
	   $id_logueado = $_SESSION['user'];
	 }*/
require 'functions.php'; 
session_start();
?>

<?php


//Recogemos los valores de los formularios para guardarlos en variables de nuestro entorno	

$Cliente = isset($_POST['select1']) ? $_POST['select1'] : '';
//$CLIENTES_id_cliente = isset($_POST['Codigo_cliente']) ? $_POST['Codigo_cliente'] : '';
$Fecha_entrega = isset($_POST['Fecha_entrega']) ? $_POST['Fecha_entrega'] : '';
$Observaciones = isset($_POST['Observaciones']) ? $_POST['Observaciones'] : '';
$chkbox = $_POST['chk'];    // array
$articulo = $_POST['select2'];    // array
$BX_peso = $_POST['BX_peso'];    // array
$BX_observaciones = $_POST['BX_observaciones'];    // array



//Asignamos la query como una cadena de texto a una variable
$query = "SELECT id_pedido FROM pedidos ORDER BY id_pedido DESC";
$resultado = $conn->query($query);
//$row = $result->fetch_assoc();
if ($resultado->num_rows>0) {
		$resultado->data_seek(0);
    	$fila = $resultado->fetch_row();
    	$max_id = $fila[0];
    	$new_id = $max_id + 1;
    	echo "El nuevo Id es = " . $new_id . "<br>";

	} else {
			$new_id = 1;
    		echo "El nuevo Id es = " . $new_id . "<br>";
	   /* echo "Error: " . $query . "<br>" . $conn->error;*/
	} 

$sql= "INSERT INTO pedidos (id_pedido, fecha_pedido, CLIENTES_id_cliente,fecha_entrega,observaciones) VALUES ('$new_id', NOW(),'$Cliente','$Fecha_entrega','$Observaciones')";
	//Realizamos la query de insercción sobre la base de datos comprobando que es exitosa
	 if ($conn->query($sql) === TRUE) {
         $_SESSION['mensaje'] = "Se ha insertado un nuevo pedido correctamente.<br>";
	  } else {
	     $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
	  }

//Insercción de detalles relacionados con el pedido que hemos insertado anteriormente

foreach($articulo as $a => $b){
	$aux_articulo =  $articulo[$a];
	$aux_peso =  $BX_peso[$a];
	$aux_observaciones =  $BX_observaciones[$a];

$sql = "INSERT INTO detalle_pedidos (kg_netos, observaciones, PEDIDOS_id_pedido, ARTICULO_id_articulo) VALUES ('$aux_peso', '$aux_observaciones','$new_id','$aux_articulo')";
if ($conn->query($sql) === TRUE) {
      	//echo "se ha insertado un nuevo detalle.<br/><br/>";
		//$_SESSION['mensaje'] .= "Se ha insertado un nuevo detalle.";
	  } else {
		$_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
	  }
}

//pintar($_SESSION);
//Redirige el browser a la pantalla anterior
//header($path);
header("Location: http://localhost/bootstrap/index.php?page=pedidos"); /* Redirect browser */
exit();
?>  













