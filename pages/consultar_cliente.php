<?php require 'php/data-base-conexion.php'; ?>


<div class="container generic-form">
	<h2>Cliente</h2>
	<hr>
	<form  action="php/data-base-clientes-consultar.php" method="post"  autocomplete="off">
	<!--
		<div class="form-group">
			<label for="id_cliente">ID Cliente</label>	
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				echo '<input type="text" class="form-control" name="Id_cliente"  disabled value="'.$id.'">';
			?>
		</div>
	-->
		<div class="form-group">
			<label for="nombre_comercial">Nombre</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT nombre_comercial FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$nombre_cliente= $row[0];
			    echo '<input type="text" class="form-control" name="Nombre_comercial" required disabled value="'.$nombre_cliente.'">';
		?>
		</div>

		<div class="form-group">
			<label for="razon_social">Razón Social</label>	
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT razon_social FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$razon_social= $row[0];
		    	echo '<input type="text" class="form-control" name="Razon_social" required disabled value="'.$razon_social.'">';
			?>
		</div>
		
		<div class="form-group">
			<label for="cif_cliente">CIF</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT cif_cliente FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$cif= $row[0];
		    	echo '<input type="text" class="form-control" name="Cif" required disabled value="'.$cif.'">';
			?>
		</div>

		<div class="form-group">
			<label for="direccion_descarga">Dirección de descarga</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT direccion_descarga FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$direccion_descarga= $row[0];
		    	echo '<input type="text" class="form-control" disabled name="Direccion_descarga" value="'.$direccion_descarga.'">';
			?>
		</div>

		<div class="form-group">
			<label for="direccion_fiscal">Dirección fiscal</label>
			<?php
			    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT direccion_fiscal FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$direccion_fiscal= $row[0];
		    	echo '<input type="text" class="form-control" name="Direccion_fiscal" disabled  value="'.$direccion_fiscal.'">';
			?>
		</div>

		<div class="form-group">
			<label for="telefono-contacto">Teléfono</label>
			<?php
			    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT telefono_contacto FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$telefono_contacto= $row[0];
		    	echo '<input type="tel" class="form-control" disabled name="Telefono" value="'.$telefono_contacto.'">';
			?>
		</div>

		<div class="form-group">
			<label for="movil_contacto">Móvil</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT movil_contacto FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$movil_contacto= $row[0];
		    	echo '<input type="tel" class="form-control" disabled name="Movil" value="'.$movil_contacto.'">';
			?>
		</div>

		<div class="form-group">
			<label for="fax_cliente">Fax</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT fax_cliente FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$fax_cliente= $row[0];
		    	echo '<input type="tel" class="form-control" disabled name="Fax" value="'.$fax_cliente.'">';
			?>
		</div>

		<div class="form-group">
			<label for="persona_contacto">Persona de contacto</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT persona_contacto FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$persona_contacto= $row[0];
		    	echo '<input type="text" class="form-control" disabled name="Persona_contacto" value="'.$persona_contacto.'">';
			?>
		</div>

		<div class="form-group">
			<label for="email_cliente">Email</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT email_cliente FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$email= $row[0];
		    	echo '<input type="email" class="form-control" disabled name="Email" value="'.$email.'">';
			?>
		</div>

		<div class="form-group">
			<label for="forma_pago">Forma de pago</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT forma_pago FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$forma_pago= $row[0];
		    	echo '<input type="text" class="form-control" disabled name="Forma_pago" value="'.$forma_pago.'">';
			?>
		</div>

		<div class="form-group">
			<label for="comercial_asociado">Comercial asociado</label>
			<?php
		    	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
				$sql= "SELECT COMERCIALES_id_comercial FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
				$comercial_asociado= $row[0];
				$sql2 = "SELECT nombre_comercial FROM comerciales WHERE id_comercial=$comercial_asociado";
				$result2 = $conn->query($sql2);
				$row2=mysqli_fetch_array($result2);
				$nombre_comercial_asociado= $row2[0];
				echo '<input type="text" class="form-control" disabled name="Forma_pago" value="'.$nombre_comercial_asociado.'">';
				
			?>
		</div>
	


	</form>
	<div class="boton-fijado">
		<div class="btn-group ">  
			<button type="button" onClick="javascript:history.back()" class="btn  btn-responsive btn-warning" >Volver</button> 
		</div>
		<div class="btn-group "> 
			<?php
				echo '<a href="/bootstrap/index.php?page=modificar_cliente&id='.$id.'"><button type="submit" class="btn btn-info btn-responsive submit" id="search">Modificar</button></a>'
			?>
		</div>
	</div>

</div>
<?php

    $id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';

?>




