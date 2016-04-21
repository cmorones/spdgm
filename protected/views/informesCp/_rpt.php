
<?php  
//print_r(json_encode($model));
//die();
?>


<h4><center><?=$titulo?></center></h4>
<hr>
<div class="span12">
<table class="table table-striped  table-hover">
	<tr class="ver-minimalist">
		<th colspan='6'>SIAUWEB</th>
		<th colspan='3'>SPDGM</th>
			
	</tr>
	<tr>
		<th>Partida</th>
		<th>Asignado</th>
		<th>Autorizado</th>
		<th>Disponible</th>
		<th>Ejercido</th>
		<th>Ing. Ext</th>
		<th>Gastos registrados</th>
		<th>Ingresos registrados</th>
		<th>Disponible Real</th>
		
	</tr>

	<?php 
foreach ($model as $indice => $valor) {
   	//echo ("El indice1 $indice tiene el valor: $valor<br>");


  	$asignadot=number_format($model[$indice]['asignadot'],2);
   	$autorizadot=number_format($model[$indice]['autorizadot'],2);
   	$disponiblet=number_format($model[$indice]['disponiblet'],2);
   	$ejercidot=number_format($model[$indice]['ejercidot'],2);
   	$ingextt=number_format($model[$indice]['ingextt'],2);
   	$gastosregt=number_format($model[$indice]['gastosregt'],2);
   	$ingresosregt=number_format($model[$indice]['ingresosregt'],2);
   	$asignadot=number_format($model[$indice]['asignadot'],2);
   	$asignadot=number_format($model[$indice]['asignadot'],2);





   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice1 $indice2 tiene el valor: $valor2<br>");
   			if (is_array($valor2)){ 
   					foreach ($valor2 as $indice3 => $valor3) {
   					//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
   						$partida=$model[$indice][$indice2][$indice3]['partida'];
   						$subprog=$model[$indice][$indice2][$indice3]['subprog'];
   						$asignado=number_format($model[$indice][$indice2][$indice3]['asignado'],2);
   						$autorizado=number_format($model[$indice][$indice2][$indice3]['autorizado'],2);
   						$disponible=number_format($model[$indice][$indice2][$indice3]['disponible'],2);
   						$ejercido=number_format($model[$indice][$indice2][$indice3]['ejercido'],2);
   						$ingext=number_format($model[$indice][$indice2][$indice3]['ingext'],2);
   						$gastosreg=number_format($model[$indice][$indice2][$indice3]['gastosreg'],2);
   						$ingresosreg=number_format($model[$indice][$indice2][$indice3]['ingresosreg'],2);
   						$check=$model[$indice][$indice2][$indice3]['checkaut'];
   						$checkej=$model[$indice][$indice2][$indice3]['checkej'];
   						$checkarea=$model[$indice][$indice2][$indice3]['checkarea'];

 


if($asignado!=0){

 if($check==0){


$imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

  } else {
$imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";
 } 


if($checkej==0 && $checkarea!=12){
$imagen2 = Yii::app()->request->baseUrl ."/images/correcto.png";
  }elseif($checkej!=0 && $checkarea!=12){
$imagen2 = Yii::app()->request->baseUrl ."/images/incorrecto.png";
  }else
{
$imagen2 =Yii::app()->request->baseUrl ."/images/c.png";
  }
   						

   						echo "<tr>
	 		<td align=\"right\">$partida</td>
	 		<td  align=\"right\">$asignado</td>
	 		<td  align=\"right\">$autorizado<img class=img-responsive tpad src=$imagen></td>
	 		<td  align=\"right\">$disponible</td>
	 		<td  align=\"right\">$ejercido<img class=img-responsive tpad src=$imagen2></td>
	 		<td  align=\"right\">$ingext</td>
	 		<td  align=\"right\">";


/*echo CHtml::ajaxLink($gastosreg,Yii::app()->createUrl("api/detalle?=$subprog&partida=$partida"),
     array('type'=>'POST', 'update'=>'#preview', 'complete'=>'afterAjax'));

echo '<div style="display:none;">
<div id="preview">
<!-- space here will be updated by ajax -->
</div>
</div>';*/
///funciona
if($gastosreg!=0){
echo CHtml::link($gastosreg,array('detalle','subprog'=>$subprog,'partida'=>$partida), array('target'=>'_blank'));
}
/**echo CHtml::link($gastosreg, '#target'.$partida, array('class' => 'fancy-inline'));
 
echo '<div id="target'.$partida.'" style="display: none;">';

/*$titulo = "Informe detalle";
$url = "http://localhost/spdgm/index.php/api/detalle?=$subprog&partida=$partida";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);*/

/*$this->render('_detalle2',array(
				           'subprog'=>$subprog,
				           'partida'=>$partida
		));

echo '</div>';*/
echo "</td>
	 		<td  align=\"right\">$ingresosreg</td>
	 		<td  align=\"right\">$check</td>
	 		
	 		
	 	</tr>";

	 }

   						/*$subprog=$model[$indice][$indice2][$indice3]['subprog'];
   						$asignado=number_format($model[$indice][$indice2][$indice3]['asignado'],2);
   						$autorizado=number_format($model[$indice][$indice2][$indice3]['autorizado'],2);
   						$disponible=number_format($model[$indice][$indice2][$indice3]['disponible'],2);
   						$ejercido=number_format($model[$indice][$indice2][$indice3]['ejercido'],2);
   						$ingext=number_format($model[$indice][$indice2][$indice3]['ingext'],2);
   						$gastosreg=number_format($model[$indice][$indice2][$indice3]['gastosreg'],2);
   						$ingresosreg=number_format($model[$indice][$indice2][$indice3]['ingresosreg'],2);
   						echo ("El gastosreg : $gastosreg <br>");
   						
   						



								echo "<tr>
	 		<td align=\"right\">$partida</td>
	 		<td  align=\"right\">$asignado</td>
	 		<td  align=\"right\">$autorizado</td>
	 		<td  align=\"right\">$disponible</td>
	 		<td  align=\"right\">$ejercido</td>
	 		<td  align=\"right\">$ingext</td>
	 		<td  align=\"right\">";


//echo CHtml::link($gastosreg,array('detalle','subprog'=>$subprog,'partida'=>$indice3), array('target'=>'_blank','class'=>'colorbox'));

echo CHtml::link($gastosreg, '#target', array('class' => 'fancy-inline'));
 
echo '<div id="target" style="display: none;">';

$titulo = "Informe detalle";
$url = "http://localhost/spdgm/index.php/api/detalle?subprog=$subprog&partida=$indice3";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->render('_detalle',array(
				           'model'=>$model,
				           'titulo'=>$titulo
		));

echo '</div>';
echo "</td>
	 		<td  align=\"right\">$ingresosreg</td>
	 		<td  align=\"right\">0</td>
	 		
	 		
	 	</tr>";*/
   					}

   			}

   		}
   	}

 

   			echo "<tr>
	 		<td align=\"right\"><b>Total</b></td>
	 		<td  align=\"right\"><b>$asignadot</b></td>
	 		<td  align=\"right\"><b>$autorizadot</b></td>
	 		<td  align=\"right\"><b>$disponiblet</b></td>
	 		<td  align=\"right\"><b>$ejercidot</b></td>
	 		<td  align=\"right\"><b>$ingextt</b></td>
	 		<td  align=\"right\"><b>$gastosregt</b></td>
	 		<td  align=\"right\"><b>$ingresosregt</b></td>
	 		<td  align=\"right\"><b>$ingresosregt</b></td>
			
	 		";
}



?>

</table>
<br>
<br>

</div>


<h3 id="updateTitle"></h3>
<div id="updateContent"></div>

