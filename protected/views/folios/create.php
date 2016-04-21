<?php
/* @var $this FoliosController */
/* @var $model Folios */

$this->breadcrumbs=array(
	'Folioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Folios', 'url'=>array('index')),
	array('label'=>'Manage Folios', 'url'=>array('admin')),
);
?>

<h1>Create Folios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>