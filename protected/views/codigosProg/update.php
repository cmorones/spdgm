<?php
/* @var $this CodigosProgController */
/* @var $model CodigosProg */


$this->menu=array(
	//array('label'=>'List CodigosProg', 'url'=>array('index')),
	//array('label'=>'Create CodigosProg', 'url'=>array('create')),
	//array('label'=>'View CodigosProg', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Adminisrar Codigos Programaticos', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>