<?php require 'php/data-base-conexion.php'; ?>

<?php mostrarMensaje(); ?>


<div class="container generic-form">
	<h2>Añadir cliente</h2>
    <span class="required_notification">* Datos requeridos</span>
    <hr>
	<form  action="php/data-base-clientes-anadir.php" method="post">
		<div class="contenedor-ronin"> 
			<div class="form-group"> 
				<label for="Nombre_comercial">Nombre comercial</label>
				<input type="text" class="form-control" id="Nombre_comercial" name="Nombre_comercial" placeholder="Nobre comercial" required>
			</div> 
			<div class="form-group"> 
				<label for="Razon_social">Razón social</label>
				<input type="text" class="form-control" id="Razon_social" name="Razon_social" placeholder="Razon social" required>
			</div> 
			<div class="form-group"> 
				<label for="Cif">Cif</label>
				<input type="text" class="form-control" id="Cif" name="Cif" placeholder="Cif" required>
			</div> 
			<div class="form-group"> 
				<label for="Direccion_descarga">Direccion descarga</label>
				<input type="text" class="form-control" id="Direccion_descarga" name="Direccion_descarga" placeholder="Direccion descarga" required>
			</div> 
			<div class="form-group"> 
				<label for="Direccion_fiscal">Direccion fiscal</label>
				<input type="text" class="form-control" id="Direccion_fiscal" name="Direccion_fiscal" placeholder="Direccion_fiscal" required>
			</div> 
			<div class="form-group"> 
				<label for="Telefono">Teléfono</label>
				<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono" required>
			</div> 
			<div class="form-group"> 
				<label for="Movil">Móvil</label>
				<input type="text" class="form-control" id="Movil" name="Movil" placeholder="Movil" required>
			</div> 	
			<div class="form-group"> 
				<label for="Fax">Fax</label>
				<input type="text" class="form-control" id="Fax" name="Fax" placeholder="Fax" >
			</div> 		
			<div class="form-group"> 
				<label for="Email">Email</label>
				<input type="email" class="form-control" id="Email" name="Email" placeholder="name@something.com" required>
			</div> 

			<div class="form-group"> 
				<label for="Persona_contacto">Persona contacto</label>
				<input type="text" class="form-control" id="Persona_contacto" name="Persona_contacto" placeholder="Persona contacto" required>
			</div> 
			<div class="form-group"> 
				<label for="Forma_pago">Forma de pago</label>
				<input type="text" class="form-control" id="Forma_pago" name="Forma_pago" placeholder="Forma de pago" >
			</div>	
			<div class="form-group"> 
				<label for="Comercial_asociado">Comercial asociado</label><br>				

					<select name='Comercial_asociado' class="form-control" name="select" id="select" required >
					<option value="">Seleccionar comercial</option>

						<?php
			
							$query = "SELECT * FROM comerciales";
							$result = $conn->query($query);

	       					while ($row = mysqli_fetch_array($result)) {
								$id=	$row['id_comercial'];
								$com=	$row['nombre_comercial'];
								$type = $row['User_Type'];
								if 	($type == "comercial") {					
	           						echo '<option value="'.$id.'">'.$com.'</option>';									
	       						}
	       					}
						?>

					</select>
			</div>
		</div>

		<div class="boton-fijado">
			<div class="btn-group ">
				<button type="button" onClick="javascript:history.back()" class="btn btn-responsive btn-warning" > Volver</button>
			</div>
			<div class="btn-group ">	
				<button type="submit" class="btn btn-info btn-responsive submit" id="search">  Añadir cliente</button>
			</div>
		</div>



	</form>
</div>
  
