<?php
/* @var $this CodigosProgController */
/* @var $model CodigosProg */


$this->menu=array(
//	array('label'=>'List CodigosProg', 'url'=>array('index')),
	array('label'=>'Adminisrar Codigos Programaticos', 'url'=>array('admin')),
);
?>

<h1>Agregar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>