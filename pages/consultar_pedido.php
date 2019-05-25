<?php require 'php/data-base-conexion.php'; ?>

<?php	
	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
?>

<div class="container generic-form">
	<h2>Pedido</h2>
	<hr>
	<form  action="php/data-base-pedido-consultar.php" method="post"  autocomplete="off">


		<div class="form-group">
			<label for="Cliente">Cliente</label>
			<?php
				$sql= "SELECT CLIENTES_id_cliente FROM pedidos WHERE id_pedido=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$cliente= $row[0];
		    	$sql2= "SELECT nombre_comercial FROM clientes WHERE id_cliente=$cliente";
		    	$result = $conn->query($sql2);
				$row=mysqli_fetch_array($result);
		    	$nombre_cliente= $row[0];
			    echo '<input type="text" class="form-control" name="Cliente" required disabled value="'.$nombre_cliente.'">';
			?>
		</div>

		<div class="form-group">
			<label for="fecha_entrega">Fecha de entrega</label>
			<?php
			    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT fecha_entrega FROM pedidos WHERE id_pedido=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$fecha_entrega = $row[0];
		    	$newDate = date("d/m/Y", strtotime($fecha_entrega));
		    	echo '<input  class="form-control" disabled name="fecha_entrega" value="'.$newDate.'">';
			?>
		</div>

		<div class="form-group">
			<label for="observaciones">Observaciones</label>
			<?php
			    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT observaciones FROM pedidos WHERE id_pedido=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$observaciones = $row[0];
		    	echo '<input type="text" class="form-control" disabled name="observaciones" value="'.$observaciones.'">';
			?>
		</div>

			

		<table id="dataTable" class="form table table-sm table-striped table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Artículo</th>
					<th class="cantidad">Cantidad (kg)</th>
					<th>Observaciones</th>
				</tr>

			</thead>
			<tbody>
			<?php
				$sql="SELECT * FROM detalle_pedidos WHERE PEDIDOS_id_pedido=$id";
				$result=$conn->query($sql);
				while ($mostrar=mysqli_fetch_array($result)) {
					$id_detalle = $mostrar ['id_detalle'];
			?>
				<tr>
					<td>
						<?php 
							$sql2= "SELECT ARTICULO_id_articulo FROM detalle_pedidos WHERE id_detalle=$id_detalle";
							$result2 = $conn->query($sql2);
							$row2=mysqli_fetch_array($result2);
		    				$articulo_asociado = $row2[0];

		    				$sql3= "SELECT * FROM articulo WHERE id_articulo=$articulo_asociado";
		    				$result3 = $conn->query($sql3);
		    				$row3=mysqli_fetch_array($result3);
		    				$descripcion_art = $row3['descripcion_art'];
		    				$id1 = $row3['id_articulo'];

		    				echo "$descripcion_art";

						?>	
					</td>
					<td><?php echo $mostrar['kg_netos']?></td>
					<td><?php echo $mostrar['observaciones']?></td>
				</tr>
			<?php
				} // Cierre del While
			?>
			</tbody>
		</table>
		

	</form>
	<div class="boton-fijado">
		<div class="btn-group ">  
			<button type="button" onClick="javascript:history.back()" class="btn  btn-responsive btn-warning" >Volver</button> 
		</div>
		<div class="btn-group "> 
			<?php
				echo '<a href="/bootstrap/index.php?page=modificar_pedido&id='.$id.'"><button type="submit" class="btn btn-info btn-responsive submit" id="search">Modificar</button></a>'
			?>
		</div>
	</div>
</div>
