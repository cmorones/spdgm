<?php
/* @var $this CatAreasController */
/* @var $model CatAreas */

/*$this->breadcrumbs=array(
	'Cat Areases'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List CatAreas', 'url'=>array('index')),
	array('label'=>'Administras Áreas', 'url'=>array('admin')),
);
?>

<h4>Agregar Áreas</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>