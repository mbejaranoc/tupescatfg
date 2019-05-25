<?php require 'php/data-base-conexion.php'; ?>


<div class="container generic-form">
	<h2>Artículos</h2>
	<hr>
	<form  action="php/data-base-articulos-modificar.php" method="post"  autocomplete="off">
		
		
		<div class="form-group">
			<label for="id_articulo">ID Artículo</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
		    	echo '<input type="text" class="form-control" name="Id_articulo" required readonly value="'.$id.'">';
		?>
		</div>
		

		<div class="form-group">
			<label for="Descripcion">Descripción</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT descripcion_art FROM articulo WHERE id_articulo=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$descripcion= $row[0];
		    	echo '<input type="text" class="form-control" name="Descripcion" required value="'.$descripcion.'">';
		?>
		</div>

		<div class="form-group">
			<label for="iva_articulo">Iva (%)</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT iva_articulo FROM articulo WHERE id_articulo=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$iva= $row[0];
		    	echo '<input type="text" class="form-control" name="Iva" required value="'.$iva.'">';
		?>
		</div>	

		<div class="form-group">	
			<label for="precio_articulo">Precio (€)</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT precio_articulo FROM articulo WHERE id_articulo=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$precio= $row[0];
			    echo '<input type="text" class="form-control" name="Precio" required value="'.$precio.'">';
		?>
		</div>


		<button type="submit" class="btn btn-info btn-lg btn-responsive submit" id="modificar"> <span class="glyphicon glyphicon-search"></span> Modificar </button>
		<button type="submit" class="btn btn-info btn-lg btn-responsive submit" formaction="php/data-base-articulos-consultar.php" id="volver">Cancelar </button>

	</form>
</div>






