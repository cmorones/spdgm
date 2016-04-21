<?php
/* @var $this IngExtController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ing Exts',
);

$this->menu=array(
	array('label'=>'Create IngExt', 'url'=>array('create')),
	array('label'=>'Manage IngExt', 'url'=>array('admin')),
);
?>

<h1>Ing Exts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
