<?php
/* @var $this IngExtController */
/* @var $model IngExt */

$this->breadcrumbs=array(
	'Ing Exts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IngExt', 'url'=>array('index')),
	array('label'=>'Create IngExt', 'url'=>array('create')),
	array('label'=>'Update IngExt', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IngExt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IngExt', 'url'=>array('admin')),
);
?>

<h1>View IngExt #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_bandera',
		'saldo_anterior',
		'cargos',
		'abonos',
		'saldo_actual',
		'estado',
		'id_ejercicio',
	),
)); ?>
