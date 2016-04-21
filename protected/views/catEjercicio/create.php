<?php
/* @var $this CatEjercicioController */
/* @var $model CatEjercicio */


$this->menu=array(
	//array('label'=>'List CatEjercicio', 'url'=>array('index')),
	array('label'=>'Administrar Ejercicios', 'url'=>array('admin')),
);
?>

<h2>Agregar Ejercicio</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>