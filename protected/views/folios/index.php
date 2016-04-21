<?php
/* @var $this FoliosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Folioses',
);

$this->menu=array(
	array('label'=>'Create Folios', 'url'=>array('create')),
	array('label'=>'Manage Folios', 'url'=>array('admin')),
);
?>

<h1>Folioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
