<?php
/* @var $this FoliosController */
/* @var $model Folios */

$this->breadcrumbs=array(
	'Folioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Folios', 'url'=>array('index')),
	array('label'=>'Create Folios', 'url'=>array('create')),
	array('label'=>'View Folios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Folios', 'url'=>array('admin')),
);
?>

<h1>Update Folios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>