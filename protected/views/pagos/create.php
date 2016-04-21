<?php
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];
?>
<a href="<?php echo CController::createUrl('pagos/index/'.$id.''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'clasificacion'=>$clasificacion,
	'ejercicio'=>$ejercicio,
	'bancos'=>$bancos,
	'areas'=>$areas,
	'id_periodo'=>$id,
	'anio'=>$anio,
	)); ?>