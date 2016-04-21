<?php

$url = "http://localhost/spdgm/index.php/api/presupuestosiau";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

?>

<h4><center>Presupuesto SIAUWEB 1er Semestre 2014</center></h4>
<hr>
<div class="span12">
<table class="table table-striped  table-hover">
	<tr>
		<th>Partida</th>
		<th>Asignado</th>
		<th>Autorizado</th>
		<th>Disponible</th>
		<th>Cta. Por Pagar</th>
		<th>Ejercido</th>
		<th>Ingresos Extra</th>
		
	<tr>
<?php 
foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
	//	echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
		if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					$asignado=number_format($model[$indice][$indice2][$indice3]['asignado'],2);
					$autorizado=number_format($model[$indice][$indice2][$indice3]['autorizado'],2);
					$check=$model[$indice][$indice2][$indice3]['check'];

  if($check==0){


$imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

  } else {
$imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";
 }





					$disponible=number_format($model[$indice][$indice2][$indice3]['disponible'],2);
					$cuentasxpagar=number_format($model[$indice][$indice2][$indice3]['cuentasxpagar'],2);
					$ejercido=number_format($model[$indice][$indice2][$indice3]['ejercido'],2);
					$ingresos_extra=number_format($model[$indice][$indice2][$indice3]['ingresos_extra'],2);

								echo "<tr>
	 		<td><center><b>$indice3<b></center></td>
	 		<td  align=\"right\">$asignado</td>
	 		<td  align=\"right\">$autorizado <img class=img-responsive tpad src=$imagen></td>
	 		<td  align=\"right\">$disponible</td>
	 		<td  align=\"right\">$cuentasxpagar</td>
	 		<td  align=\"right\">$ejercido</td>
	 		<td  align=\"right\">$ingresos_extra</td>
	 		
	 		
	 	</tr>";
	 
	 	if (is_array($valor3)){
				foreach ($valor3 as $indice4 => $valor4) {
					//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
					if (is_array($valor4)){
						foreach ($valor4 as $indice5 => $valor5) {
							//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
					

				/*	$codigo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['codigo'];
					$clave=$model[$indice][$indice2][$indice3][$indice4][$indice5]['clave'];
					$programa=$model[$indice][$indice2][$indice3][$indice4][$indice5]['programa'];
					$presupuestosubprog=$model[$indice][$indice2][$indice3][$indice4][$indice5]['presupuestosubprog'];
		/*$subprog=$model[$indice][$indice2][$indice3][$indice4][$indice5]['subprog'];
		$area=$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
		$proveedor=$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
		$importe=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'],2);
		$concepto=$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
		$partida=$model[$indice][$indice2][$indice3][$indice4][$indice5]['partida'];
		$fecha_contrarecibo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
		$no_contrarecibo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
		$detalle=$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];*/
		/*	echo "<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\">$codigo</td>
	 		<td  align=\"center\">$clave</td>
	 		<td  align=\"center\">$programa</td>
	 		<td  align=\"center\">$presupuestosubprog</td>
	 	
	 		</tr>";*/

		
	 	}
	 }





				}
		}

/*$importef=number_format($valor4,2);*/
			



				}
		}


	}
}
$asignadot=number_format($model[$indice]['asignadot'],2);
$autorizadot=number_format($model[$indice]['autorizadot'],2);
$disponiblet=number_format($model[$indice]['disponiblet'],2);
$cuentasxpagart=number_format($model[$indice]['cuentasxpagart'],2);
$ejercidot=number_format($model[$indice]['ejercidot'],2);
$ingresosextrat=number_format($model[$indice]['ingresosextrat'],2);
 echo "<tr>
	 		<td  align=\"center\"><b><b></td>
	 		<td  align=\"right\"><b>$asignadot<b></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$autorizadot</div></td>
	 		<td  align=\"right\"><b>$disponiblet<b></td>
	 		<td  align=\"right\"><b>$cuentasxpagart<b></td>
	 		<td  align=\"right\"><b>$ejercidot<b></td>
	 		<td  align=\"right\"><b>$ingresosextrat<b></td>
	 		
	 		</tr>";

		/*	 echo "<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		
	 		<td  align=\"right\"><b>Suma Total:<b></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$importefinal</div></td>
	 		
	 		
	 		</tr>";*/
		}

   	
?>
</table>
<br>
<br>
<br>
<bR>
</div>

