<div class="operation">
<?php echo CHtml::link('Atras', array('admin'), array('class'=>'btnback '));?>
<?php echo CHtml::link('Modificar', array('update' ,'id'=>$model->id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->id), array('class'=>'btndelete', 'onclick'=>"return confirm('Estas seguro de eliminar?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle del Ingreso
 </div>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'folio',
		'subprog',
		'area',
		'factura',
		'importe',
		'numerocheque',
		'concepto',
		'cantidades',
		'partida',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'detalle',
		'bandera',
		'fecha_ingreso',
		'cladgam',
		'id_periodo',
	),
)); ?>

</div>
