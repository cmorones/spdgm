<?php
/* @var $this LibroFoliosController */
/* @var $model LibroFolios */

/*$this->breadcrumbs=array(
	'Libro Folioses'=>array('index'),
	$model->id,
);*/

$this->menu=array(
//	array('label'=>'List LibroFolios', 'url'=>array('index')),
	array('label'=>'Agregar Folios', 'url'=>array('create')),
	array('label'=>'Modificar Folios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Folios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Folios', 'url'=>array('admin')),
);
?>

<h3>Detalle de folio</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'folio',
		'fecha_ing',
		'factura',
		'importe',
		'numerocheque',
		'partida',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'detalle',
		'id_proveedor',
		'clasif',
		'tipo_docto',
		'bandera',
	),
)); ?>
