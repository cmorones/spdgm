<?php
/* @var $this SiauCpController */
/* @var $model SiauCp */

$this->breadcrumbs=array(
	'Siau Cps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SiauCp', 'url'=>array('index')),
	array('label'=>'Manage SiauCp', 'url'=>array('admin')),
);
?>

<h1>Create SiauCp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>