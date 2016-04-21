<?php
/* @var $this CodigosProgController */
/* @var $model CodigosProg */


$this->menu=array(
	//array('label'=>'List CodigosProg', 'url'=>array('index')),
	array('label'=>'Agregar Codigo Programatico', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#codigos-prog-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar Codigos Programaticos</h3>



</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'codigos-prog-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'partida',
		'subprog',
		'codigo',
		'descripcion',
		'clave',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
