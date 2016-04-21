<?php
/* @var $this FoliosController */
/* @var $model Folios */

$this->breadcrumbs=array(
	'Folioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Folios', 'url'=>array('index')),
	array('label'=>'Create Folios', 'url'=>array('create')),
	array('label'=>'Update Folios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Folios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Folios', 'url'=>array('admin')),
);
?>

<h1>View Folios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'folio',
		'fecha',
		'clave_doc',
		'id_area',
		'importe',
		'fecha_cr',
		'no_cr',
		'no_cheque',
		'ingresos',
		'partida',
		'factura',
		'id_proveedor',
		'observaciones',
	),
)); ?>
