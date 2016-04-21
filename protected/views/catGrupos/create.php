<?php
/* @var $this CatGruposController */
/* @var $model CatGrupos */

$this->breadcrumbs=array(
	'Cat Gruposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CatGrupos', 'url'=>array('index')),
	array('label'=>'Manage CatGrupos', 'url'=>array('admin')),
);
?>

<h1>Create CatGrupos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>