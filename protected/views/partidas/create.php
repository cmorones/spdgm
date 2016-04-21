<?php
/* @var $this PartidasController */
/* @var $model Partidas */

/*$this->breadcrumbs=array(
	'Partidases'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List Partidas', 'url'=>array('index')),
	array('label'=>'Administrar Partidas', 'url'=>array('admin')),
);
?>

<h4>Agregar Partidas</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>