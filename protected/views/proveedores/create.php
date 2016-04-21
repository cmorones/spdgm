<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List Proveedores', 'url'=>array('index')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>