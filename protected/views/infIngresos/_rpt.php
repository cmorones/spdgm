<?php  
//print_r(json_encode($model));
//die();


?>
<h4><center><?   print CHtml::link('Generar PDF',array('apiIng/pdfIng','id_ejercicio'=>$id_ejercicio,'id_trim'=>$id_trim,'id_tipo'=>$id_tipo)); ?></center></h4>


<h4><center><?=$titulo?></center></h4>
<hr>

<div class="span11">
<table class="table table-striped  table-hover">
	<tr>
		<th>Cuenta</th>
		<th>fecha</th>
		<th>folio</th>
		<th>Docto</th>
		<th>Detalle</th>
		<th>Importe</th>
	</tr>
<?php 

foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 

  		$importef  =0;

   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			//$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			
					echo "<tr>
	 	
	 		
	 		<td  align=\"right\">$indice2</td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		
	 		

	 	</tr>";



   			if (is_array($valor2)){
   				$importet  =0;
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

		

		
 $fecha =$model[$indice][$indice2][$indice3]['fecha'];
  $folio =$model[$indice][$indice2][$indice3]['folio'];
   $docto =$model[$indice][$indice2][$indice3]['docto'];
    $detalle =$model[$indice][$indice2][$indice3]['detalle'];
     $importe =number_format($model[$indice][$indice2][$indice3]['importe'],2);
     $importe2 =$model[$indice][$indice2][$indice3]['importe'];
							
	echo "<tr>
	 	
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">$fecha</td>
	 		<td  align=\"right\">$folio</td>
	 		<td  align=\"right\">$docto</td>
	 		<td  align=\"left\">$detalle</td>
	 		<td  align=\"right\">$importe</td>
	 		
	 		

	 	</tr>";
	

  $importet = $importet + $importe2;
  $importet2 = number_format($importet,2);



	/*$presupuestop = number_format($model[$indice][$indice2][$indice3]['originalp'],2);
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

	 	</tr>";	*/
			
				}


				echo "<tr>
	 	
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">Subtotal</td>
	 		<td  align=\"right\"><strong>$importet2</strong></td>
	 		
	 		

	 	</tr>";
			}
	 $importef = $importef + $importet;	
	 	}
$importetfin = number_format($importef,2);
	
				echo "<tr>
	 	
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><strong>Gran total</strong></td>
	 		<td  align=\"right\"><strong>$importetfin</strong></td>
	 		
	 		

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
<div class="span1"></div>
