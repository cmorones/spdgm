<?php
/* @var $this CodigosProgController */
/* @var $model CodigosProg */

$this->menu=array(
	//array('label'=>'List CodigosProg', 'url'=>array('index')),
	array('label'=>'Agregar Codigo Programatico', 'url'=>array('create')),
	array('label'=>'Modificar Codigo Programatico', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete CodigosProg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Adminisrar Codigos Programaticos', 'url'=>array('admin')),
);
?>

<h3>Registro Actualizado</h3>

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
