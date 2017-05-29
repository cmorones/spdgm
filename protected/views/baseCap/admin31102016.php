<?php


Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Gastos ejercicio <?=$anio?></h4>



</div><!-- search-form -->
<div class="row-fluid">
  <div class="span6">
       <a href="<?php echo CController::createUrl('baseCap/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
       <a href="<?php echo CController::createUrl('baseCap/create/'.$id.''); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> + Agregar</a>
</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'base-cap-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'columns'=>array(
		//'fecha_ingreso',
		array('name'=>'fecha_ingreso',
        'header'=> 'fecha',
        'htmlOptions'=>array('style'=>'width: 50px;'),
       // 'value'=> '$data->product->model',
        ),
		array('name'=>'folio',
        'header'=> 'folio',
        'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
       // 'value'=> '$data->product->model',
        ),
			array(
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
        ),
		array('name'=>'importe',
        'header'=> 'importe',
        'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
        'value'=> 'number_format($data->importe,2)',
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
		array(
            'name'=>'partida',
            'value'=>'$data->Partida->codigo',
            'filter'=>Partidas::model()->options,
             'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
                    ),
        array('name'=>'factura',
        'header'=> 'factura',
        'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
       // 'value'=> '$data->product->model',
        ),
		//'fecha_contrarecibo',
		array('name'=>'fecha_contrarecibo',
        'header'=> 'f/recibo',
        'htmlOptions'=>array('style'=>'width: 30px;'),
       // 'value'=> '$data->product->model',
        ),
		//'no_contrarecibo',
		array('name'=>'no_contrarecibo',
        'header'=> 'recibo',
        'htmlOptions'=>array('style'=>'width: 40px;'),
       // 'value'=> '$data->product->model',
        ),
		'detalle',
		array(
            'name'=>'bandera',
            'value'=>'$data->Banderas->nombre',
            'filter'=>Banderas::model()->options2,
                    ),
        array(
            'header' => 'Poliza',
            'class'=>'CButtonColumn',
            'template'=>'{confirmar}',
            'buttons'=>array(

                'confirmar'=>array
                (
                'label'=>'entrada',
                'imageUrl'=>Yii::app()->request->baseUrl.'/images/editar.png',
                'url'=>'yii::app()->createUrl("baseCap/poliza",array("id"=>$data->id))',
                ),
            ),

        ),
		
		
	/*	array(
            'name'=>'id_proveedor',
            'value'=>'$data->Proveedores->nombre',
            'filter'=>Proveedores::model()->options,
                    ),*/
	
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<bR>
	<br>