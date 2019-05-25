<?php require 'php/data-base-conexion.php'; 

$acceso = 3;

if($_SESSION['user']['access_level'] < $acceso){
	?>
	<div class="mensaje">No tiene permisos para ver este recurso</div>
	<?php
}else{
	?>
    
    <?php mostrarMensaje(); ?>



<?php	
	$id = isset($_GET['id']) ? $_GET['id'] : 'Not id foud';
?>


<div class="container generic-form">
	<h2>Cliente</h2>
	<hr>
	<form  action="php/data-base-clientes-modificar.php" method="post"  autocomplete="off">



			<?php
				echo '<input type="hidden" class="form-control" name="Id_cliente" required readonly value="'.$id.'">';
			?>


		<div class="form-group">
			<label for="nombre_comercial">Nombre</label>
			<?php

				$sql= "SELECT nombre_comercial FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$nombre_cliente= $row[0];
			    echo '<input type="text" class="form-control" name="Nombre_comercial" required value="'.$nombre_cliente.'">';
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
		    	echo '<input type="text" class="form-control" name="Razon_social" required value="'.$razon_social.'">';
			?>
		</div>
		
		<div class="form-group">
			<label for="cif_cliente">CIF</label>
			<?php
				$sql= "SELECT cif_cliente FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$cif= $row[0];
		    	echo '<input type="text" class="form-control" name="Cif" required value="'.$cif.'">';
			?>
		</div>

		<div class="form-group">
			<label for="direccion_descarga">Dirección de descarga</label>
			<?php
				$sql= "SELECT direccion_descarga FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$direccion_descarga= $row[0];
		    	echo '<input type="text" class="form-control" name="Direccion_descarga" value="'.$direccion_descarga.'">';
			?>
		</div>

		<div class="form-group">
			<label for="direccion_fiscal">Dirección fiscal</label>
			<?php
				$sql= "SELECT direccion_fiscal FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$direccion_fiscal= $row[0];
		    	echo '<input type="text" class="form-control" name="Direccion_fiscal"  value="'.$direccion_fiscal.'">';
			?>
		</div>

		<div class="form-group">
			<label for="telefono-contacto">Teléfono</label>
			<?php
				$sql= "SELECT telefono_contacto FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$telefono_contacto= $row[0];
		    	echo '<input type="tel" class="form-control" name="Telefono" value="'.$telefono_contacto.'">';
			?>
		</div>

		<div class="form-group">
			<label for="movil_contacto">Móvil</label>
			<?php
				$sql= "SELECT movil_contacto FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$movil_contacto= $row[0];
		    	echo '<input type="tel" class="form-control" name="Movil" value="'.$movil_contacto.'">';
			?>
		</div>

		<div class="form-group">
			<label for="fax_cliente">Fax</label>
			<?php
				$sql= "SELECT fax_cliente FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$fax_cliente= $row[0];
		    	echo '<input type="tel" class="form-control" name="Fax" value="'.$fax_cliente.'">';
			?>
		</div>

		<div class="form-group">
			<label for="persona_contacto">Persona de contacto</label>
			<?php
				$sql= "SELECT persona_contacto FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$persona_contacto= $row[0];
		    	echo '<input type="text" class="form-control" name="Persona_contacto" value="'.$persona_contacto.'">';
			?>
		</div>

		<div class="form-group">
			<label for="email_cliente">Email</label>
			<?php
				$sql= "SELECT email_cliente FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$email= $row[0];
		    	echo '<input type="email" class="form-control" name="Email" value="'.$email.'">';
			?>
		</div>

		<div class="form-group">
			<label for="forma_pago">Forma de pago</label>
			<?php
				$sql= "SELECT forma_pago FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$forma_pago= $row[0];
		    	echo '<input type="text" class="form-control" name="Forma_pago" value="'.$forma_pago.'">';
			?>
		</div>

		<div class="form-group">
			<label for="comercial_asociado">Comercial asociado</label>
			<?php
				$sql= "SELECT COMERCIALES_id_comercial FROM clientes WHERE id_cliente=$id";
				$result = $conn->query($sql);
				$row=mysqli_fetch_array($result);
		    	$comercial_asociado= $row[0];

		    	$sql2= "SELECT * FROM comerciales WHERE id_comercial=$comercial_asociado";
		    	$result = $conn->query($sql2);
		    	$row=mysqli_fetch_array($result);
		    	$nombre_comercial= $row['nombre_comercial'];
		    	$id1 = $row['id_comercial'];




		    	echo '<select name="Comercial_asociado" class="form-control" id="select" autofocus>
				<option value="'.$id1.'">'.$nombre_comercial.'</option>';

				$query = "SELECT * FROM comerciales";
				$result = $conn->query($query);
		    	

		          	while ($row = mysqli_fetch_array($result)) {
						$id2=	$row['id_comercial'];
						$com=	$row['nombre_comercial'];	
						$type = $row['User_Type'];
						if 	(($type == "comercial") && ($com!=$nombre_comercial)) {						
            				echo '<option value="'.$id2.'">'.$com.'</option>';	
        				}			
          			}

	          	echo "</select>";
			?>
		</div>
	
		<!--<div class="form-group" id="outer">-->
		<div class="boton-fijado">

			<div class="btn-group ">  
				<button type="button" onClick="javascript:history.back()" class="btn btn-responsive btn-warning" >Volver</button>
			</div>
			<div class="btn-group">  
		  	<button type="submit" class="btn btn-form-group btn-responsive" id="insert">Continuar</button> 
			</div>
		</div>

		<!--</div>-->
	</form>
</div>

<?php
}



