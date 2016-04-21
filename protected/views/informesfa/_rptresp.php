
<?php  
//print_r(json_encode($model));
//die();
if(array_key_exists('informe',$model)){
?>


<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span12">
<table class="table table-striped table-hover">
	<tr>
		<th>Partida</th>
		<th>Ene</th>
		<th>Feb</th>
		<th>Mar</th>
		<th>Abr</th>
		<th>May</th>
		<th>Jun</th>
		<th>Jul</th>
		<th>Ago</th>
		<th>Sep</th>
		<th>Oct</th>
		<th>Nov</th>
		<th>Dic</th>
		<th>Presupuesto</th>
		<th>Ejercido</th>
		<th>Disponible</th>
		
<?php 
foreach ($model as $indice => $valor) {

   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			if (is_array($valor2)){
   				
				foreach ($valor2 as $indice3 => $valor3) {


					

			$enet = number_format($model[$indice][$indice2][$indice3]['ene'],2);
			$febt = number_format($model[$indice][$indice2][$indice3]['feb'],2);
			$mart = number_format($model[$indice][$indice2][$indice3]['mar'],2);
			$abrt = number_format($model[$indice][$indice2][$indice3]['abr'],2);
			$mayt = number_format($model[$indice][$indice2][$indice3]['may'],2);
			$junt = number_format($model[$indice][$indice2][$indice3]['jun'],2);
			$jult = number_format($model[$indice][$indice2][$indice3]['jul'],2);
			$agot = number_format($model[$indice][$indice2][$indice3]['ago'],2);
			$sept = number_format($model[$indice][$indice2][$indice3]['sep'],2);
			$octt = number_format($model[$indice][$indice2][$indice3]['oct'],2);
			$novt = number_format($model[$indice][$indice2][$indice3]['nov'],2);
			$dict = number_format($model[$indice][$indice2][$indice3]['dic'],2);

			$presupuesto = number_format($model[$indice][$indice2][$indice3]['presupuesto'],2);
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
	 		<td  align=\"right\">$presupuesto</td>
	 		<td  align=\"right\">$totalejercido</td>
	 		<td  align=\"right\">$disponible</td>
	 	</tr>";

	 
					
				}
			}
   		}
   	}
}

$enef = number_format($model[$indice]['enet'],2);
$febf = number_format($model[$indice]['febt'],2);
$marf = number_format($model[$indice]['mart'],2);
$abrf = number_format($model[$indice]['abrt'],2);
$mayf = number_format($model[$indice]['mayt'],2);
$junf = number_format($model[$indice]['junt'],2);
$julf = number_format($model[$indice]['jult'],2);
$agof = number_format($model[$indice]['agot'],2);
$sepf = number_format($model[$indice]['sept'],2);
$octf = number_format($model[$indice]['octt'],2);
$novf = number_format($model[$indice]['novt'],2);
$dicf = number_format($model[$indice]['dict'],2);

$presupuestot = number_format($model[$indice]['presupuestot'],2);
$ejercidot = number_format($model[$indice]['ejercidot'],2);
$disponiblet = number_format($model[$indice]['disponiblet'],2);



				if ($enef==0) { $enef =''; }
			  	if ($febf==0) { $febf =''; }
			  	if ($marf==0) { $marf =''; }
			  	if ($abrf==0) { $abrf =''; }
			  	if ($mayf==0) { $mayf =''; }
			  	if ($junf==0) { $junf =''; }
			  	if ($julf==0) { $julf =''; }
			  	if ($agof==0) { $agof =''; }
			  	if ($sepf==0) { $sepf =''; }
			  	if ($octf==0) { $octf =''; }
			  	if ($novf==0) { $novf =''; }
			  	if ($dicf==0) { $dicf =''; }

	echo "<tr>
			
	 		<td  align=\"right\"><b>Total:<b></td>
	 		<td  align=\"right\"><b>$enef<b></td>
	 		<td  align=\"right\"><b>$febf<b></td>
	 		<td  align=\"right\"><b>$marf<b></td>
	 		<td  align=\"right\"><b>$abrf<b></td>
	 		<td  align=\"right\"><b>$mayf<b></td>
	 		<td  align=\"right\"><b>$junf<b></td>
	 		<td  align=\"right\"><b>$julf<b></td>
	 		<td  align=\"right\"><b>$agof<b></td>
	 		<td  align=\"right\"><b>$sepf<b></td>
	 		<td  align=\"right\"><b>$octf<b></td>
	 		<td  align=\"right\"><b>$novf<b></td>
	 		<td  align=\"right\"><b>$dicf<b></td>
	 		<td  align=\"right\"><b>$presupuestot<b></td>
	 		<td  align=\"right\"><b>$ejercidot<b></td>
	 		<td  align=\"right\"><b>$disponiblet<b></td>

	 	</tr>";
/*

$presupuestof = number_format($model[$indice]['presupuestot'],2);
$ejercidof = number_format($model[$indice]['ejercidot'],2);
$disponiblef = number_format($model[$indice]['disponiblet'],2);



			echo "<tr>
			<td  align=\"right\"><b>Total:<b></td>
	 		<td  align=\"right\"><b>$enef</b></td>
	 		<td  align=\"right\"><b>$febf</b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b><b></td>
	 		<td  align=\"right\"><b>$presupuestof<b></td>
	 		<td  align=\"right\"><b>$ejercidof<b></td>
	 		<td  align=\"right\"><b>$disponiblef <b></td>

	 	</tr>";

*/

   /*	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
		//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo "<hr>";
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
				//			echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
							if (is_array($valor4)){
								foreach ($valor4 as $indice5 => $valor5) {
				//					echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
						$presupuestop = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['presupuesto'],2);
						$enet = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalene'],2);
						$febt = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalfeb'],2);
						$mart = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalmar'],2);
						$abrt = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalabr'],2);
						$mayt = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalmay'],2);
						$junt = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totaljun'],2);
						$jult = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totaljul'],2);
						$agot = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalago'],2);
						$sept = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalsep'],2);
						$octt = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totaloct'],2);
						$novt = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalnov'],2);
						$dict = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totaldic'],2);
						$totalejercido = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['totalejercido'],2);
						$disponible = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['disponible'],2);


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
			  	/*if ($presupuestop==0) { $presupuestop =''; } 
			  	if ($totalejercido==0) { $totalejercido =''; } 
			  	if ($disponible==0) { $disponible =''; }*/

			  								/*echo "<tr>
	 		<td><center>$indice3</center></td>
	 		<td><center>$indice5</center></td>	 		
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
				}
			}		
		} 






		/*   			if (is_array($valor2)){
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
	
	 	}*/
	/*}

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
			<td  align=\"right\"></td>
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

<?php
} else {
?>
</div>

</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>No existe información para mostrar
</div>
<?php
}

?>

