<?php

Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Saldos Iniciales <?=$anio?></h4>

<div class="row-fluid">
  <div class="span6">
       <a href="<?php echo CController::createUrl('ingext/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
       <a href="<?php echo CController::createUrl('ingext/create/'.$id.''); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> + Agregar</a>
</div>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ingext-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
		//'id_bandera',
		array(
            'name'=>'id_bandera',
            'value'=>'$data->Banderas->nombre',
            'filter'=>Banderas::model()->options2,
                    ),
		'saldo_inicial',
	//	'estado',
	//	'id_ejercicio',
	//	'fecha_ing',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
