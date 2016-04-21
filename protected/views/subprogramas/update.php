<?php
/* @var $this SubprogramasController */
/* @var $model Subprogramas */


$this->menu=array(
//array('label'=>'List Subprogramas', 'url'=>array('index')),
	array('label'=>'Agregar Subprogramas', 'url'=>array('create')),
	array('label'=>'Detalle Subprogramas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Subprogramas', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>