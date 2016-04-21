<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */

/*$this->breadcrumbs=array(
	'Conceptoses'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Administrar Conceptos', 'url'=>array('admin')),
);
?>

<h3>Agregar Conceptos</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>