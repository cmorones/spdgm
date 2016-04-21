<?php
/* @var $this SiauCpController */
/* @var $model SiauCp */

$this->breadcrumbs=array(
	'Siau Cps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SiauCp', 'url'=>array('index')),
	array('label'=>'Create SiauCp', 'url'=>array('create')),
	array('label'=>'Update SiauCp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SiauCp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SiauCp', 'url'=>array('admin')),
);
?>

<h1>View SiauCp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'asignado',
		'autorizado',
		'disponible',
		'cuentasxpagar',
		'ejercido',
		'ingresos_extra',
		'fecha_reg',
		'fecha_mod',
	),
)); ?>
