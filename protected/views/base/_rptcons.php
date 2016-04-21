 <div class="span6">
       <a href="<?php echo CController::createUrl('base/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
</div>
<div class="span12">

<br>
<br>
<br>
<h4><center><?=$titulo?></center></h4>
<hr>
</div>
<div id="datos" >
<table class="table table-striped table-hover">
	<tr>
		<th>folio </th>
		<th>Importe Bruto</th>
		<th>Iva</th>
		<th>Subtotal</th>
		<th>Ret. IVA</th>
		<th>Ret. ISR</th>
		<th>Importe Neto </th>
		<th>Importe registrado en gasto</th>
		<th>Diferencia</th>
		<th></th>
	</tr>

<?php

foreach ($model as $key => $row) {

	$valida = $row->importe - $row->subtotal;

	if ($valida ==0 ){
	$imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

  } else {
$imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";
 }	
$validast =$row->importe_bruto + $row->iva;

	

 	echo "<tr>";
	echo "<td  aling=\"right\"style=\"width:60px\">".$row->folio."</td>";
	echo "<td aling=\"right\">".$row->importe_bruto."</td>";
	echo "<td aling=\"right\">".$row->iva."</td>";
	echo "<td aling=\"right\">".$row->subtotal."<img src=$imagen></td>";
	echo "<td aling=\"right\">".$row->iva_ret."</td>";
	echo "<td aling=\"right\">".$row->isr_ret."</td>";
	echo "<td aling=\"right\">".$row->importe_neto."</td>";
	echo "<td aling=\"right\">".$row->importe."</td>";
	echo "<td>".$valida."</td>";
	echo "<td><img src=$imagen></td>";
	echo "</tr>";

}

?>

</table>

</div>

<br>
<br>
<br>
<br>

<img src="" alt="">