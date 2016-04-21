<?php
/* @var $this TrimestresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trimestres',
);

$this->menu=array(
	array('label'=>'Create Trimestres', 'url'=>array('create')),
	array('label'=>'Manage Trimestres', 'url'=>array('admin')),
);
?>

<h1>Trimestres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
