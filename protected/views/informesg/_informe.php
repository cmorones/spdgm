<h1>Informe</h1>
<hr>
<div class="span10">
<table class="table table-hover table-striped table-bordered table-condensed">
	<tr>
		<th>Area</th>
		<th>Partida</th>
		<th>Subprog</th>
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
	</tr>

<?php  
//print_r(json_encode($model));
$prept=0; 

foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
		//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
			echo "<tr>
	 		<td><center>$indice2</center></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>

	 	</tr>";
		if (is_array($valor2)){
			foreach ($valor2 as $indice3 => $valor3) {
			 // echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
			  if (is_array($valor3)){
			  	ksort($valor3);
			  	  foreach ($valor3 as $indice4 => $valor4) {
			  		//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");

			  			if (is_array($valor4)){
			  				
			  				foreach ($valor4 as $indice5 => $valor5) {
			  					//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
			  					if (is_array($valor5)){
			  						foreach ($valor5 as $indice6 => $valor6) {
			  						//echo ("El indice6 $indice6 tiene el valor: $valor6<br>");


			  							if (is_array($valor6)){
			  								foreach ($valor6 as $indice7 => $valor7) {
			  									//echo ("El indice7 $indice7 tiene el valor: $valor7<br>");
			  								
			  								}
			  							}

			  						$ene = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalene'],2);
			  						$feb = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalfeb'],2);
			  						$mar = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalmar'],2);
			  						$abr = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalabr'],2);
			  						$may = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalmay'],2);
			  						$jun = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totaljun'],2);
			  						$jul = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totaljul'],2);
			  						$ago = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalago'],2);
			  						$sep = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalsep'],2);
			  						$oct = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totaloct'],2);
			  						$nov = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalnov'],2);
			  						$dic = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totaldic'],2);
			  						$presupuesto =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['presupuesto'],2);
			  						$totalejercido = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['totalejercido'],2);
			  						$disponible = number_format($model[$indice][$indice2][$indice3][$indice4][$indice5][$indice6]['disponible'],2);

			  						if ($ene==0) { $ene =''; }
			  						if ($feb==0) { $feb =''; }
			  						if ($mar==0) { $mar =''; }
			  						if ($abr==0) { $abr =''; }
			  						if ($may==0) { $may =''; }
			  						if ($jun==0) { $jun =''; }
			  						if ($jul==0) { $jul =''; }
			  						if ($ago==0) { $ago =''; }
			  						if ($sep==0) { $sep =''; }
			  						if ($oct==0) { $oct =''; }
			  						if ($nov==0) { $nov =''; }
			  						if ($dic==0) { $dic =''; }
			  						if ($presupuesto==0) { $presupuesto =''; } 
			  						if ($totalejercido==0) { $totalejercido =''; } 
			  						if ($disponible==0) { $disponible =''; }  

			  						if ($ene<0) { $ene ="<p class=\"text-error\">$ene</p>"; }
			  						if ($feb<0) { $feb ="<p class=\"text-error\">$feb</p>"; }
			  						if ($mar<0) { $mar ="<p class=\"text-error\">$mar</p>"; }
			  						if ($abr<0) { $abr ="<p class=\"text-error\">$abr</p>"; }
			  						if ($may<0) { $may ="<p class=\"text-error\">$may</p>"; }
			  						if ($jun<0) { $jun ="<p class=\"text-error\">$jun</p>"; }
			  						if ($jul<0) { $jul ="<p class=\"text-error\">$jul</p>"; }
			  						if ($ago<0) { $ago ="<p class=\"text-error\">$ago</p>"; }
			  						if ($sep<0) { $sep ="<p class=\"text-error\">$sep</p>"; }
			  						if ($oct<0) { $oct ="<p class=\"text-error\">$oct</p>"; }
			  						if ($nov<0) { $nov ="<p class=\"text-error\">$nov</p>"; }
			  						if ($dic<0) { $dic ="<p class=\"text-error\">$dic</p>"; }
			  						if ($presupuesto<0) { $presupuesto ="<p class=\"text-error\">$presupuesto</p>"; }
			  						if ($totalejercido<0) { $totalejercido ="<p class=\"text-error\">$totalejercido</p>"; }
			  						if ($disponible<0) { $disponible ="<p class=\"text-error\">$disponible</p>"; }



			  								echo "<tr>
	 													<td></td>
	 													<td>$indice4</td>
	 													<td>$indice6</td>
	 													<td>$ene</td>
	 													<td>$feb</td>
	 													<td>$mar</td>
	 													<td>$abr</td>
	 													<td>$may</td>
	 													<td>$jun</td>
	 													<td>$jul</td>
	 													<td>$ago</td>
	 													<td>$sep</td>
	 													<td>$oct</td>
	 													<td>$nov</td>
	 													<td>$dic</td>
	 													<td>$presupuesto</td>
	 													<td>$totalejercido</td>
	 													<td>$disponible</td>

	 												</tr>";
			  						}
			  					}
			  				}
			  			}
	  		
			  		}

			  }

			  	$enet = number_format($model[$indice][$indice2]['enet'],2);
				$febt = number_format($model[$indice][$indice2]['febt'],2);
				$mart = number_format($model[$indice][$indice2]['mart'],2);
				$abrt = number_format($model[$indice][$indice2]['abrt'],2);
				$mayt = number_format($model[$indice][$indice2]['mayt'],2);
				$junt = number_format($model[$indice][$indice2]['junt'],2);
				$jult = number_format($model[$indice][$indice2]['jult'],2);
				$agot = number_format($model[$indice][$indice2]['agot'],2);
				$sept = number_format($model[$indice][$indice2]['sept'],2);
				$octt = number_format($model[$indice][$indice2]['octt'],2);
				$novt = number_format($model[$indice][$indice2]['novt'],2);
				$dict = number_format($model[$indice][$indice2]['dict'],2);
				$prept = number_format($model[$indice][$indice2]['presupuestot'],2);
				$ejercidot = number_format($model[$indice][$indice2]['ejercidot'],2);
				$disponiblet = number_format($model[$indice][$indice2]['disponiblet'],2);


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

			}

		} 

	
		}
    }
}

	echo "<tr>
	 		<td>Totales:</td>
	 		<td></td>
	 		<td></td>
	 		<td>$enet</td>
	 		<td>$febt</td>
	 		<td>$mart</td>
	 		<td>$abrt</td>
	 		<td>$mayt</td>
	 		<td>$junt</td>
	 		<td>$jult</td>
	 		<td>$agot</td>
	 		<td>$sept</td>
	 		<td>$octt</td>
	 		<td>$novt</td>
	 		<td>$dict</td>
	 		<td>$prept</td>
	 		<td>$ejercidot</td>
	 		<td>$disponiblet</td>

	 	</tr>";

