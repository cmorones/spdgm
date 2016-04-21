<?php
/* @var $this CodigosProgramaticosController */
/* @var $model CodigosProgramaticos */

$this->breadcrumbs=array(
	'Codigos Programaticoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodigosProgramaticos', 'url'=>array('index')),
	array('label'=>'Create CodigosProgramaticos', 'url'=>array('create')),
	array('label'=>'View CodigosProgramaticos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CodigosProgramaticos', 'url'=>array('admin')),
);
?>

<h1>Update CodigosProgramaticos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>