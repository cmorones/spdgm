<?php
/* @var $this CatEjercicioController */
/* @var $model CatEjercicio */

$this->breadcrumbs=array(
	'Cat Ejercicios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CatEjercicio', 'url'=>array('index')),
	array('label'=>'Create CatEjercicio', 'url'=>array('create')),
	array('label'=>'Update CatEjercicio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CatEjercicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CatEjercicio', 'url'=>array('admin')),
);
?>

<h1>View CatEjercicio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'estado',
	),
)); ?>
