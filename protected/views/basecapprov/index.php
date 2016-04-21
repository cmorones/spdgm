<?php
/* @var $this BasecapprovController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Basecapprovs',
);

$this->menu=array(
	array('label'=>'Create Basecapprov', 'url'=>array('create')),
	array('label'=>'Manage Basecapprov', 'url'=>array('admin')),
);
?>

<h1>Basecapprovs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
