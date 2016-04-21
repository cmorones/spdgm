<?php
/* @var $this ClasifController */
/* @var $model Clasif */

$this->breadcrumbs=array(
	'Clasifs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Clasif', 'url'=>array('index')),
	array('label'=>'Agregar', 'url'=>array('create')),
	//array('label'=>'View Clasif', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>