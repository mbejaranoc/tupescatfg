<?php 
	require 'php/data-base-conexion.php'; 
	$acceso = 3;
	if($_SESSION['user']['access_level'] < $acceso){
?>
	<div class="mensaje">No tiene permisos para ver este recurso</div>
<?php
	}else{
?>
	<?php mostrarMensaje(); ?>
	<div class="container generic-form">
		<h2>Añadir usuario</h2>
	    <span class="required_notification">* Datos requeridos</span>
	    <hr>
		<form  action="php/data-base-comerciales-anadir.php" method="post"  autocomplete="off" id="form1">
			<div class="form-group"> 
				<label for="Nombre">Nombre</label>
				<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" required>
			</div> 
			<div class="form-group"> 
				<label for="Apellidos">Apellidos</label>
				<input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos" required>
			</div> 
			<div class="form-group"> 
				<label for="Dni">DNI</label>
				<input type="text" class="form-control" id="Dni" name="Dni" placeholder="Dni" required>
			</div> 
			<div class="form-group"> 
				<label for="Direccion">Dirección</label>
				<input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion" required>
			</div> 
			<div class="form-group"> 
				<label for="Telefono">Telefono</label>
				<input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono" required>
			</div> 
			<div class="form-group"> 
				<label for="Movil">Movil</label>
				<input type="text" class="form-control" id="Movil" name="Movil" placeholder="Movil" required>
			</div> 	

			<div class="form-group"> 
				<label for="Email">Email</label>
				<input type="email" class="form-control" id="Email" name="Email" placeholder="name@something.com" required>
			</div> 
			<div class="form-group"> 
				<label for="User_Name">Nombre de usuario</label>
				<input type="text" class="form-control" id="User_Name" name="User_Name" placeholder="Nombre de usuario" required maxlength="32">
			</div> 
			<div class="form-group"> 
				<label for="Password">Contraseña</label>
				<input type="text" class="form-control" id="Password" name="Password" placeholder="Contraseña" required maxlength="8">
			</div> 
			<div class="form-group user-types">
	                <label>Tipo Usuario</label>
	                <div class="radio">
	                    <label for="comercial" class="radio-inline">Comercial</label>
	                        <input type="radio" name="Tipo" id="comercial" value="comercial">
	                    <label for="administrador" class="radio-inline">Administrador</label>
	                        <input type="radio" name="Tipo" id="administrador" value="administrador">
	                    <label for="invitado" class="radio-inline">Invitado</label>
	                        <input type="radio" name="Tipo" id="invitado" value="invitado">
	                </div>
	        </div>

			

		</form>
		<div class="boton-fijado">
			<button type="submit" form="form1" class="btn btn-info btn-lg btn-responsive submit" id="search"> <span class="glyphicon glyphicon-search"></span> Añadir usuario</button>
		</div>
	</div>
	<?php
}
