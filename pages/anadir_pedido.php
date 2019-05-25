<?php
require 'php/data-base-conexion.php'; 
?>

<!--<?php
	if (isset($_SESSION['user'])) {
	   $id_logueado = $_SESSION['user'];
	 } else {
	   $id_logueado = '1';
	 }
	 
     $sql_logueado= "SELECT * FROM comerciales WHERE id_comercial = $id_logueado";
     $result_logueado = $conn->query($sql_logueado);
     $row_logueado=mysqli_fetch_array($result_logueado);
?>-->

<div class="container generic-form">
	<div class="titulo-formulario">
		<h2>Nuevo pedido</h2><hr>
	</div>
	
	<form class="add-form" action="php/data-base-pedidos-anadir.php" method="post"  autocomplete="off">
		<div> 
			<div class="form-group"> 
				<label for="Cliente">Cliente</label>
				<br>				
				<select class="form-control" id="select" name='select1' autofocus required>
				<option value="0">Selección:</option>
				
				<?php
				
				if($_SESSION['user']['access_level'] < 3){
					$query = "SELECT * FROM clientes WHERE COMERCIALES_id_comercial = ".$_SESSION['user']['id'];
					//pintar($query, 'no admin');
				}else{
					$query = "SELECT * FROM clientes";
					//pintar($query, 'admin');
				}
				$result = $conn->query($query);

	          	while ($row = mysqli_fetch_array($result)) {
					$id=	$row['id_cliente'];
					$com=	$row['nombre_comercial'];						
	            	echo '<option value="'.$id.'">'.$com.'</option>';
				}
				?>

				</select>
			</div>

			<div class="form-group"> 
			<?php
			$Today = date("Y-m-d");
			echo '<label for="Fecha">Fecha de entrega</label><br>';
			echo '	<input class="form-control" type="date" name="Fecha_entrega" required min="'.$Today.'">';
			?>
			</div>
			<div class="form-group"> 
				<label for="Observaciones">Observaciones</label>	
				<input type="text" class="form-control" id="Observaciones" name="Observaciones" placeholder="Observaciones">
			</div>
		</div>

		<div class="titulo-formulario">
			<h2>Añadir artículos</h2><hr>
		</div>
		<table id="dataTable" class="form table table-sm table-striped table-bordered">
			<thead class="thead-dark">
				<tr>
					<th class="seleccionar">Seleccionar</th>
					<th>Artículo</th>
					<th class="cantidad">Cantidad (kg)</th>
					<th>Observaciones</th>

				</tr>

			</thead>
		 <tbody>
		  <tr>
			<td class="td-checbox">
				<input type="checkbox"  required="required" name="chk[]" checked="checked" />
			</td>
			<td>
				<select  class="form-control" id="select" name='select2[]' autofocus required>
				<option value="0">Selección:</option>

				<?php
				$query = "SELECT * FROM articulo";
				$result = $conn->query($query);

	          	while ($row = mysqli_fetch_array($result)) {
					$id=	$row['id_articulo'];
					$com=	$row['descripcion_art'];						
	            	echo '<option value="'.$id.'">'.$com.'</option>';
	          	}
				?>

				</select>
			</td>
			<td>
			<input type="number" class="form-control"  id="BX_peso" name="BX_peso[]" min="0">
			</td>
			<td>
			<input type="text" class="form-control" name="BX_observaciones[]">
			</td>
		  </tr>
		 </tbody>
		</table>

		<div class="boton-fijado">
			<div class="btn-group ">  
				<button type="button" onClick="javascript:history.back()" class="btn  btn-responsive btn-warning" > Volver</button> 
			</div>
			<div class="btn-group ">
		  		<button type="button" class="btn btn-form-group btn-responsive" id="anadir_articulo" onClick="addRow('dataTable')">Añadir artículo</button> 
			</div>
			<div class="btn-group">  
		  		<button type="button" class="btn btn-form-group btn-responsive" id="Eliminar artículo" onClick="deleteRow('dataTable')">Eliminar artículos</button>
			</div>
			<div class="btn-group">  
		  		<button type="submit" class="btn btn-form-group btn-responsive" id="insert">Finalizar pedido</button> 
			</div>
		</div>

	</form>
</div>


