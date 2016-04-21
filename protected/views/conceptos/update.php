<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */


$this->menu=array(
//	array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Agregar Conceptos', 'url'=>array('create')),
	//array('label'=>'Detalle Conceptos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Conceptos', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>