<?php require 'php/data-base-conexion.php'; ?>

<h2>Listado de artículos</h2>
<hr>
<input class="form-control" id="myInput" type="text" placeholder="Buscar">
<div class="table-responsive">
<hr>

<?php
	//Asignamos la query como una cadena de texto a una variable
	$sql= "SELECT * FROM articulo ";
		//Realizamos la query de selección sobre la base de datos
		$result = $conn->query($sql);
			//si existen filas devueltas en nuestra query...
			if ($result->num_rows > 0) {
		    // ...sacamos por pantalla cada fila
			    echo "<table class=\"table table-hover table-bordered table-striped\"><thead><tr><th>CÓDIGO</th><th>DESCRIPCIÓN</th><th>IVA (%)</th><th>PRECIO (€/kg)</th><th>Opciones</th></tr></thead><tbody id=\"myTable\">";
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo '<tr><td><a href="/bootstrap/index.php?page=consultar_articulo&id='.$row["id_articulo"].'">'.$row["id_articulo"]."</td><td>".$row["descripcion_art"]."</td><td>".$row["iva_articulo"]."</td><td>".$row["precio_articulo"]."</td>";
			        echo '<td><a href="/bootstrap/index.php?page=consultar_articulo&id='.$row["id_articulo"].'"><img class="img-responsive" src="img/lupa.png" height="30px"  width="30px"></a><a href="/bootstrap/index.php?page=modificar_articulo&id='.$row["id_articulo"].'"><img class="img-responsive" src="img/editar.png" height="30px"  width="30px"></a></td></tr>';
			    }
			    echo "</tbody></table>";
			} else {
			    echo "0 results";
			}

?>  
</div>
</div>
		<div class="boton-fijado">

			<button type="button" onClick="javascript:history.back()" class="btn btn-responsive btn-warning" > Volver</button>
			<a href="index.php?page=anadir_articulo">	<button type="submit" class="btn btn-info btn-responsive submit" id="search">  Añadir artículo</button>
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
