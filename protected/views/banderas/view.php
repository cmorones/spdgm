<?php
/* @var $this BanderasController */
/* @var $model Banderas */

/*$this->breadcrumbs=array(
	'Banderases'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	//array('label'=>'List Banderas', 'url'=>array('index')),
	array('label'=>'Agregar Banderas', 'url'=>array('create')),
	array('label'=>'Modificar Banderas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Banderas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Banderas', 'url'=>array('admin')),
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de Banderas
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'nombre',
		'status',
		'ingext',
	),
)); ?>
</div>
