<?php
		
		$sql = "SELECT id_periodo from libro_folios where id=$id"; 
	    $ejercicio1 = Yii::app()->db->createCommand($sql)->queryRow();


		$sql = "SELECT nombre from cat_ejercicio where id=$ejercicio1[id_periodo]"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];

?>

<a href="<?php echo CController::createUrl('libroFolios/admin/'.$ejercicio1['id_periodo'].''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


<?php echo $this->renderPartial('_form', 
	array('model'=>$model,
        'clasif'=>$clasif,
        'tipodoc'=>$tipodoc,
        'ejercicio'=>$ejercicio,
        'banderas'=>$banderas,
        'anio'=>$anio,
		'id'=>$id_periodo,
		)); ?>