<?php

//$url = "http://localhost/spdgm/index.php/api/presupuestosiau2?id_periodo=$id_periodo&id_trim=$id_trim&id_partida=$id_partida";
//$url = $baseUrl;
//$data = file_get_contents($url);
//$model= CJSON::decode($data);
if($id_area==0){
	$id_area="";
}
if($id_area==1){
	$id_area="DGMU";
}
if($id_area==2){
	$id_area="OFUNAM";
}
if($id_area==3){
	$id_area="OJUEM";
}

if($prov==0){
	$prov="";
}

?>
<h4 ><center><?   /*echo CHtml::link('Generar PDF',array('api/pdfPagos',
												'id_periodo'=>$id_periodo,
												'id_pago'=>$id_pago,
												'titulo'=>$titulo
												), array('target'=>'_blank'));*/ ?></center></h4>
<h4><center><?=$titulo?><bR><?=$id_area?><bR><?=$prov?></center></h4>
<hr>
<div class="span12">
<table class="table ">
	<tr>
		<th>Num.</th>
		<th>Folio</th>
		<th>Nombre</th>
		<th>Concepto</th>
		
		<th>Cheque</th>
		<th>Contrarecibo</th>
		<th>Fecha Contrarecibo</th>
		<th width='60'>Fecha cheque</th>
		<th>Importe</th>
		<th>Pagado</th>
		<th>Clasificacion</th>
		
	<tr>
<?php 
$num=1;
$total =0;
foreach ($model as $row) {

	if($row->pagado==1){
     // $pagado="SI";
      $imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

	} else {
	  // $pagado="NO";
	   $imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";

	}
	$clasif ="";

	if($row->clasificacion==1){
		$clasif = "DGMU";

	}

	if($row->clasificacion==2){
		$clasif = "OFUNAM";

	}

	if($row->clasificacion==3){
		$clasif = "OJUEM";

	}
echo "<tr>
        <td>$num</td>
        <td>$row->folio</td>
		<td>$row->proveedor</td>
		<td>$row->detalle</td>
		
		<td>$row->cheque</td>
		<td>$row->no_contrarecibo</td>
		<td>$row->fecha_contrarecibo</td>
		<td width='60' >$row->fecha_cheque</td>
		<td>$row->importe</td>
		<td><center><img class=img-responsive tpad src=$imagen></center></td>
		<td>$clasif</td>
		
	<tr>";
  $num++;

  $total = $total + $row->importe;
}

$total =number_format($total,2);

echo "<tr>
        <td></td>
        <td></td>
		<td></td>
		<td></td>
		<td</td>
		<td</td>
		<td></td>
		<td></td>
		<td></td>
		<td width='60' >Total</td>
		<td><strong>$total</strong></td>
		<td></td>
		<td></td>
		
	
		
	<tr>";


/*foreach ($model as $indice => $valor) {
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
			
/*

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
	 		
	 		
	 		</tr>";
		}*/

   	
?>
</table>
<br>
<br>
<br>
<bR>
</div>