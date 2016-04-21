<?php
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];
?>
<a href="<?php echo CController::createUrl('baseIng/admin/'.$id.''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


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
	'id_periodo'=>$id,
	'anio'=>$anio,

	)); ?>