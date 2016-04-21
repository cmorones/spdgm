<?php
/* @var $this BanderasController */
/* @var $model Banderas */

/*$this->breadcrumbs=array(
	'Banderases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
//	array('label'=>'List Banderas', 'url'=>array('index')),
	array('label'=>'Agregar Banderas', 'url'=>array('create')),
//	array('label'=>'Detalle Banderas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Banderas', 'url'=>array('admin')),
);
?>

<h4>Modificar Banderas</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>