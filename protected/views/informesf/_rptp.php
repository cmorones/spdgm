<?php  
//print_r(json_encode($model));
//die();


?>
<h4><center><?   echo CHtml::link('Generar PDF',array('api/pdfptop',
												'id_subprog'=>$id_subprog,
												'id_trim'=>$id_trim,
												'id_periodo'=>$id_periodo,
												'id_partida'=>$id_partida,



												)); ?></center></h4>


<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span2"></div>
<div class="span8">
<table class="table table-striped  table-hover">
	<tr>
		<th>Partida</th>
		<th>Subprog</th>
		<th>Autorizado</th>
		<th>Ejercido</th>
		<th>Disponible</th>
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

					echo "<tr>
	 	
	 		
	 		<td  align=\"right\">$indice3</td>
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

 		$original =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['original'],2);
 		$ejercido =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['ejercido'],2);
 		$disponible =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['disponible'],2);
		echo "<tr>
	 	
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">$indice5</td>
	 		<td  align=\"right\">$original</td>
	 		<td  align=\"right\">$ejercido</td>
	 		<td  align=\"right\">$disponible</td>
	 		

	 	</tr>";

		
								}
							}



				}	

						}

	


	$presupuestop = number_format($model[$indice][$indice2][$indice3]['originalp'],2);
			$ejercidop = number_format($model[$indice][$indice2][$indice3]['ejercidop'],2);
			$disponiblep = number_format($model[$indice][$indice2][$indice3]['disponiblep'],2);

				if ($presupuestop==0) { $presupuestop =''; }
			  	if ($ejercidop==0) { $ejercidop =''; }
			  	if ($disponiblep==0) { $disponiblep =''; }
						
						echo "<tr>
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Subtotal:</b></td>
	 		<td  align=\"right\"><b>$presupuestop</b></td>
	 		<td  align=\"right\"><b>$ejercidop</b></td>
	 		<td  align=\"right\"><b>$disponiblep</b></td>

	 	</tr>";	
			
				}
			}
	
	 	}

	 	$presupuestot = number_format($model[$indice]['originalt'],2);
			$ejercidot = number_format($model[$indice]['ejercidot'],2);
			$disponiblet = number_format($model[$indice]['disponiblet'],2);

				if ($presupuestot==0) { $presupuestot =''; }
			  	if ($ejercidot==0) { $ejercidot =''; }
			  	if ($disponiblet==0) { $disponiblet =''; }
						
						echo "<tr>
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Total:</b></td>
	 		<td  align=\"right\"><b>$presupuestot</b></td>
	 		<td  align=\"right\"><b>$ejercidot</b></td>
	 		<td  align=\"right\"><b>$disponiblet</b></td>

	 	</tr>";
	}

		
}
?>
</table>
<br>
<br>
<br>
<br>
</div>
<div class="span2"></div>
