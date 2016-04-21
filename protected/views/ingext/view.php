<?php
/* @var $this IngextController */
/* @var $model Ingext */

$this->breadcrumbs=array(
	'Ingexts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ingext', 'url'=>array('index')),
	array('label'=>'Create Ingext', 'url'=>array('create')),
	array('label'=>'Update Ingext', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ingext', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingext', 'url'=>array('admin')),
);
?>

<h1>View Ingext #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_bandera',
		'saldo_inicial',
		'estado',
		'id_ejercicio',
		'fecha_ing',
	),
)); ?>
