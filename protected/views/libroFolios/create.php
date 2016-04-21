<?php
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];
?>
<a href="<?php echo CController::createUrl('baseCap/admin/'.$id.''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


<?php echo $this->renderPartial('_form', 
	array('model'=>$model,
        'clasif'=>$clasif,
        'tipodoc'=>$tipodoc,
        'ejercicio'=>$ejercicio,
        'banderas'=>$banderas,
        'id_periodo'=>$id,
		'anio'=>$anio,
		)); ?>