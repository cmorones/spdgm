<?php
/* @var $this ClaveDoctosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clave Doctoses',
);

$this->menu=array(
	array('label'=>'Create ClaveDoctos', 'url'=>array('create')),
	array('label'=>'Manage ClaveDoctos', 'url'=>array('admin')),
);
?>

<h1>Clave Doctoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
