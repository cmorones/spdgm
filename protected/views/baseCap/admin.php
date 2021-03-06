<?php


Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Gastos ejercicio <?=$anio?></h4>

    <?php

/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
Yii::app()->clientScript->registerScript('re-install-date-picker', "


function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy/mm/dd'}));
    $('#datepicker_for_due_date2').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['es'],{'dateFormat':'yy/mm/dd'}));
}
");
?>

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
    'afterAjaxUpdate' => 'reinstallDatePicker', 
	'columns'=>array(
		//'fecha_ingreso',
		/*array('name'=>'fecha_ingreso',
        'header'=> 'fecha',
        'htmlOptions'=>array('style'=>'width: 50px;'),
       // 'value'=> '$data->product->model',
        ),*/
        array(
            'name'=>'fecha_ingreso',
            //'value'=>'fecha_ingreso',
            'filter' =>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha_ingreso', 
                'language' => 'es',
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '15',
                    'style'=>'width: 50px',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
            ), 
            true), 
            
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
		/*array('name'=>'fecha_contrarecibo',
        'header'=> 'f/recibo',
        'htmlOptions'=>array('style'=>'width: 30px;'),
       // 'value'=> '$data->product->model',
        ),*/
          array(
            'name'=>'fecha_contrarecibo',
             'header'=> 'f/recibo',
            //'value'=>'fecha_ingreso',
            'filter' =>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha_contrarecibo', 
                'language' => 'es',
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date2',
                    'size' => '15',
                    'style'=>'width: 50px',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
            ), 
            true), 
            
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