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
    <h2>Cobros Pendientes</h2>
    <hr>
        <input class="form-control"  type="text" placeholder="Buscar" id="myInput">
        <div class="table-responsive">
    <hr>

    <div class="container generic-form">
        <form  action="php/data-base-cobrar.php" method="post"  autocomplete="off">
        <?php
            //Asignamos la query como una cadena de texto a una variable
            $sql= "SELECT * FROM pedidos WHERE cobrado = 0";
            //Realizamos la query de selección sobre la base de datos
            $result = $conn->query($sql);
            //si existen filas devueltas en nuestra query...
            if ($result->num_rows > 0) {
            // ...sacamos por pantalla cada fila
                echo '
                <table id="myTable" class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="id">ID</th>
                            <th class="fecha-pedido">Fecha Pedido</th>
                            <th class="fecha-entrega">Fecha Entrega</th>
                            <th class="cobrado">Cobrado</th>
                            <th class="cliente">Cliente</th>
                            <th class="observaciones">Observaciones</th>
                            <th class="cobrar">Cobrar</th>
                        </tr>
                    </thead>
                    <tbody>';
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $originalDate = $row["fecha_entrega"];
                        $newDate = date("d/m/Y", strtotime($originalDate));
                        $id_pedido = $row["id_pedido"];
                        if($row["cobrado"]){$cobrado = 'Sí';}else{$cobrado = 'No';}
                        
                        /*
                        $sql2 = "SELECT nombre_comercial FROM clientes WHERE id_cliente = $row["CLIENTES_id_cliente"]";
                        $result2 = $conn->query($sql2);
                        $row2=mysqli_fetch_array($result2); 
                        $nombre_comercial = $row2[0];


                        NO ENTIENDO POR QUÉ ESTO DE ARRIBA NO FUNCIONA. REVISAR. ES MÁS SENCILLO QUE LO QUE HE HECHO ABAJO
    */


                        $sql2= "SELECT CLIENTES_id_cliente FROM pedidos WHERE id_pedido = $id_pedido";
                        $result2 = $conn->query($sql2);
                        $row2=mysqli_fetch_array($result2);
                        $cliente_asociado = $row2[0];

                        $sql3= "SELECT * FROM clientes WHERE id_cliente = $cliente_asociado";
                        $result3 = $conn->query($sql3);
                        $row3=mysqli_fetch_array($result3);
                        $descripcion_cli = $row3['nombre_comercial'];
                        $id1 = $row3['id_cliente'];


                        echo '<tr>
                            <td><a href="/bootstrap/index.php?page=consultar_pedido&id='.$row["id_pedido"].'">'.$row["id_pedido"].'</td>
                            <td>'.substr($row["fecha_pedido"], 0, 10).'</td>
                            <td>'.$newDate.'</td>
                            <td>'.$cobrado.'</td>
                            <td>'.$descripcion_cli.'</td>
                            <td>'.$row["observaciones"].'</td>
                            <td class="td-checbox">
                                <input type="checkbox"  name="chk[]" />
                            </td>
                        </tr>';
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No hay pedidos pendientes de servir";
                }

        ?>
           
        <div class="boton-fijado">
		    <div class="btn-group ">  
			    <button type="button" onClick="javascript:history.back()" class="btn  btn-responsive btn-warning" >Volver</button> 
		    </div>
		    <div class="btn-group "> 
                <button type="submit" class="btn btn-info btn-responsive submit" id="form-submit-button"> Cobrar </button>
		    </div>
	    </div>
        </form>
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

<?php   
    }