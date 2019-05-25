<?php require 'php/data-base-conexion.php'; ?>

<div class="container generic-form">
	<h2>Comercial</h2>
	<hr>
	<form  action="php/data-base-comerciales-modificar.php" method="post"  autocomplete="off">
		
		<div class="form-group">
			<label for="id_comercial">ID Comercial</label>	
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
		    	echo '<input type="text" class="form-control" name="Id_comercial" required readonly value="'.$id.'">';
			?>
		</div>

		<div class="form-group">
			<label for="nombre_comercial">Nombre</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT nombre_comercial FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$nombre_comercial= $row[0];
		    	echo '<input type="text" class="form-control" name="Nombre_comercial" required value="'.$nombre_comercial.'">';
			?>
		</div>

		<div class="form-group">
			<label for="apellido_comercial">Apellido</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT apellidos_comercial FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$apellidos_comercial= $row[0];
		    	echo '<input type="text" class="form-control" name="Apellidos_comercial" required value="'.$apellidos_comercial.'">';
			?>
		</div>

		<div class="form-group">
			<label for="dni_comercial">DNI</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT dni_comercial FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$Dni= $row[0];
		    	echo '<input type="text" class="form-control" name="Dni" required value="'.$Dni.'">';
			?>
		</div>	


		<div class="form-group">
			<label for="direccion_comercial">Dirección</label>
			<?php
		   		$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT direccion_comercial FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$direccion_comercial= $row[0];
		    	echo '<input type="text" class="form-control" name="Direccion_comercial" value="'.$direccion_comercial.'">';
			?>
		</div>

		<div class="form-group">
		<label for="telefono_comercial">Teléfono</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT telefono_contacto FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$telefono_contacto= $row[0];
		    	echo '<input type="tel" class="form-control" name="Telefono" value="'.$telefono_contacto.'">';
			?>
		</div>

		<div class="form-group">
		<label for="movil_comercial">Móvil</label>
		<?php
		    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
			$sql= "SELECT telefono_movil FROM comerciales WHERE id_comercial=$id";
			$result = $conn->query($sql);
			$row=mysqli_fetch_array($result);
		    $telefono_movil= $row[0];
		    echo '<input type="tel" class="form-control" name="Movil" value="'.$telefono_movil.'">';
			?>
		</div>

		<div class="form-group">
		<label for="email">Email</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT email FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$email= $row[0];
		    	echo '<input type="email" class="form-control" name="Email" value="'.$email.'">';
			?>
		</div>

		<div class="form-group">
		<label for="user_name">Nombre usuario</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT User_Name FROM comerciales WHERE id_comercial=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$user_name= $row[0];
		    	echo '<input type="text" class="form-control" name="User_Name" value="'.$user_name.'">';
			?>
		</div>
	

		<button type="submit" class="btn btn-info btn-lg btn-responsive submit" id="modificar"> <span class="glyphicon glyphicon-search"></span> Modificar </button>

		<button type="submit" class="btn btn-info btn-lg btn-responsive submit" formaction="php/data-base-comerciales-consultar.php" id="volver">Cancelar </button>

						
	</form>


</div>