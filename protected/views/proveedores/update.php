<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	//array('label'=>'List Proveedores', 'url'=>array('index')),
	array('label'=>'Agregar Proveedores', 'url'=>array('create')),
	array('label'=>'Detalle Proveedores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<h4>Modificar Proveedores</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>