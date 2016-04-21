<?php
/* @var $this BaseCapController */
/* @var $model BaseCap */

/*$this->breadcrumbs=array(
	'Base Caps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BaseCap', 'url'=>array('index')),
	array('label'=>'Create BaseCap', 'url'=>array('create')),
	array('label'=>'Update BaseCap', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BaseCap', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BaseCap', 'url'=>array('admin')),
);*/
?>

<div class="operation">
<?php echo CHtml::link('Atras', array('admin2'), array('class'=>'btnback '));?>
<?php echo CHtml::link('Agregar', array('create'), array('class'=>'btnupdate'));?>
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
		'proveedor',
		'rfc',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>

</div>
