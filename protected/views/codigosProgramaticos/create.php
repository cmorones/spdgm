<?php
/* @var $this CodigosProgramaticosController */
/* @var $model CodigosProgramaticos */

$this->breadcrumbs=array(
	'Codigos Programaticoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodigosProgramaticos', 'url'=>array('index')),
	array('label'=>'Manage CodigosProgramaticos', 'url'=>array('admin')),
);
?>

<h1>Create CodigosProgramaticos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>