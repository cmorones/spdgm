<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */



$this->menu=array(
	//array('label'=>'List Conceptos', 'url'=>array('index')),
	array('label'=>'Agregar Conceptos', 'url'=>array('create')),
	array('label'=>'Modificar Conceptos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Conceptos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Conceptos', 'url'=>array('admin')),
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de Concepto
 </div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'nombre',
	),
)); ?>

</div>
