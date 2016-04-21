<?php  
//print_r(json_encode($model));
//die();

$titulo = "Informe detalle";
$url = "http://localhost/spdgm/index.php/api/detalle?subprog=$subprog";
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
		<th>Fecha</th>
		<th>Folio</th>
		<th>Area</th>
		<th>Subprog</th>
		<th>Bandera</th>
		<th>Referencia</th>
		<th>Importe</th>
		<th>Concepto</th>
		<th>Fecha C/R</th>
		<th>Contrarecibo</th>
		<th>Observaciones</th>
		
	</tr>
<?php 

foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			



   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

					echo "<tr>
	 	
	 		
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
	 		

	 	</tr>";

	 			if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
							if (is_array($valor4)){
								foreach ($valor4 as $indice5 => $valor5) {
									//	echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

	$fecha_ingreso = $model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_ingreso'];
	$folio = $model[$indice][$indice2][$indice3][$indice4][$indice5]['folio'];
	$importe =$model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'];
	$area =$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
	$subprog =$model[$indice][$indice2][$indice3][$indice4][$indice5]['subprog'];
	$bandera =$model[$indice][$indice2][$indice3][$indice4][$indice5]['bandera'];
	$concepto =$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
	$fecha_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
	$no_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
	$detalle =$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];
	$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];


	
	

	echo "<tr>
	 	
	 		
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\">$fecha_ingreso</td>
	 		<td  align=\"center\">$folio</td>
	 		<td  align=\"center\">$area</td>
	 		<td  align=\"center\">$subprog</td>
	 		<td  align=\"center\">$bandera</td>
	 		<td  align=\"center\">$proveedor</td>
	 		<td  align=\"center\">$importe</td>
	 		<td  align=\"center\">$concepto</td>
	 		<td  align=\"center\">$fecha_contrarecibo</td>
	 		<td  align=\"center\">$no_contrarecibo</td>
	 		<td  align=\"center\">$detalle</td>
	 		

	 	</tr>";


								}
							}




					

						}

		//$totalpartida =0;
		$totalpartida = number_format($model[$indice][$indice2][$indice3]['totalpartida'],2);
			echo "<tr>
	 	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Total<b></td>
	 		<td  align=\"right\"><b>$totalpartida<b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		</tr>";
					}
				}
			}


   		}
   			echo "<tr>
	 	
	 		
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
	 		

	 	</tr>";
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
<br>
<br>
</div>
