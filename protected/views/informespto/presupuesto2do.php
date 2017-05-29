<?php

$url = "http://localhost/spdgm/index.php/api/presupuesto2do?id_periodo=$id_periodo&id_trim=$id_trim&id_partida=$id_partida&id_area=$id_area&id_subprog=$id_subprog";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);



?>
<h4><center><?   echo CHtml::link('Generar PDF',array('api/presupuesto2dopdf',
												
												'id_partida'=>$id_partida,
												'id_periodo'=>$id_periodo,
												'id_trim'=>$id_trim,
												'id_area'=>$id_area,
												'id_subprog'=>$id_subprog,

												'titulo'=>$titulo


												)); ?></center></h4>

<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span10">
<table class="table table-striped  table-hover">
	<tr>
		<th>Partida</th>
		<th>Codigo</th>
		<th>CV</th>
		<th>Programa</th>
		<th>Autorizado</th>
		
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
					$sql = "SELECT descripcion from partidas where codigo=$indice3"; 
					$name_part = Yii::app()->db->createCommand($sql)->queryRow();

								echo "<tr>
	 		<td><center><b>$indice3<b></center></td>
	 		<td  align=\"left\" colspan=\"4\">".$name_part['descripcion']."</td>
	 		
	 		
	 		
	 	</tr>";
	 
	 	if (is_array($valor3)){
				foreach ($valor3 as $indice4 => $valor4) {
					//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
					if (is_array($valor4)){
						foreach ($valor4 as $indice5 => $valor5) {
							//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
					

					$codigo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['codigo'];
					$clave=$model[$indice][$indice2][$indice3][$indice4][$indice5]['clave'];
					$programa=$model[$indice][$indice2][$indice3][$indice4][$indice5]['programa'];
					$presupuestosubprog=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['presupuestosubprog'],2);
		/*$subprog=$model[$indice][$indice2][$indice3][$indice4][$indice5]['subprog'];
		$area=$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
		$proveedor=$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
		$importe=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'],2);
		$concepto=$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
		$partida=$model[$indice][$indice2][$indice3][$indice4][$indice5]['partida'];
		$fecha_contrarecibo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
		$no_contrarecibo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
		$detalle=$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];*/
			echo "<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\">$codigo</td>
	 		<td  align=\"center\">$clave</td>
	 		<td  align=\"center\">$programa</td>
	 		<td  align=\"right\">$presupuestosubprog</td>
	 	
	 		</tr>";

		
	 	}
	 }





				}
		}

$importef=number_format($valor4,2);
			 echo "<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 	
	 		<td  align=\"right\"><b>Suma:<b></td>
	 		<td  align=\"right\"><b>$importef<b></td>
	 		
	 		</tr>";



				}
		}


	}
}

$importefinal=number_format($model[$indice]['presupuestot'],2);
			 echo "<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		
	 		<td  align=\"right\"><b>Suma Total:<b></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$importefinal</div></td>
	 		
	 		
	 		</tr>";
		}

   	
?>
</table>
<br>
<br>
<br>
<bR>
</div>

