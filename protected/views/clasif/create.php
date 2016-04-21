<?php
/* @var $this ClasifController */
/* @var $model Clasif */



$this->menu=array(
//array('label'=>'List Clasif', 'url'=>array('index')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>