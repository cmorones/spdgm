<?php 
$this->menu=array(
	//array('label'=>'List Trimestres', 'url'=>array('index')),
	array('label'=>'Agregar Ejercicios', 'url'=>array('create')),
);

?>

<h2>Administrar Ejercicios</h2>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cat-ejercicio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nombre',
		//'estado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		    'buttons'=>array
		    (
		        'borrar' => array
		        (
		            'label'=>'',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/incorrecto.png',
		            'url'=>'Yii::app()->createUrl("ap1Ind1/borrar", array("id"=>$data->id))',
		            'options' => array(
		            'confirm'=>'Estas seguro de eliminar?',
		            ),
		        ),
		),
	),
	),
)); ?>
