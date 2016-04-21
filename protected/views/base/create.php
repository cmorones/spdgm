<?php
/* @var $this BaseController */
/* @var $model base */

$this->breadcrumbs=array(
	'Bases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List base', 'url'=>array('index')),
	array('label'=>'Manage base', 'url'=>array('admin')),
);
?>

<h1>Create base</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>