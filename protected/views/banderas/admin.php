<?php
/* @var $this BanderasController */
/* @var $model Banderas */



$this->menu=array(
	//array('label'=>'List Banderas', 'url'=>array('index')),
	array('label'=>'Agregar Banderas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banderas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar Banderas</h3>



<div class="search-form" style="display:none">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'banderas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
