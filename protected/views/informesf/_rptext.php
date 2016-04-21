<bR>
	<bR>
		<bR>
			<bR>
				<bR>

<h4 ><center><?   echo CHtml::link('Generar PDF',array('api/pdfext',
												'anio'=>$anio,
												'id'=>$id,
												)); ?></center></h4>

<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span12">
<table class="table table-striped  table-hover">
	<tr>
		<th>Cuenta   </th>
		<th>Inicial</th>
		<th colspan="2">Ene</th>
		<th colspan="2">Feb</th>
		<th colspan="2">Mar</th>
		<th colspan="2">Abr</th>
		<th colspan="2">May</th>
		<th colspan="2">Jun</th>
		<th colspan="2">Jul</th>
		<th colspan="2">Ago</th>
		<th colspan="2">Sep</th>
		<th colspan="2">Oct</th>
		<th colspan="2">Nov</th>
		<th colspan="2">Dic</th>
	
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

	 		$depositoJun = number_format($model[$indice][$indice2][$indice3]['depositoJun'],2);
	 		$jungas = number_format($model[$indice][$indice2][$indice3]['jungas'],2);

	 		$depositoJul = number_format($model[$indice][$indice2][$indice3]['depositoJul'],2);
	 		$julgas = number_format($model[$indice][$indice2][$indice3]['julgas'],2);

	 		$depositoAgo = number_format($model[$indice][$indice2][$indice3]['depositoAgo'],2);
	 		$agogas = number_format($model[$indice][$indice2][$indice3]['agogas'],2);

	 		$depositoSep = number_format($model[$indice][$indice2][$indice3]['depositoSep'],2);
	 		$sepgas = number_format($model[$indice][$indice2][$indice3]['sepgas'],2);

	 		$depositoOct = number_format($model[$indice][$indice2][$indice3]['depositoOct'],2);
	 		$octgas = number_format($model[$indice][$indice2][$indice3]['octgas'],2);

	 		$depositoNov = number_format($model[$indice][$indice2][$indice3]['depositoNov'],2);
	 		$novgas = number_format($model[$indice][$indice2][$indice3]['novgas'],2);

	 		$depositoDic = number_format($model[$indice][$indice2][$indice3]['depositoDic'],2);
	 		$dicgas = number_format($model[$indice][$indice2][$indice3]['dicgas'],2);

	 		// totales meses

	 		$depositosTotal=number_format($model[$indice][$indice2][$indice3]['depositosmes'],2);
	 		$gastosTotal= number_format($model[$indice][$indice2][$indice3]['gastossmes'],2);
	 		$disponible= number_format($model[$indice][$indice2][$indice3]['disponible'],2);

	 		if ($saldo_inicial==0) { $saldo_inicial =''; }
	 		if ($depositoene==0) { $depositoene =''; }
	 		if ($enegas==0) { $enegas =''; }
	 		if ($depositoFeb==0) { $depositoFeb =''; }
	 		if ($febgas==0) { $febgas =''; }
	 		if ($depositoMar==0) { $depositoMar =''; }
	 		if ($margas==0) { $margas =''; }
	 		if ($depositoAbr==0) { $depositoAbr =''; }
	 		if ($abrgas==0) { $abrgas =''; }
	 		if ($depositoMay==0) { $depositoMay =''; }
	 		if ($maygas==0) { $maygas =''; }

	 		if ($depositoJun==0) { $depositoJun =''; }
	 		if ($jungas==0) { $jungas =''; }
	 		if ($depositoJul==0) { $depositoJul =''; }
	 		if ($julgas==0) { $julgas =''; }
	 		if ($depositoAgo==0) { $depositoAgo =''; }
	 		if ($agogas==0) { $agogas =''; }
	 		if ($depositoSep==0) { $depositoSep =''; }
	 		if ($sepgas==0) { $sepgas =''; }
	 		if ($depositoOct==0) { $depositoOct =''; }
	 		if ($octgas==0) { $octgas =''; }

	 		if ($depositoNov==0) { $depositoNov =''; }
	 		if ($novgas==0) { $novgas =''; }
	 		if ($depositoDic==0) { $depositoDic =''; }
	 		if ($dicgas==0) { $dicgas =''; }

	 		if ($depositosTotal==0) { $depositosTotal =''; }
	 		if ($gastosTotal==0) { $gastosTotal =''; }
	 		if ($disponible==0) { $disponible =''; }

	 		
	 		

			echo "<tr>
	 		<td style=\"font-size:7px;font-weight: bold;\">$indice3</td>
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
	 		<td  align=\"right\">$depositoJun</td>
	 		<td  align=\"right\">$jungas</td>
	 		<td  align=\"right\">$depositoJul</td>
	 		<td  align=\"right\">$julgas</td>
	 		<td  align=\"right\">$depositoAgo</td>
	 		<td  align=\"right\">$agogas</td>
	 		<td  align=\"right\">$depositoSep</td>
	 		<td  align=\"right\">$sepgas</td>
	 		<td  align=\"right\">$depositoOct</td>
	 		<td  align=\"right\">$octgas</td>
	 		<td  align=\"right\">$depositoNov</td>
	 		<td  align=\"right\">$novgas</td>
	 		<td  align=\"right\">$depositoDic</td>
	 		<td  align=\"right\">$dicgas</td>
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

	$depositojunTotal = number_format($model[$indice]['ingjunt'],2);
	$gastojunt = number_format($model[$indice]['gastojunt'],2);

	$depositojulTotal = number_format($model[$indice]['ingjult'],2);
	$gastojult = number_format($model[$indice]['gastojult'],2);

	$depositoagoTotal = number_format($model[$indice]['ingagot'],2);
	$gastoagot = number_format($model[$indice]['gastoagot'],2);

	$depositosepTotal = number_format($model[$indice]['ingsept'],2);
	$gastosept = number_format($model[$indice]['gastosept'],2);

	$depositooctTotal = number_format($model[$indice]['ingoctt'],2);
	$gastooctt = number_format($model[$indice]['gastooctt'],2);

	$depositonovTotal = number_format($model[$indice]['ingnovt'],2);
	$gastonovt = number_format($model[$indice]['gastonovt'],2);

	$depositodicTotal = number_format($model[$indice]['ingdict'],2);
	$gastodict = number_format($model[$indice]['gastodict'],2);


	$depositosTotal = number_format($model[$indice]['ingresotot'],2);
	$gastosTotal = number_format($model[$indice]['gastotot'],2);
	$disponiblet = number_format($model[$indice]['disponiblet'],2);

    if ($saldo_inicialTotal==0) { $saldo_inicialTotal =''; }
    if ($depositoeneTotal==0) { $depositoeneTotal =''; }
    if ($gastoenet==0) { $gastoenet =''; }

    if ($depositofebTotal==0) { $depositofebTotal =''; }
    if ($gastofebt==0) { $gastofebt =''; }
    if ($depositomarTotal==0) { $depositomarTotal =''; }
    if ($gastomart==0) { $gastomart =''; }
    if ($depositoabrTotal==0) { $depositoabrTotal =''; }
    if ($depositomayTotal==0) { $depositomayTotal =''; }
    if ($gastomayt==0) { $gastomayt =''; }
    if ($depositojunTotal==0) { $depositojunTotal =''; }
    if ($gastojunt==0) { $gastojunt =''; }
    if ($depositojulTotal==0) { $depositojulTotal =''; }
    if ($gastojult==0) { $gastojult =''; }
    if ($depositoagoTotal==0) { $depositoagoTotal =''; }
    if ($gastoagot==0) { $gastoagot =''; }
    if ($depositosepTotal==0) { $depositosepTotal =''; }
    if ($gastosept==0) { $gastosept =''; }

    if ($depositooctTotal==0) { $depositooctTotal =''; }
    if ($gastooctt==0) { $gastooctt =''; }

    if ($depositonovTotal==0) { $depositonovTotal =''; }
    if ($gastonovt==0) { $gastonovt =''; }

    if ($depositodicTotal==0) { $depositodicTotal =''; }
    if ($gastodict==0) { $gastodict =''; }

    if ($depositosTotal==0) { $depositosTotal =''; }
    if ($gastosTotal==0) { $gastosTotal =''; }
     if ($disponiblet==0) { $disponiblet =''; }
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

	 		<td  align=\"right\"><b>$depositojunTotal</b></td>
	 		<td  align=\"right\"><b>$gastojunt</b></td>

	 		<td  align=\"right\"><b>$depositojulTotal</b></td>
	 		<td  align=\"right\"><b>$gastojult</b></td>

	 		<td  align=\"right\"><b>$depositoagoTotal</b></td>
	 		<td  align=\"right\"><b>$gastoagot</b></td>

	 		<td  align=\"right\"><b>$depositosepTotal</b></td>
	 		<td  align=\"right\"><b>$gastosept</b></td>

	 		<td  align=\"right\"><b>$depositooctTotal</b></td>
	 		<td  align=\"right\"><b>$gastooctt</b></td>

	 		<td  align=\"right\"><b>$depositonovTotal</b></td>
	 		<td  align=\"right\"><b>$gastonovt</b></td>

	 		<td  align=\"right\"><b>$depositodicTotal</b></td>
	 		<td  align=\"right\"><b>$gastodict</b></td>
	 		

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

