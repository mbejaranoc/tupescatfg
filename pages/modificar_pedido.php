<?php require 'php/data-base-conexion.php'; ?>

<?php	
	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
?>

<div class="container generic-form">
	<h2>Pedido</h2>
	<hr>
	<form  action="php/data-base-pedidos-modificar.php" method="post"  autocomplete="off">

			<?php
				echo '<input type="hidden" class="form-control" name="Id_pedido" required readonly value="'.$id.'">';
			?>

		<div class="form-group">
			<label for="Cliente">Cliente</label>
			<?php
				$sql= "SELECT CLIENTES_id_cliente FROM pedidos WHERE id_pedido=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$cliente= $row[0];
		    	
				echo '<input type="hidden" class="form-control" name="Cliente" required readonly value="'.$cliente.'">';
			
		    	$sql2= "SELECT nombre_comercial FROM clientes WHERE id_cliente=$cliente";
		    	$result = $conn->query($sql2);
				$row=mysqli_fetch_array($result);
		    	$nombre_cliente= $row[0];
			    echo '<input type="text" class="form-control" name="Cliente_nombre" required disabled value="'.$nombre_cliente.'">';
			?>

		</div>


		<div class="form-group"> 
			<label for="Fecha">Fecha de entrega</label>
			<?php
				$sql = "SELECT fecha_entrega FROM pedidos WHERE id_pedido = $id";
				$result = $conn->query($sql);
				$row = mysqli_fetch_array($result);
				$fecha_entrega = $row[0];
				$newDate = date("Y-m-d", strtotime($fecha_entrega));
				$Today = date("Y-m-d");

				echo '<input class="form-control" type="date" required name="Fecha_entrega" value="'.$newDate.'"  min="'.$Today.'">'; //no puedo añadir type="date"
			?>
		</div>

		<div class="form-group"> 
			<label for="Observaciones">Observaciones</label>	
			<?php
				
				$sql = "SELECT observaciones FROM pedidos WHERE Id_pedido = $id";
				$result = $conn->query($sql);
				$row = mysqli_fetch_array($result);
				$observaciones = $row[0];

				echo '<input class="form-control" type="text" name="Observaciones" value="'.$observaciones.'" >';
			?>

		</div>
		</div>

		<div>
		<h2>Artículos</h2><hr>
		</div>	

		<table id="dataTable" class="form table table-sm table-striped table-bordered">
			<thead class="thead-dark">
				<tr>
					<th class="seleccionar">Seleccionar</th>
					<th>Artículo</th>
					<th style="width: 15%">Cantidad (kg)</th>
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
					<td class="td-checbox">
						<input type="checkbox"  required="required" name="chk[]" checked="checked" />
					</td>
					<td>
						
						<?php
							$sql2= "SELECT ARTICULO_id_articulo FROM detalle_pedidos WHERE id_detalle=$id_detalle";
							$result2 = $conn->query($sql2);
							$row2=mysqli_fetch_array($result2);
							//$row2 = mysqli_fetch_array($result2));
							//$articulo_asociado = $row2['ARTICULO_id_articulo'];
		    				$articulo_asociado = $row2[0];

		    				$sql3= "SELECT * FROM articulo WHERE id_articulo=$articulo_asociado";
		    				$result3 = $conn->query($sql3);
		    				$row3=mysqli_fetch_array($result3);
		    				$descripcion_art = $row3['descripcion_art'];
		    				$id1 = $row3['id_articulo'];

		    				echo '<select name="select2[]" class="form-control" id="select" autofocus>
		    				<option value="'.$id1.'">'.$descripcion_art.'</option>';

							$sql4 = "SELECT * FROM articulo";
							$result4 = $conn->query($sql4);
	          				while ($row4 = mysqli_fetch_array($result4)) {
								$id2 =	$row4['id_articulo'];
								$com =	$row4['descripcion_art'];
								if ($com!=$descripcion_art){						
	            				echo '<option value="'.$id2.'">'.$com.'</option>';
	          					}
	          				}
						?>
								</select>
	
					</td>

					<td>
						<?php 
							echo '<input type="number" class="form-control" value="'.$mostrar['kg_netos'].'" id="BX_peso" name="BX_peso[]" min="0">'
						?>		
					</td>
					<td>
						<?php 
							echo '<input type="text" class="form-control" value="'.$mostrar['observaciones'].'" name="BX_observaciones[]">'
						?>
					</td>
				</tr>
			<?php
				} // Cierre del While
			?>
			</tbody>
		</table>

		<div class="boton-fijado">

			<div class="btn-group ">  
				<button type="button" onClick="javascript:history.back()" class="btn btn-responsive btn-warning" >Volver</button>
			</div>
			<div class="btn-group ">
		  	<button type="button" class="btn btn-form-group btn-responsive" id="anadir_articulo" onClick="addRow('dataTable')">Añadir</button> 
			</div>
			<div class="btn-group">  
		  	<button type="button" class="btn btn-form-group btn-responsive" id="Eliminar artículo" onClick="deleteRow('dataTable')">Eliminar</button>
			</div>
			<div class="btn-group">  
		  	<button type="submit" class="btn btn-form-group btn-responsive" id="insert">Enviar</button> 
			</div>
		</div>

	</form>
</div>
