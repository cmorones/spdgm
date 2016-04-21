<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */

/*$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	//array('label'=>'Listar Presupuesto', 'url'=>array('index')),
	//array('label'=>'Crear nuevo registro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#presupuesto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Administracion de  Presupuesto</h4>



</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presupuesto-grids',
	'dataProvider'=>$model->search3(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'grupo',
            'value'=>'$data->Grupo->codigo',
            'htmlOptions'=>array('style'=>'width: 10px;  text-align:center;'),
                    ),
		array(
            'name'=>'subprog',
            'header'=> 'Subprog',
            'value'=>'$data->Subprog->alias',
            'filter'=>Subprogramas::model()->options,
            'htmlOptions'=>array('style'=>'width: 10px;  text-align:center;'),
                    ),
		/*array('name'=>'partida',
      //  'header'=> 'fecha',
        'htmlOptions'=>array('style'=>'width: 10px;'),
       // 'value'=> '$data->product->model',
        ),*/
		array(
            'name'=>'partida',
            'value'=>'$data->Partida->codigo',
            'filter'=>Partidas::model()->options,
            'htmlOptions'=>array('style'=>'width: 10px;  text-align:center;'),
                    ),
		
		array(
            'name'=>'tipo',
            'value'=>'$data->Tipo->nombre',
            'filter'=>Tipo::model()->options,
             'htmlOptions'=>array('style'=>'width: 15px;  text-align:center;'),
                    ),
		array(
            'name'=>'area',
            'value'=>'$data->Area->id',
            'filter'=>CatAreas::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		array('name'=>'presupuesto',
        'header'=> 'presupuesto',
        'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
        'value'=> 'number_format($data->presupuesto,2)',
       // 'value'=> '$data->product->model',
        ),

        array(
            'name'=>'id_periodo',
            'value'=>'$data->Ejercicio->nombre',
            'filter'=>CatEjercicio::model()->options,
             'htmlOptions'=>array('style'=>'width: 15px;  text-align:center;'),
                    ),

         array(
            'name'=>'id_trimestre',
            'value'=>'$data->Trimestres->nombre',
            'filter'=>Trimestres::model()->options,
             'htmlOptions'=>array('style'=>'width: 15px;  text-align:center;'),
                    ),


		
		/*
		'area',
		'gasto',
		'disponible',
		'fecha_reg',
		'oficio',
		'id_p
		eriodo',
		*/

	array(
    'class'=>'CButtonColumn',
   
    
    ),
	),
)); ?>

