<?php
/* @var $this CatEjercicioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cat Ejercicios',
);

$this->menu=array(
	array('label'=>'Create CatEjercicio', 'url'=>array('create')),
	array('label'=>'Manage CatEjercicio', 'url'=>array('admin')),
);
?>

<h1>Cat Ejercicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
