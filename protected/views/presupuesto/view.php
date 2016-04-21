
<div class="operation">
<?php //echo CHtml::link('Atras', array('admin'), array('class'=>'btnback '));?>
<?php echo CHtml::link('Modificar', array('update' ,'id'=>$model->id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->id), array('class'=>'btndelete', 'onclick'=>"return confirm('Estas seguro de eliminar?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle del Gasto
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'grupo',
		'subprog',
		'partida',
		'tipo',
		'area',
		'presupuesto',
		'gasto',
		'disponible',
		'fecha_reg',
		'oficio',
		'id_periodo',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>

</div>

