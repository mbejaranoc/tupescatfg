<?php require 'php/data-base-conexion.php'; ?>


<div class="container generic-form">
<form>
  <h1>Búsqueda por Fecha</h1>
    Fecha comienzo: <br/>
    <input type="date" id="start_date" name="start_date" value="09/01/2015" placeholder="mm/dd/yyyy"> 
    Fecha final:<br/>
    <input type="date" id="end_date" name="end_date" value="10/01/2015" placeholder="mm/dd/yyyy"><br/>
    Fecha:<br/>
    
    <input type="hidden" id="form_sent" name="form_sent" value="true">
    <input type="submit" id="btn_submit" value="Enviar"><br/>
    
</form>


<hr>

<?php if (isset($_GET['form_sent']) && $_GET['form_sent'] == "true") {?>


<?php
    $SDATE = $_GET['start_date'];
    echo('<h3>'.$START_DATE.'</h3>');
    
    $EDATE = $_GET['end_date'];
    echo('<h3>'.$END_DATE.'</h3>');
    
    
    //SELECT * FROM test WHERE course_date BETWEEN '2015-01-09' AND '2015-10-01'
    
  $strsql = "SELECT * FROM pedidos WHERE fecha_entrega BETWEEN '$START_DATE' AND '$END_DATE'";
  $rs = mysql_query($strsql) or die(mysql_error());
  $row = mysql_fetch_assoc($rs);
  $total_rows = mysql_num_rows($rs);
  //print_r($row);
?>


<table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
        <td>Id</td>
        <td>Course</td>
        <td>Date</td>
    </tr>

<?php if ($total_rows > 0) {
        do {
?>
    <tr>
        <td><?php echo($row['id_pedido']); ?></td>
        <td><?php echo($row['fecha_pedido']); ?></td>
        <td><?php echo($row['fecha_entrega']); ?></td>
    </tr>
<?php
        } while ( $row = mysql_fetch_assoc($rs) );
        mysql_free_result($rs);
    } else {
?>
    <tr>
        <td colspan="3">No data found.</td>
    </tr>

<?php } ?>
</table>
<?php } ?>

</div>