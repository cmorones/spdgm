<?php
/* @var $this CatalogoCuentasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Catalogo Cuentases',
);

$this->menu=array(
	array('label'=>'Create CatalogoCuentas', 'url'=>array('create')),
	array('label'=>'Manage CatalogoCuentas', 'url'=>array('admin')),
);
?>

<h1>Catalogo Cuentases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
