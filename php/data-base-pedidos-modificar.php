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
$Id_pedido = isset($_POST['Id_pedido']) ? $_POST['Id_pedido'] : '';

$Cliente = isset($_POST['Cliente']) ? $_POST['Cliente'] : '';
//$CLIENTES_id_cliente = isset($_POST['Codigo_cliente']) ? $_POST['Codigo_cliente'] : '';
$Fecha_entrega = isset($_POST['Fecha_entrega']) ? $_POST['Fecha_entrega'] : '';
$Observaciones = isset($_POST['Observaciones']) ? $_POST['Observaciones'] : '';
$chkbox = $_POST['chk'];    // array
$articulo = $_POST['select2'];    // array
$BX_peso = $_POST['BX_peso'];    // array
$BX_observaciones = $_POST['BX_observaciones'];    // array
$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';


$sql= "UPDATE pedidos SET CLIENTES_id_cliente = '$Cliente',fecha_entrega = '$Fecha_entrega', observaciones = '$Observaciones' WHERE Id_pedido = '$Id_pedido'";

if ($conn->query($sql) === TRUE) {
	    	/*echo "Se ha modificado el pedido con éxito.<br/><br/>";*/
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}




$sql = "DELETE FROM detalle_pedidos WHERE PEDIDOS_id_pedido = '$Id_pedido'";
$resultado = $conn->query($sql);

foreach($articulo as $a => $b){
	$aux_articulo =  $articulo[$a];
	$aux_peso =  $BX_peso[$a];
	$aux_observaciones =  $BX_observaciones[$a];
	//echo "Error: ".$aux_articulo;

	$sql = "INSERT INTO detalle_pedidos (kg_netos, observaciones, PEDIDOS_id_pedido, ARTICULO_id_articulo) VALUES ('$aux_peso', '$aux_observaciones','$Id_pedido','$aux_articulo')";
	if ($conn->query($sql) === TRUE) {
      	/*echo "se ha insertado un nuevo detalle.<br/><br/>";*/
		$_SESSION['mensaje'] .= "Se ha modificado el pedido con éxito.";
	  } else {
		$_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
}
	//pintar($_SESSION);
	header("Location: http://localhost/bootstrap/index.php?page=pedidos");
	 /* Redirect browser */
	exit();
?>  