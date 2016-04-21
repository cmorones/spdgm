<?php
/* @var $this CatGruposController */
/* @var $model CatGrupos */

$this->breadcrumbs=array(
	'Cat Gruposes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CatGrupos', 'url'=>array('index')),
	array('label'=>'Create CatGrupos', 'url'=>array('create')),
	array('label'=>'Update CatGrupos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CatGrupos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CatGrupos', 'url'=>array('admin')),
);
?>

<h1>View CatGrupos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'nombre',
	),
)); ?>
