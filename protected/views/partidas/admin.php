<?php
/* @var $this PartidasController */
/* @var $model Partidas */

/*$this->breadcrumbs=array(
	'Partidases'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'List Partidas', 'url'=>array('index')),
	array('label'=>'Agregar Partidas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#partidas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar Partidas</h3>


<div class="search-form" style="display:none">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'partidas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codigo',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
