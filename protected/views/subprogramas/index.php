<?php
/* @var $this SubprogramasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subprogramases',
);

$this->menu=array(
	array('label'=>'Create Subprogramas', 'url'=>array('create')),
	array('label'=>'Manage Subprogramas', 'url'=>array('admin')),
);
?>

<h1>Subprogramases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
