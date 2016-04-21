<?php
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];
?>
<a href="<?php echo CController::createUrl('presupuesto/admin/'.$id.''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'subprog'=>$subprog,
	'areas'=>$areas,
	'grupos'=>$grupos,
	'partidas'=>$partidas,
	'ejercicio'=>$ejercicio,
	'tipo'=>$tipo,
	'trimestre'=>$trimestre,
	'anio'=>$anio,
	'id'=>$id,
	
	)); ?>