<?php
/* @var $this SiauCpController */
/* @var $model SiauCp */

$this->breadcrumbs=array(
	'Siau Cps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SiauCp', 'url'=>array('index')),
	array('label'=>'Create SiauCp', 'url'=>array('create')),
	array('label'=>'View SiauCp', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SiauCp', 'url'=>array('admin')),
);
?>

<h1>Update SiauCp <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>