<?php 
require 'php/data-base-conexion.php'; 

?>
<?php mostrarMensaje(); ?>




<div class="container generic-form">
	<h2>Añadir artículo</h2>
    <span class="required_notification">* Datos requeridos</span>
    <hr>
	<form  action="php/data-base-articulos-anadir.php" method="post"  autocomplete="off">
		<div class="form-group"> 
			<label for="Descripcion">Descripción</label>
			<input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" required>
		</div> 

		<div class="form-group"> 
			<label for="Precio">Precio (€)</label>
			<input type="text" class="form-control" id="Precio" name="Precio" placeholder="Precio" required>
		</div> 	

		<div class="form-group"> 
			<label for="Iva">Iva (%)</label>
			<input type="text" class="form-control" id="Iva" name="Iva" placeholder="Iva" required>
		</div> 

		
		<div class="boton-fijado">
			<div class="btn-group ">
				<button type="button" onClick="javascript:history.back()" class="btn btn-responsive btn-warning" >Volver</button>
			</div>
			<div class="btn-group ">	
				<button type="submit" class="btn btn-info btn-responsive submit" id="search">Añadir artículo</button>
			</div>
		</div>

	</form>
</div>