/*	
			foreach ($model[$indice][$indice2] as $indice3 => $valor3) {
				echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					foreach ($model[$indice][$indice2][$indice3] as $indice4 => $valor4) {
						echo ("El indice $indice4 tiene el valor: $valor4<br>");
				



				}
				

				$enet = number_format($model[$indice][$indice2]['enet']);
				$febt = number_format($model[$indice][$indice2]['febt']);
				$mart = number_format($model[$indice][$indice2]['mart']);
				$abrt = number_format($model[$indice][$indice2]['abrt']);
				$mayt = number_format($model[$indice][$indice2]['mayt']);
				$junt = number_format($model[$indice][$indice2]['junt']);
				$jult = number_format($model[$indice][$indice2]['jult']);
				$agot = number_format($model[$indice][$indice2]['agot']);
				$sept = number_format($model[$indice][$indice2]['sept']);
				$octt = number_format($model[$indice][$indice2]['octt']);
				$novt = number_format($model[$indice][$indice2]['novt']);
				$dict = number_format($model[$indice][$indice2]['dict']);
				$prept = number_format($model[$indice][$indice2]['presupuestot']);
				$ejercidot = number_format($model[$indice][$indice2]['ejercidot']);
				$disponiblet = number_format($model[$indice][$indice2]['disponiblet']);

				/*foreach ($model[$indice][$indice2][$indice3] as $indice4 => $valor4) {
				echo ("El indice $indice4 tiene el valor: $valor4<br>");
				}*/

	//		}
	 	//sort($model[$indice]);
   	/*	foreach ($model[$indice] as $indice2 => $valor2) {
  			// echo ("El indice $indice2 tiene el valor: $valor2<br>");
   			//sort($indice2);
  			echo "<tr>
	 		<td></td>
	 		<td><center></center></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>

	 	</tr>";

	 	$disponiblet = $indice2[disponiblet];

  		/*	       foreach ($model[$indice][$indice2] as $indice3 => $valor3) {
  			 echo ("El indice $indice3 tiene el valor: $valor3<br>");
		}*/
	//	}*/

/*		echo "<tr>
	 		<td><center>$indice2</center></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>
	 		<td></td>

	 	</tr>";
	 	//$prept = $indice2['presupuestot'];//$indice[disponiblet];
}

		echo "<tr>
	 		<td>Total:</td>
	 		<td></td>
	 		<td></td>
	 		<td>$enet</td>
	 		<td>$febt</td>
	 		<td>$mart</td>
	 		<td>$abrt</td>
	 		<td>$mayt</td>
	 		<td>$junt</td>
	 		<td>$jult</td>
	 		<td>$agot</td>
	 		<td>$sept</td>
	 		<td>$octt</td>
	 		<td>$novt</td>
	 		<td>$dict</td>
	 		<td>$prept</td>
	 		<td>$ejercidot</td>
	 		<td>$disponiblet</td>

	 	</tr>";
}
/*
<table class="table table-striped table-bordered table-condensed">
	<tr>
		<th>Area</th>
		<th>Partida</th>
		<th>Subprog</th>
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
	</tr>

<?php
  
     foreach($model as $valor) {

echo "<tr>
		<td>$valor->area</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr"; 

//echo 'Nombre: ' . $valor['area'] . '<br />';

}



  //imprimirarreglo($model);
?>

</table>

*/
 ?>

</table>
</div>