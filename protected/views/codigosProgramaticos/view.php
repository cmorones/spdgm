<?php
/* @var $this CodigosProgramaticosController */
/* @var $model CodigosProgramaticos */

$this->breadcrumbs=array(
	'Codigos Programaticoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CodigosProgramaticos', 'url'=>array('index')),
	array('label'=>'Create CodigosProgramaticos', 'url'=>array('create')),
	array('label'=>'Update CodigosProgramaticos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CodigosProgramaticos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodigosProgramaticos', 'url'=>array('admin')),
);
?>

<h1>View CodigosProgramaticos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'partida',
		'subprog',
		'codigo',
		'descripcion',
		'clave',
	),
)); ?>
