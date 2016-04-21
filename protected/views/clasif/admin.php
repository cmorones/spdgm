<?php
/* @var $this ClasifController */
/* @var $model Clasif */


$this->menu=array(
	//array('label'=>'List Clasif', 'url'=>array('index')),
	array('label'=>'Agregar', 'url'=>array('create')),
);
?>

<h>Administrar Clasificacion de folios</h3>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clasif-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
