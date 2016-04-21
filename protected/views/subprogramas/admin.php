<?php
/* @var $this SubprogramasController */
/* @var $model Subprogramas */



$this->menu=array(
//	array('label'=>'List Subprogramas', 'url'=>array('index')),
	array('label'=>'Agregar Subprogramas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subprogramas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar Subprogramas</h3>


<div class="search-form" style="display:none">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subprogramas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                'id',		
		'nombre',
		'status',
		'alias',
		'alias2',
		array
(
    'class'=>'CButtonColumn',
    'template'=>'{update}',
),
	),
)); ?>
