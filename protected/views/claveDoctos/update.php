<?php
/* @var $this ClaveDoctosController */
/* @var $model ClaveDoctos */

/*$this->breadcrumbs=array(
	'Clave Doctoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	//array('label'=>'List ClaveDoctos', 'url'=>array('index')),
	array('label'=>'Agregar Clave de Documento', 'url'=>array('create')),
	//array('label'=>'Detalle Clave de Documento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Clave de Documento', 'url'=>array('admin')),

);
?>

<h4>Modificar Clave de Documento</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>