<?php
/* @var $this ClaveDoctosController */
/* @var $model ClaveDoctos */

/*$this->breadcrumbs=array(
	'Clave Doctoses'=>array('index'),
	'Manage',
);*/

$this->menu=array(
//	array('label'=>'List ClaveDoctos', 'url'=>array('index')),
	array('label'=>'Agregar clave de documento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clave-doctos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Claves de Documentos</h3>


<div class="search-form" style="display:none">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clave-doctos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'nombre',
		'detalle',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
