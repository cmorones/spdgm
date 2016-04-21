<?php
/* @var $this BasecapprovController */
/* @var $model Basecapprov */

$this->breadcrumbs=array(
	'Basecapprovs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Basecapprov', 'url'=>array('index')),
	array('label'=>'Manage Basecapprov', 'url'=>array('admin')),
);
?>

<h1>Create Basecapprov</h1>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'proveedores'=>$proveedores,
	)); ?>