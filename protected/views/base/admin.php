<?php
error_reporting(E_ALL ^ E_NOTICE);

Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Gastos DIOT  ejercicio <?=$anio?></h4>



</div><!-- search-form -->
<div class="row-fluid">
  <div class="span6">
       <a href="<?php echo CController::createUrl('base/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'base-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'columns'=>array(
		/*'id',
		'folio',
		'subprog',
		'area',
		'factura',
		'importe',
	
		'numerocheque',
		'concepto',
		'cantidades',
		'partida',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'detalle',
		'bandera',
		'fecha_ingreso',
		'cladgam',
		'id_periodo',
		'proveedor',
		'rfc',
		'registro_pago',
		'validado',*/
		'fecha_ingreso',
		'folio',
		array('name'=>'proveedor',
        'header'=> 'proveedor',
        'htmlOptions'=>array('style'=>'width: 200px;'),
       // 'value'=> '$data->product->model',
        ),
		'rfc',
		//'tipo_prov',
		array(
            'name'=>'tipo_prov',
            'value'=>'$data->tipoProv->nombre',
            'filter'=>CatProv::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		array(
            'name'=>'tipo_op',
            'value'=>'$data->tipoOp->nombre',
            'filter'=>CatOp::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		//'tipo_op',
		//'id_fiscal',
		//'recidencia',
		//'nacionalidad',
        'importe_bruto',
		'iva',
		'subtotal',
		'iva_ret',
		'isr_ret',
		array(
            'name'=>'tasa',
            'value'=>'$data->tipoTasa->nombre',
            //'filter'=>CatTasa::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		array('name'=>'importe',
        'header'=> 'Total',
       // 'htmlOptions'=>array('style'=>'width: 200px;'),
       // 'value'=> '$data->product->model',
        ),
        array(
            'name'=>'partida',
            'value'=>'$data->Partida->codigo',
            'filter'=>Partidas::model()->options,
             'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
                    ),
array(
            'name'=>'bandera',
            'value'=>'$data->Banderas->nombre',
            'filter'=>Banderas::model()->options2,
                    ),
		
			array(
            'class'=>'CButtonColumn',
            'template'=>'{Actualizar}',
            'buttons'=>array
            (
                'Actualizar' => array
                (
                    'label'=>'',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.png',
                    'url'=>'Yii::app()->createUrl("base/update", array("id"=>$data->id))',
                  /*  'options' => array(
                   // 'confirm'=>'Estas seguro de eliminar?',
                    ),*/
                ),
        ),
    ),
	),
)); ?>

<br>
<br>
<br>
