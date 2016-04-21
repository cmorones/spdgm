<?php
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];
?>
<a href="<?php echo CController::createUrl('baseCap/admin/'.$id.''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'clasif'=>$clasif,
	'docto'=>$docto,
	'concepto'=>$concepto,
	'subprog'=>$subprog,
	'areas'=>$areas,
	'conceptos'=>$conceptos,
	'partidas'=>$partidas,
	'banderas'=>$banderas,
	'proveedores'=>$proveedores,
	'ejercicio'=>$ejercicio,
	'pago'=>$pago,
	'id_periodo'=>$id,
	'anio'=>$anio,

	)); ?>