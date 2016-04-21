<?php
/* @var $this BanderasController */
/* @var $model Banderas */

/*$this->breadcrumbs=array(
	'Banderases'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List Banderas', 'url'=>array('index')),
	array('label'=>'Administrar Banderas', 'url'=>array('admin')),
);
?>

<h4>Agregar Banderas</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>