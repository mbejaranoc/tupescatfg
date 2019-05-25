<?php require 'php/data-base-conexion.php'; ?>
<h2>Listado de usuarios</h2>
<hr>
<input class="form-control" id="myInput" type="text" placeholder="Buscar">
<div class="table-responsive">
<hr>
<?php
	//Asignamos la query como una cadena de texto a una variable
	$sql= "SELECT * FROM comerciales ";
		//Realizamos la query de selección sobre la base de datos
		$result = $conn->query($sql);
			//si existen filas devueltas en nuestra query...
			if ($result->num_rows > 0) {
		    // ...sacamos por pantalla cada fila
			    echo "<table class=\"table table-hover table-bordered table-striped\"><thead><tr><th>ID</th><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Telefono</th><th>Movil</th><th>Email</th><th>Opciones</th></tr></thead><tbody id=\"myTable\">";
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo '<tr><td><a href="/bootstrap/index.php?page=modificar_comercial&id='.$row["id_comercial"].'">'.$row["id_comercial"]."</td><td>".$row["dni_comercial"]."</td><td>".$row["nombre_comercial"]."</td><td>".$row["apellidos_comercial"]."</td><td>".$row["direccion_comercial"]."</td><td>".$row["telefono_contacto"]."</td><td>".$row["telefono_movil"]."</td><td>".$row["email"]."</td>";
			        echo '<td><a href="/bootstrap/index.php?page=consultar_comercial&id='.$row["id_comercial"].'"><img class="img-responsive" src="img/lupa.png" height="30px"  width="30px"></a><a href="/bootstrap/index.php?page=modificar_comercial&id='.$row["id_comercial"].'"><img class="img-responsive" src="img/editar.png" height="30px"  width="30px"></a></td></tr>';
			    }
			    echo "</tbody></table>";
			} else {
			    echo "0 results";
			}

?>  
</div>
	<div class="boton-fijado">
		<a href="index.php?page=anadir_comercial">
			<button type="submit" form="form1" class="btn btn-info btn-lg btn-responsive submit" id="search"> <span class="glyphicon glyphicon-search"></span> Añadir usuario</button>
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