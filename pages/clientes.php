<?php require 'php/data-base-conexion.php'; ?>

<h2>Listado de clientes</h2>
<hr>
<input class="form-control"  type="text" placeholder="Buscar" id="myInput">
<div class="table-responsive">
<hr>

<?php 

	//Asignamos la query como una cadena de texto a una variable
	$sql= "SELECT * FROM clientes ";
		//Realizamos la query de selección sobre la base de datos
		$result = $conn->query($sql);
			//si existen filas devueltas en nuestra query...
			if ($result->num_rows > 0) {
		    // ...sacamos por pantalla cada fila
					echo "
					<table class=\"table table-hover table-bordered table-striped\">
						<thead>
							<tr>
								<th>ID</th>
								<th>CIF</th>
								<th>Nombre Comercial</th>
								<th>Razón Social</th>
								<th>Dirección Descarga</th>
								<th>Comercial asociado</th>
								<th>Creado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody id=\"myTable\">";
			    	// output data of each row
			   	 while($row = $result->fetch_assoc()) {

						$id_cliente = $row["id_cliente"];
							
							$sql2= "SELECT COMERCIALES_id_comercial FROM clientes WHERE id_cliente = $id_cliente";
							$result2 = $conn->query($sql2);
							$row2=mysqli_fetch_array($result2);
							$comercial_asociado = $row2[0];
	
							$sql3= "SELECT * FROM comerciales WHERE id_comercial = $comercial_asociado";
							$result3 = $conn->query($sql3);
							$row3=mysqli_fetch_array($result3);
							$descripcion_comercial = $row3['nombre_comercial'];

	

							echo '
							<tr>
								<td><a href="/bootstrap/index.php?page=consultar_cliente&id='.$row["id_cliente"].'">'.$row["id_cliente"]."</td>
								<td>".$row["cif_cliente"]."</td>
								<td>".$row["nombre_comercial"]."</td>
								<td>".$row["razon_social"]."</td>
								<td>".$row["direccion_descarga"]."</td>
								<td>".$descripcion_comercial."</td>
								<td>".substr($row["fecha_creacion"],0,10)."</td>";
							echo '
								<td>
									<a href="/bootstrap/index.php?page=consultar_cliente&id='.$row["id_cliente"].'">
									<img class="img-responsive" src="img/lupa.png" height="30px"  width="30px"></a>
									<a href="/bootstrap/index.php?page=modificar_cliente&id='.$row["id_cliente"].'">
									<img class="img-responsive" src="img/editar.png" height="30px"  width="30px"></a>
								</td>
							</tr>';
			    }
			    echo "</tbody></table>";
			} else {
			    echo "0 results";
			}

?>  
</div>
		<div class="boton-fijado">

			<button type="button" onClick="javascript:history.back()" class="btn btn-responsive btn-warning" > Volver</button>
			<a href="index.php?page=anadir_cliente">	<button type="submit" class="btn btn-info btn-responsive submit" id="search">  Añadir cliente</button>
			</a>
		</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>