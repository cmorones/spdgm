<?php
if ($tipo==0) {
	$conciliado = "No conciliados";
		 $sql = "SELECT  fecha_ingreso, folio, no_contrarecibo, importe, validado FROM 
  		     base_ing where validado=$tipo and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2') order by fecha_ingreso";
}elseif ($tipo==1 or $tipo==null) {
	$conciliado = "Conciliados";
		 $sql = "SELECT  fecha_ingreso, folio, no_contrarecibo, importe, validado FROM 
  		     base_ing where validado=$tipo and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2') order by fecha_ingreso";
}elseif ($tipo==-1) {
	$conciliado = "";
		 $sql = "SELECT  fecha_ingreso, folio, no_contrarecibo, importe, validado FROM 
  		     base_ing where (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2') order by fecha_ingreso";
}
	



	$cmd2 = Yii::app()->db->createCommand($sql);
//$cmd->getText();

	$resulAreaPres = $cmd2->query();

	
echo "
<div class='span3'>
</div>
<div class='span9'>
<h3 aling='center'>Reporte  ingresos $conciliado del $fecha1 al $fecha2 </h3><br>

</div>
<div class='span12'>

<table class='table table-striped table-hover'>
	<tr>
		<th>Num</th>
		<th>Fecha</th>
		<th>Folio</th>
		<th>Recibo</th>
		<th>Importe</th>
		<th>Status</th>
	
	</tr>
		"; 
$num=1;
$imagen ="";
foreach ($resulAreaPres as $row) {

if ($row['validado']==0) {
	$imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";
}elseif ($row['validado']==1) {
	$imagen = Yii::app()->request->baseUrl ."/images/correcto.png";
}


      echo "<tr>
        <td align='center'>$num</td>
		<td align='center'>$row[fecha_ingreso]</td>
		<td align='center'>$row[folio]</td>
		<td align='center'>$row[no_contrarecibo]</td>
		<td align='center'>$row[importe]</td>
		<td align='center'><img src=$imagen></td>
	
	</tr>";
	$num++;
	}



echo "</table>";


		?>