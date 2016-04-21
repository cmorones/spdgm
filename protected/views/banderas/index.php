<?php
/* @var $this BanderasController */
/* @var $dataProvider CActiveDataProvider */


$this->menu=array(
	array('label'=>'Create Banderas', 'url'=>array('create')),
	array('label'=>'Manage Banderas', 'url'=>array('admin')),
);
?>

<h1>Banderas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
