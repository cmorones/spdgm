<?php
/* @var $this CatGruposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cat Gruposes',
);

$this->menu=array(
	array('label'=>'Create CatGrupos', 'url'=>array('create')),
	array('label'=>'Manage CatGrupos', 'url'=>array('admin')),
);
?>

<h1>Cat Gruposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
