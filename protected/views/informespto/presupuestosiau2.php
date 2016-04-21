<?php

$url = "http://localhost/spdgm/index.php/api/presupuestosiau2?id_periodo=$id_periodo&id_trim=$id_trim&id_partida=$id_partida";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

?>

<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span12">
<table class="table table-striped  table-hover">
	<tr>
		<th>Partida</th>
		<th>Subprog</th>
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
		
						echo "<tr>
	 		<td><center><b>$indice3<b></center></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 	
	
	 		
	 		
	 	</tr>";

 
		
	 if (is_array($valor3)){
				foreach ($valor3 as $indice4 => $valor4) {
					//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
					if (is_array($valor4)){
						foreach ($valor4 as $indice5 => $valor5) {
							//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
					

					$asignado=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['asignado'],2);
					$autorizado=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['autorizado'],2);
					$disponible=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['disponible'],2);
					$cuentasxpagar=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['cuentasxpagar'],2);
					$ejercido=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['ejercido'],2);
					$ingresos_extra=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['ingresos_extra'],2);
					$check=$model[$indice][$indice2][$indice3][$indice4][$indice5]['check'];


		 if($check==0){


$imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

  } else {
$imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";
 }
				
			echo "<tr>
	 		<td  align=\"right\"></td>
	 		
	 		<td  align=\"right\">$indice5</td>
	 		<td  align=\"right\">$asignado</td>
	 		<td  align=\"right\">$autorizado <img class=img-responsive tpad src=$imagen></td>
	 		<td  align=\"right\">$disponible</td>
	 		<td  align=\"right\">$cuentasxpagar</td>
	 		<td  align=\"right\">$ejercido</td>
	 		<td  align=\"right\">$ingresos_extra</td>
	 	
	 		</tr>";

		
	 	}

	 $asignadotp=number_format($model[$indice][$indice2][$indice3]['asignadotp'],2);	
	 $autorizadotp=number_format($model[$indice][$indice2][$indice3]['autorizadotp'],2);
	 $disponibletp=number_format($model[$indice][$indice2][$indice3]['disponibletp'],2);
	 $cuentasxpagartp=number_format($model[$indice][$indice2][$indice3]['cuentasxpagartp'],2);
	 $ejercidotp=number_format($model[$indice][$indice2][$indice3]['ejercidotp'],2);
	 $ingresosextratp=number_format($model[$indice][$indice2][$indice3]['ingresosextratp'],2);

	echo "<tr>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>$asignadotp</b></td>
	 		<td  align=\"right\"><b>$autorizadotp</b></td>
	 		<td  align=\"right\"><b>$disponibletp</b></td>
	 		<td  align=\"right\"><b>$cuentasxpagartp</b></td>
	 		<td  align=\"right\"><b>$ejercidotp</b></td>
	 		<td  align=\"right\"><b>$ingresosextratp</b></td>
	 	
	 		</tr>";




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
	 		<td  align=\"center\"><b><b></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$asignadot</div></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$autorizadot</div></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$disponiblet</div></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$cuentasxpagart</div></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$ejercidot</div></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$ingresosextrat</div></td>
	 		
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

