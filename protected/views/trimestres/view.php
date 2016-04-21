<?php
/* @var $this TrimestresController */
/* @var $model Trimestres */


$this->menu=array(
	//array('label'=>'List Trimestres', 'url'=>array('index')),
	array('label'=>'Agregar Trimestres', 'url'=>array('create')),
	//array('label'=>'Update Trimestres', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Trimestres', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Trimestres', 'url'=>array('admin')),
);
?>

<h3>Modificar Trimestres</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'id_periodo',
	),
)); ?>
