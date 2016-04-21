
<?php  
//print_r(json_encode($model));

?>
<bR>
	<bR>
		<bR>
			<bR>
				<bR>
<h4><center><?   echo CHtml::link('Generar PDF',array('api/pdfext')); ?></center></h4>

<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span12">
<table class="table table-striped  table-hover">
	<tr>
		<th>Cuenta   </th>
		<th>Saldo Inicial</th>
		<th colspan="2">Ene</th>
		<th colspan="2">Feb</th>
		<th colspan="2">Mar</th>
		<th colspan="2">Abr</th>
		<th colspan="2">May</th>
	
		<th colspan="2">Total</th>
		<th>Disponible</th>
	
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th ></th>
		

	</tr>
<?php 
foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
		//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
				if (is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
						//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					
							 
	 		//$saldo_inicial = number_format($model[$indice][$indice2][$indice3][$indice4]['saldoInicial'],2);
	 		$saldo_inicial = number_format($model[$indice][$indice2][$indice3]['SaldoInicial'],2);
	 		$depositoene = number_format($model[$indice][$indice2][$indice3]['depositoEne'],2);
	 		$enegas = number_format($model[$indice][$indice2][$indice3]['enegas'],2);
	 		$depositoFeb = number_format($model[$indice][$indice2][$indice3]['depositoFeb'],2);
	 		$febgas = number_format($model[$indice][$indice2][$indice3]['febgas'],2);
	 		$depositoMar = number_format($model[$indice][$indice2][$indice3]['depositoMar'],2);
	 		$margas = number_format($model[$indice][$indice2][$indice3]['margas'],2);
	 		$depositoAbr = number_format($model[$indice][$indice2][$indice3]['depositoAbr'],2);
	 		$abrgas = number_format($model[$indice][$indice2][$indice3]['abrgas'],2);
	 		$depositoMay = number_format($model[$indice][$indice2][$indice3]['depositoMay'],2);
	 		$maygas = number_format($model[$indice][$indice2][$indice3]['maygas'],2);

	 		// totales meses

	 		$depositosTotal=number_format($model[$indice][$indice2][$indice3]['depositosmes'],2);
	 		$gastosTotal= number_format($model[$indice][$indice2][$indice3]['gastossmes'],2);
	 		$disponible= number_format($model[$indice][$indice2][$indice3]['disponible'],2);
	 		

			echo "<tr>
	 		<td><center>$indice3</center></td>
	 		<td  align=\"right\">$saldo_inicial</td>
	 		<td  align=\"right\">$depositoene</td>
	 		<td  align=\"right\">$enegas</td>
	 		<td  align=\"right\">$depositoFeb</td>
	 		<td  align=\"right\">$febgas</td>
	 		<td  align=\"right\">$depositoMar</td>
	 		<td  align=\"right\">$margas</td>
			<td  align=\"right\">$depositoAbr</td>
	 		<td  align=\"right\">$abrgas</td>
	 		<td  align=\"right\">$depositoMay</td>
	 		<td  align=\"right\">$maygas</td>
			<td  align=\"right\">$depositosTotal</td>
	 		<td  align=\"right\">$gastosTotal</td>
	 		<td  align=\"right\">$disponible</td>

	 		</tr>";		
		}

					}

		

		
				}

		
	}

	$saldo_inicialTotal = number_format($model[$indice]['SaldoInicialTotal'],2);
	$depositoeneTotal = number_format($model[$indice]['ingenet'],2);
	$gastoenet = number_format($model[$indice]['gastoenet'],2);
	$depositofebTotal = number_format($model[$indice]['ingfebt'],2);
	$gastofebt = number_format($model[$indice]['gastofebt'],2);
	$depositomarTotal = number_format($model[$indice]['ingmart'],2);
	$gastomart = number_format($model[$indice]['gastomart'],2);
	$depositoabrTotal = number_format($model[$indice]['ingabrt'],2);
	$gastoabrt = number_format($model[$indice]['gastoabrt'],2);
	$depositomayTotal = number_format($model[$indice]['ingmayt'],2);
	$gastomayt = number_format($model[$indice]['gastomayt'],2);
	$depositosTotal = number_format($model[$indice]['ingresotot'],2);
	$gastosTotal = number_format($model[$indice]['gastotot'],2);
	$disponiblet = number_format($model[$indice]['disponiblet'],2);



	echo "<tr>
	 		<td><center></center></td>
	 		<td  align=\"right\"><b>$saldo_inicialTotal</b></td>
	 		<td  align=\"right\"><b>$depositoeneTotal</b></td>
	 		<td  align=\"right\"><b>$gastoenet</b></td>
	 		<td  align=\"right\"><b>$depositofebTotal</b></td>
	 		<td  align=\"right\"><b>$gastofebt</b></td>
	 		<td  align=\"right\"><b>$depositomarTotal</b></td>
	 		<td  align=\"right\"><b>$gastomart</b></td>
	 		<td  align=\"right\"><b>$depositoabrTotal</b></td>
	 		<td  align=\"right\"><b>$gastoabrt</b></td>
	 		<td  align=\"right\"><b>$depositomayTotal</b></td>
	 		<td  align=\"right\"><b>$gastomayt</b></td>
	 		

	 		<td  align=\"right\"><b>$depositosTotal<b></td>
	 		<td  align=\"right\"><b>$gastosTotal<b></td>
	 		<td  align=\"right\"><b>$disponiblet<b></td>
	 		</tr>";
		
}
?>
</table>
<br>
<br>

</div>

