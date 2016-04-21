
<?php  
//print_r(json_encode($model));
//die();
?>
<h4><center><?   /*echo CHtml::link('Generar PDF',array('api/pdfpto',
												'fecha1'=>$fecha1,
												'fecha2'=>$fecha2,
												'id_periodo'=>$id_periodo,
												'id_trim'=>$id_trim


												)); */?></center></h4>



<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span12">
<table class="table table-striped  table-hover">
	<tr>
		<th colspan=2>SIAUWEB</th>
		<th colspan=3>SPDGM</th>
		
	
	</tr>
	<tr>
		
		<th>Folio</th>
		<th>Pagado</th>
		<th>Contrarecibo</th>
		<th>Importe</th>
		<th>Validacion</th>
	
	</tr>
<?php 

foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			//$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			



   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

					/*echo "<tr>
	 	
	 		
	 		<td  align=\"right\">$indice3</td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";*/

	//$codigo = $model[$indice][$indice2][$indice3]['codigo'];
	$folio =  $model[$indice][$indice2][$indice3]['folio'];
	//$fecha =  $model[$indice][$indice2][$indice3]['fecha'];
	$pagado = $model[$indice][$indice2][$indice3]['pagado'];
	$gastos = $model[$indice][$indice2][$indice3]['gastos'];
	$contrarecibo = $model[$indice][$indice2][$indice3]['contrarecibo'];
	$check = $model[$indice][$indice2][$indice3]['check'];


if($check==0){


$imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

  } else {
$imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";
}
 

	echo "<tr>
	 	
	 		
	 	
	 		<td  align=\"center\">$folio</td>
	 		<td  align=\"right\"> $pagado</td>
	 		<td  align=\"center\">$contrarecibo</td>
	 		<td  align=\"center\">$gastos</td>
	 		<td  align=\"center\"><img class=img-responsive tpad src=$imagen></td>
	 		
	 		

	 	</tr>";


						



				}
			}


   		}
   			/*echo "<tr>
	 	
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Suma Total</b></td>
	 		<td  align=\"right\"><b>$sumatotal</b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";*/
   	}

 }
/*foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
		//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					 if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
						$presupuestop = number_format($model[$indice][$indice2][$indice3]['presupuesto'],2);
						$enet = number_format($model[$indice][$indice2][$indice3]['totalene'],2);
						$febt = number_format($model[$indice][$indice2][$indice3]['totalfeb'],2);
						$mart = number_format($model[$indice][$indice2][$indice3]['totalmar'],2);
						$abrt = number_format($model[$indice][$indice2][$indice3]['totalabr'],2);
						$mayt = number_format($model[$indice][$indice2][$indice3]['totalmay'],2);
						$junt = number_format($model[$indice][$indice2][$indice3]['totaljun'],2);
						$jult = number_format($model[$indice][$indice2][$indice3]['totaljul'],2);
						$agot = number_format($model[$indice][$indice2][$indice3]['totalago'],2);
						$sept = number_format($model[$indice][$indice2][$indice3]['totalsep'],2);
						$octt = number_format($model[$indice][$indice2][$indice3]['totaloct'],2);
						$novt = number_format($model[$indice][$indice2][$indice3]['totalnov'],2);
						$dict = number_format($model[$indice][$indice2][$indice3]['totaldic'],2);
						$totalejercido = number_format($model[$indice][$indice2][$indice3]['totalejercido'],2);
						$disponible = number_format($model[$indice][$indice2][$indice3]['disponible'],2);


				if ($enet==0) { $enet =''; }
			  	if ($febt==0) { $febt =''; }
			  	if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	if ($jult==0) { $jult =''; }
			  	if ($agot==0) { $agot =''; }
			  	if ($sept==0) { $sept =''; }
			  	if ($octt==0) { $octt =''; }
			  	if ($novt==0) { $novt =''; }
			  	if ($dict==0) { $dict =''; }
			  	if ($presupuestop==0) { $presupuestop =''; } 
			  	if ($totalejercido==0) { $totalejercido =''; } 
			  	if ($disponible==0) { $disponible =''; }
						}
				}
							echo "<tr>
	 		<td><center>$indice3</center></td>
	 		
	 		<td  align=\"right\">$enet</td>
	 		<td  align=\"right\">$febt</td>
	 		<td  align=\"right\">$mart</td>
	 		<td  align=\"right\">$abrt</td>
	 		<td  align=\"right\">$mayt</td>
	 		<td  align=\"right\">$junt</td>
	 		<td  align=\"right\">$jult</td>
	 		<td  align=\"right\">$agot</td>
	 		<td  align=\"right\">$sept</td>
	 		<td  align=\"right\">$octt</td>
	 		<td  align=\"right\">$novt</td>
	 		<td  align=\"right\">$dict</td>
	 		<td  align=\"right\">$presupuestop</td>
	 		<td  align=\"right\">$totalejercido</td>
	 		<td  align=\"right\">$disponible</td>

	 	</tr>";
				}
			}
	
	 	}
	}

				$enet = number_format($model[$indice]['enet'],2);
				$febt = number_format($model[$indice]['febt'],2);
				$mart = number_format($model[$indice]['mart'],2);
				$abrt = number_format($model[$indice]['abrt'],2);
				$mayt = number_format($model[$indice]['mayt'],2);
				$junt = number_format($model[$indice]['junt'],2);
				$jult = number_format($model[$indice]['jult'],2);
				$agot = number_format($model[$indice]['agot'],2);
				$sept = number_format($model[$indice]['sept'],2);
				$octt = number_format($model[$indice]['octt'],2);
				$novt = number_format($model[$indice]['novt'],2);
				$dict = number_format($model[$indice]['dict'],2);
				$prept = number_format($model[$indice]['presupuestot'],2);
				$ejercidot = number_format($model[$indice]['ejercidot'],2);
				$disponiblet = number_format($model[$indice]['disponiblet'],2);


				if ($enet==0) { $enet =''; }
			  	if ($febt==0) { $febt =''; }
			  	if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	if ($jult==0) { $jult =''; }
			  	if ($agot==0) { $agot =''; }
			  	if ($sept==0) { $sept =''; }
			  	if ($octt==0) { $octt =''; }
			  	if ($novt==0) { $novt =''; }
			  	if ($dict==0) { $dict =''; }
			  	if ($prept==0) { $prept =''; } 
			  	if ($ejercidot==0) { $ejercidot =''; } 
			  	if ($disponiblet==0) { $disponiblet =''; } 
	echo "<tr>
	 		<td  align=\"right\"><b>Total:<b></td>
	 		<td  align=\"right\"><b>$enet<b></td>
	 		<td  align=\"right\"><b>$febt<b></td>
	 		<td  align=\"right\"><b>$mart<b></td>
	 		<td  align=\"right\"><b>$abrt<b></td>
	 		<td  align=\"right\"><b>$mayt<b></td>
	 		<td  align=\"right\"><b>$junt<b></td>
	 		<td  align=\"right\"><b>$jult<b></td>
	 		<td  align=\"right\"><b>$agot<b></td>
	 		<td  align=\"right\"><b>$sept<b></td>
	 		<td  align=\"right\"><b>$octt<b></td>
	 		<td  align=\"right\"><b>$novt<b></td>
	 		<td  align=\"right\"><b>$dict<b></td>
	 		<td  align=\"right\"><b>$prept<b></td>
	 		<td  align=\"right\"><b>$ejercidot<b></td>
	 		<td  align=\"right\"><b>$disponiblet<b></td>

	 	</tr>";
}*/
?>
</table>
<br>
<br>

</div>

