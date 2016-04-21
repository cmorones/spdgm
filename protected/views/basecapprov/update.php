<?php
/* @var $this BasecapprovController */
/* @var $model Basecapprov */

$this->breadcrumbs=array(
	'Basecapprovs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Basecapprov', 'url'=>array('index')),
	array('label'=>'Create Basecapprov', 'url'=>array('create')),
	array('label'=>'View Basecapprov', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Basecapprov', 'url'=>array('admin')),
);
?>

<h1>Update Basecapprov <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>