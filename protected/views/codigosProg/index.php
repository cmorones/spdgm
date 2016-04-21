<?php
/* @var $this CodigosProgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Codigos Progs',
);

$this->menu=array(
	array('label'=>'Create CodigosProg', 'url'=>array('create')),
	array('label'=>'Manage CodigosProg', 'url'=>array('admin')),
);
?>

<h1>Codigos Progs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
