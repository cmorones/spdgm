<?php
/* @var $this IngExtController */
/* @var $model IngExt */

$this->menu=array(
	//array('label'=>'List IngExt', 'url'=>array('index')),
	array('label'=>'agregar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ing-ext-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<h4>Saldos Iniciales y Preasignación de Recursos</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ing-ext-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'id_bandera',
            'value'=>'$data->Banderas->nombre',
            'filter'=>Banderas::model()->options3,
                    ),
		'saldo_anterior',
		'cargos',
		'abonos',
		'saldo_actual',
		array(
            'name'=>'estado',
            'value'=>'$data->Estados->nombre',
            'filter'=>TipoIngext::model()->options,
                    ),
		array(
            'name'=>'id_ejercicio',
            'value'=>'$data->Ejercicio->nombre',
            'filter'=>CatEjercicio::model()->options,
                    ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
