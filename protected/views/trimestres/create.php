<?php
/* @var $this TrimestresController */
/* @var $model Trimestres */



$this->menu=array(
	//array('label'=>'List Trimestres', 'url'=>array('index')),
	array('label'=>'Administrar Trimestres', 'url'=>array('admin')),
);
?>

<h3>Agregar Trimestres</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>