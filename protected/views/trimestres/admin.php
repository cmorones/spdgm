<?php
/* @var $this TrimestresController */
/* @var $model Trimestres */



$this->menu=array(
	//array('label'=>'List Trimestres', 'url'=>array('index')),
	array('label'=>'Agregar Trimestres', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trimestres-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar Trimestres</h3>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trimestres-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'id_periodo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
