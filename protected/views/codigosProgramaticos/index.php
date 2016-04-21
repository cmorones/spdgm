<?php
/* @var $this CodigosProgramaticosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Codigos Programaticoses',
);

$this->menu=array(
	array('label'=>'Create CodigosProgramaticos', 'url'=>array('create')),
	array('label'=>'Manage CodigosProgramaticos', 'url'=>array('admin')),
);
?>

<h1>Codigos Programaticoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
