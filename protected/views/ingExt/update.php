<?php
/* @var $this IngExtController */
/* @var $model IngExt */

/*$this->breadcrumbs=array(
	'Ing Exts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IngExt', 'url'=>array('index')),
	array('label'=>'Create IngExt', 'url'=>array('create')),
	array('label'=>'View IngExt', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IngExt', 'url'=>array('admin')),
);*/
?>


<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'banderas'=>$banderas,
	'tipo'=>$tipo,
	'ejercicio'=>$ejercicio,
	)); ?>