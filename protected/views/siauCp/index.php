<?php
/* @var $this SiauCpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Siau Cps',
);

$this->menu=array(
	array('label'=>'Create SiauCp', 'url'=>array('create')),
	array('label'=>'Manage SiauCp', 'url'=>array('admin')),
);
?>

<h1>Siau Cps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
