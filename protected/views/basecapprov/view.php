<?php
/* @var $this BasecapprovController */
/* @var $model Basecapprov */

$this->breadcrumbs=array(
	'Basecapprovs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Basecapprov', 'url'=>array('index')),
	array('label'=>'Create Basecapprov', 'url'=>array('create')),
	array('label'=>'Update Basecapprov', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Basecapprov', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Basecapprov', 'url'=>array('admin')),
);
?>

<h1>View Basecapprov #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_folio',
		'id_proveedor',
	),
)); ?>
