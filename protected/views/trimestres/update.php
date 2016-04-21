<?php
/* @var $this TrimestresController */
/* @var $model Trimestres */



$this->menu=array(
	//array('label'=>'List Trimestres', 'url'=>array('index')),
	array('label'=>'Aregar Trimestres', 'url'=>array('create')),
	//array('label'=>'View Trimestres', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Trimestres', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>