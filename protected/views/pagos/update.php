<?php
		
		$sql = "SELECT id_periodo from pagos where id=$id"; 
	    $ejercicio1 = Yii::app()->db->createCommand($sql)->queryRow();


		$sql = "SELECT nombre from cat_ejercicio where id=$ejercicio1[id_periodo]"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];

?>

<a href="<?php echo CController::createUrl('pagos/index/'.$ejercicio1['id_periodo'].''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


<?php echo $this->renderPartial('_form', array(

			'model'=>$model,
			'clasificacion'=>$clasificacion,
			'ejercicio'=>$ejercicio,
			'bancos'=>$bancos,
			'areas'=>$areas,
			'anio'=>$anio,
			'id'=>$id_periodo,
			
	)); ?>