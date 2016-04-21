<?php


$this->menu=array(
	array('label'=>'Agregar ', 'url'=>array('create')),
	array('label'=>'Administrar ', 'url'=>array('admin')),
);
?>

<h3>Clasificacion en Libro Folios</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
