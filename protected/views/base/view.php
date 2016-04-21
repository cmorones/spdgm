<?php
/* @var $this BaseController */
/* @var $model base */

$this->breadcrumbs=array(
	'Bases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List base', 'url'=>array('index')),
	array('label'=>'Create base', 'url'=>array('create')),
	array('label'=>'Update base', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete base', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage base', 'url'=>array('admin')),
);
?>

<h1>View base #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'folio',
		'subprog',
		'area',
		'factura',
		'importe',
		'numerocheque',
		'concepto',
		'cantidades',
		'partida',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'detalle',
		'bandera',
		'fecha_ingreso',
		'cladgam',
		'id_periodo',
		'proveedor',
		'rfc',
		'registro_pago',
		'validado',
		'tipo_prov',
		'tipo_op',
		'id_fiscal',
		'recidencia',
		'nacionalidad',
		'iva',
		'subtotal',
		'iva_ret',
		'isr_ret',
		'tasa',
	),
)); ?>
