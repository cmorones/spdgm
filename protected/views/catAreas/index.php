<?php
/* @var $this CatAreasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Áreas',
);

$this->menu=array(
	array('label'=>'Agregar Áreas', 'url'=>array('create')),
	array('label'=>'Administrar Áreas', 'url'=>array('admin')),
);
?>

<h1>Cat Areases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
