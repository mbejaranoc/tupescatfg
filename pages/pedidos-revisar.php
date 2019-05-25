<?php require 'php/data-base-conexion.php'; ?>




<form  action="php/data-base-pedidos-modificar.php" method="post"  autocomplete="off">

	<fieldset>
		<legend>Consultar pedido: </legend>
	<h2>Pedido<br/></h2>
	
		<?php

		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';

		    echo 'Id pedido:  			<input class="cajitaId" type="text" name="Id_cliente" required readonly value="'.$id.'">';

		?>

		<br><br>
		<?php

		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT fecha_pedido FROM pedidos WHERE id_pedido=$id";
			$result = $conn->query($sql);
			$row=mysqli_fetch_array($result);
		    $fecha_pedido= $row[0];
		    echo 'Fecha del pedido:  			<input type="text" name="Nombre_comercial" required value="'.$fecha_pedido.'">';

		?>
			
		<?php

		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT fecha_entrega FROM pedidos WHERE id_pedido=$id";
			$result = $conn->query($sql);
			$row=mysqli_fetch_array($result);
		    $fecha_entrega= $row[0];

		    echo 'Fecha de entrega:  		<input type="text" name="Razon_social" required value="'.$fecha_entrega.'">';

		?>
		<br><br>
		<?php

		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT cobrado FROM pedidos WHERE id_pedido=$id";
			$result = $conn->query($sql);
			$row=mysqli_fetch_array($result);
		    $cobrado= $row[0];

		    echo 'Cobrado: <input type="text" name="Cif" required value="'.$cobrado.'">';

		?>

		<?php
		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT CLIENTES_id_cliente FROM pedidos WHERE id_pedido=$id";
			$result = $conn->query($sql);
			$row=mysqli_fetch_array($result);
		    $CLIENTES_id_cliente= $row[0];

		    echo 'Cliente: 	<input type="text" name="Direccion_descarga" value="'.$CLIENTES_id_cliente.'">';

		?>

		<?php
		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT observaciones FROM pedidos WHERE id_pedido=$id";
			$result = $conn->query($sql);
			$row=mysqli_fetch_array($result);
		    $observaciones= $row[0];

		    echo 'Observaciones:		<input type="text" name="Direccion_fiscal"  value="'.$observaciones.'">';
		?>
		
		<br/><br/>

		<h2>Articulos<br/><br/></h2>

			<?php
		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT * FROM detalle_pedidos WHERE PEDIDOS_id_pedido=$id";
			$result = $conn->query($sql);
			//si existen filas devueltas en nuestra query...
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        $aux_articulo =  $row['ARTICULO_id_articulo'];
					$aux_peso =  $row['kg_netos'];
					$aux_observaciones =  $row['observaciones'];
					$sql2= "SELECT * FROM articulo WHERE id_articulo=$aux_articulo";
					$result2 = $conn->query($sql2);
					$row2 = $result2->fetch_assoc();
					$aux_articulo =  $row2['descripcion_art'];

					echo 'Artículo:		<input type="text" name="Direccion_fiscal"  value="'.$aux_articulo.'">';
					echo 'Peso neto:		<input type="text" name="Direccion_fiscal"  value="'.$aux_peso.'">';
					echo 'Observaciones:		<input type="text" name="Direccion_fiscal"  value="'.$aux_observaciones.'">';
					echo '<br><br>';
			    }
			} else {
			    echo "0 results";
			}

			?>		
						<input type="submit" name="insert" value="Modificar">

	</fieldset>
</form>

<?php

    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';

?>