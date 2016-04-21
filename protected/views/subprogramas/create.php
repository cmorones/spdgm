<?php
/* @var $this SubprogramasController */
/* @var $model Subprogramas */



$this->menu=array(
	//array('label'=>'List Subprogramas', 'url'=>array('index')),
	array('label'=>'Administrar Subprogramas', 'url'=>array('admin')),
);
?>

<h3>Agregar Subprogramas</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>