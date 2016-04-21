<?php


Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<?php
/* @var $this BaseCapController */
/* @var $model BaseCap */

/*$this->breadcrumbs=array(
	'Base Caps'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#base-cap-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Conciliacion de Gastos <?=$anio?></h4>




</div><!-- search-form -->
<div class="span3"></div>
<div class="span6">
     
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'base-cap-grid',
	'dataProvider'=>$model->search3($id),
	'filter'=>$model,
    'selectionChanged'=>'updateEditForm',
	'columns'=>array(
		//'fecha_ingreso',
		array('name'=>'fecha_ingreso',
        'header'=> 'fecha',
        'htmlOptions'=>array('style'=>'width: 50px;'),
       // 'value'=> '$data->product->model',
        ),
		array('name'=>'folio',
        'header'=> 'folio',
        'htmlOptions'=>array('style'=>'width: 30px;  text-align:center; text-align:center;'),
       // 'value'=> '$data->product->model',
        ),
       
		/*	array(
            'name'=>'cladgam',
            'value'=>'$data->ClaveDoctos->nombre',
            'filter'=>ClaveDoctos::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		array(
            'name'=>'subprog',
            'value'=>'$data->Subprog->id',
            'filter'=>Subprogramas::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		array(
            'name'=>'area',
            'value'=>'$data->Area->id',
            'filter'=>CatAreas::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		array('name'=>'proveedor',
        'header'=> 'proveedor',
        'htmlOptions'=>array('style'=>'width: 200px;'),
       // 'value'=> '$data->product->model',
        ),*/
		array('name'=>'importe',
        'header'=> 'importe',
        'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
        'value'=> 'number_format($data->importe,2)',
       // 'value'=> '$data->product->model',
        ),
	//	'factura',
	//	'importe',
	//	'concepto',
		
	//	'numerocheque',
		/*array(
            'name'=>'concepto',
            'value'=>'$data->Conceptos->nombre',
            'filter'=>Conceptos::model()->options,
                    ),*/
	//	'cantidades',
	/*	array(
            'name'=>'partida',
            'value'=>'$data->Partida->codigo',
            'filter'=>Partidas::model()->options,
             'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
                    ),
		//'fecha_contrarecibo',
		array('name'=>'fecha_contrarecibo',
        'header'=> 'f/recibo',
        'htmlOptions'=>array('style'=>'width: 30px;'),
       // 'value'=> '$data->product->model',
        ),
		//'no_contrarecibo',
		*/array('name'=>'no_contrarecibo',
        'header'=> 'recibo',
        'htmlOptions'=>array('style'=>'width: 40px; text-align:center;'),
       // 'value'=> '$data->product->model',
        ),
       
         array(
        'header' => 'Conciliado',
        'type' => 'html',
        'value' => 'Chtml::image($data->imagen)',
        'htmlOptions'=>array('style'=>'width: 20px; text-align:center;'),
        ), 
		/*'detalle',
		array(
            'name'=>'bandera',
            'value'=>'$data->Banderas->nombre',
            'filter'=>Banderas::model()->options2,
                    ),
		
		
	/*	array(
            'name'=>'id_proveedor',
            'value'=>'$data->Proveedores->nombre',
            'filter'=>Proveedores::model()->options,
                    ),*/
	
		
	/*	array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>

</div>

    <?php echo $this->renderPartial('_form2', array(
        'model'=>$model,
        'docto'=>$docto,
        'concepto'=>$concepto,
        'subprog'=>$subprog,
        'areas'=>$areas,
        'conceptos'=>$conceptos,
        'partidas'=>$partidas,
        'banderas'=>$banderas,
        'proveedores'=>$proveedores,
        'ejercicio'=>$ejercicio,
        'pago'=>$pago,

        )); ?>