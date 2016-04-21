<?php
		
		$sql = "SELECT id_ejercicio from ing_ext where id=$id"; 
	    $ejercicio1 = Yii::app()->db->createCommand($sql)->queryRow();
	    $id_periodo = $ejercicio1['id_ejercicio'];

		$sql = "SELECT nombre from cat_ejercicio where id=$ejercicio1[id_ejercicio]"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];

?>

<a href="<?php echo CController::createUrl('ingext/admin/'.$ejercicio1['id_ejercicio'].''); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i> Regresar</a>


<h1>Modificar Saldo Inicial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'banderas'=>$banderas,'id_periodo'=>$id_periodo,)); ?>