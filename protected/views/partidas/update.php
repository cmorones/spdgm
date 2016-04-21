<?php
/* @var $this PartidasController */
/* @var $model Partidas */

/*$this->breadcrumbs=array(
	'Partidases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	//array('label'=>'List Partidas', 'url'=>array('index')),
	array('label'=>'Agregar Partidas', 'url'=>array('create')),
	array('label'=>'Administrar Partidas', 'url'=>array('admin')),
);
?>

<h4>Modificar Partida</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>