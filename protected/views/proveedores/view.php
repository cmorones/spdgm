<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	//array('label'=>'List Proveedores', 'url'=>array('index')),
	array('label'=>'Agregar Proveedores', 'url'=>array('create')),
	array('label'=>'Modificar Proveedores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proveedores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de proveedor
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'domicilio',
		'colonia',
		'telefono',
		'codigo',
		'rfc',
		'curp',
		'entidad',
		'actividad',
	),
)); ?>
</div>
