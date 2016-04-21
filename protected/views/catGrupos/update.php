<?php
/* @var $this CatGruposController */
/* @var $model CatGrupos */

$this->breadcrumbs=array(
	'Cat Gruposes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CatGrupos', 'url'=>array('index')),
	array('label'=>'Create CatGrupos', 'url'=>array('create')),
	array('label'=>'View CatGrupos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CatGrupos', 'url'=>array('admin')),
);
?>

<h1>Update CatGrupos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>