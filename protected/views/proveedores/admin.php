<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Manage',
);*/

$this->menu=array(
//	array('label'=>'List Proveedores', 'url'=>array('index')),
	array('label'=>'Agregar Proveedores', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proveedores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar  Proveedores</h3>


<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proveedores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'nombre',
		'domicilio',
		'colonia',
		'telefono',
		'codigo',
		'rfc',
		'curp',
		'entidad',
		'actividad',
		'mail',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
