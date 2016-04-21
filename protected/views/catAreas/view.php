<?php
/* @var $this CatAreasController */
/* @var $model CatAreas */


/*$this->menu=array(
	//array('label'=>'List CatAreas', 'url'=>array('index')),
	array('label'=>'Agregar Áreas', 'url'=>array('create')),
	array('label'=>'Modificar Áreas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Áreas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Áreas', 'url'=>array('admin')),
);*/
?>

<div class="operation">
<?php echo CHtml::link('Atras', array('admin'), array('class'=>'btnback '));?>
<?php echo CHtml::link('Modificar', array('update' ,'id'=>$model->id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->id), array('class'=>'btndelete', 'onclick'=>"return confirm('Estas seguro de eliminar?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Detalle de Área
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'nombre',
	),
)); ?>
</div>
