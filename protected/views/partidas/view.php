<?php
/* @var $this PartidasController */
/* @var $model Partidas */

/*$this->breadcrumbs=array(
	'Partidases'=>array('index'),
	$model->id,
);*/

$this->menu=array(
//	array('label'=>'Detalle Partidas', 'url'=>array('index')),
	array('label'=>'Agregar Partidas', 'url'=>array('create')),
	array('label'=>'Modificar Partidas', 'url'=>array('update', 'id'=>$model->codigo)),
	array('label'=>'Delete Partidas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codigo),'confirm'=>'Estas seguro???')),
	array('label'=>'Administrar Partidas', 'url'=>array('admin')),
);
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de la partida
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'codigo',
		'descripcion',
	),
)); ?>

</div>
