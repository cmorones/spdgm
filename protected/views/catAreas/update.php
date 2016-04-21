<?php
/* @var $this CatAreasController */
/* @var $model CatAreas */



$this->menu=array(
	//array('label'=>'List CatAreas', 'url'=>array('index')),
	array('label'=>'Agregar Areas', 'url'=>array('create')),
	array('label'=>'Detalle Areas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Areas', 'url'=>array('admin')),
);
?>

<h3>Modificar Areas</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>