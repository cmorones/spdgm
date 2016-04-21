<?php
/* @var $this SubprogramasController */
/* @var $model Subprogramas */



$this->menu=array(
//	array('label'=>'List Subprogramas', 'url'=>array('index')),
	array('label'=>'Agregar Subprogramas', 'url'=>array('create')),
	array('label'=>'Modificar Subprogramas', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar Subprogramas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Subprogramas', 'url'=>array('admin')),
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de Subprogramas
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'nombre',
		'status',
		'alias',
		'alias2',
	),
)); ?>
</div>
