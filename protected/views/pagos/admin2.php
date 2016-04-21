<?php


Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Pagos Pendientes ejercicio <?=$anio?></h4>



</div><!-- search-form -->
<div class="row-fluid">
  <div class="span6">
       <a href="<?php echo CController::createUrl('pagos/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
       <a href="<?php echo CController::createUrl('pagos/create/'.$id.''); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> + Agregar</a>
</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pagos-grid',
	'dataProvider'=>$model->search2($id),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'folio',
		'proveedor',
		'detalle',
		'importe',
		array(
		'header' => 'Pagado',
		'type' => 'html',
		'value' => 'Chtml::image($data->imagen)',
		), 

		/*'tipo_persona',
		/*
		'pagado',
		'fecha_recibo',
		'fecha_pago',
		'cheque',
		'factura',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'fecha_cheque',
		'banco',
		'depto',
		'id_periodo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
