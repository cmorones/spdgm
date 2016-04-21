<?php
/* @var $this ClaveDoctosController */
/* @var $model ClaveDoctos */

/*$this->breadcrumbs=array(
	'Clave Doctoses'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	//array('label'=>'List ClaveDoctos', 'url'=>array('index')),
	array('label'=>'Agregar Clave de Documento', 'url'=>array('create')),
	array('label'=>'Modificar Clave de Documento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Clave de Documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Clave de Documento', 'url'=>array('admin')),
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de Documento
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'nombre',
		'detalle',
	),
)); ?>
</div>
