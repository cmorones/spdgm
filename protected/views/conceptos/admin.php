<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

/*$this->breadcrumbs=array(
	'Conceptoses'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Agregar Conceptos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#conceptos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administar Conceptos</h3>



<div class="search-form" style="display:none">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conceptos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
