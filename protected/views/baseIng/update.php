<?php
		
		$sql = "SELECT id_periodo from base_ing where id=$id"; 
	    $ejercicio1 = Yii::app()->db->createCommand($sql)->queryRow();


		$sql = "SELECT nombre from cat_ejercicio where id=$ejercicio1[id_periodo]"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];

?>

<a href="<?php echo CController::createUrl('baseIng/admin/'.$ejercicio1['id_periodo'].''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'docto'=>$docto,
	'concepto'=>$concepto,
	'subprog'=>$subprog,
	'areas'=>$areas,
	'conceptos'=>$conceptos,
	'partidas'=>$partidas,
	'banderas'=>$banderas,
	'proveedores'=>$proveedores,
	'ejercicio'=>$ejercicio,
	'anio'=>$anio,
	'id'=>$id_periodo,

	)); ?>