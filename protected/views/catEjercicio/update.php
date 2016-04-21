<?php
/* @var $this CatEjercicioController */
/* @var $model CatEjercicio */


$this->menu=array(
	//array('label'=>'List CatEjercicio', 'url'=>array('index')),
	//array('label'=>'Create CatEjercicio', 'url'=>array('create')),
	//array('label'=>'View CatEjercicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Ejercicios', 'url'=>array('admin')),
);
?>

<h1>Modificar Ejercicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>