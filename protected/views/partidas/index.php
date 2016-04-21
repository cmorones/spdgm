<?php
/* @var $this PartidasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Partidases',
);

$this->menu=array(
	array('label'=>'Create Partidas', 'url'=>array('create')),
	array('label'=>'Manage Partidas', 'url'=>array('admin')),
);
?>

<h1>Partidases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
