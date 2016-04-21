<?php
/* @var $this ClaveDoctosController */
/* @var $model ClaveDoctos */

/*$this->breadcrumbs=array(
	'Clave Doctoses'=>array('index'),
	'Create',
); */

$this->menu=array(
	//array('label'=>'List ClaveDoctos', 'url'=>array('index')),
	array('label'=>'Administrar Clave de Documentos', 'url'=>array('admin')),
);
?>

<h4>Agregar Clave</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>