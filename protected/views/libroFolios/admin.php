<?php


Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Folios Ejercicio <?=$anio?></h4>

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
       <a href="<?php echo CController::createUrl('libroFolios/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
       <a href="<?php echo CController::createUrl('libroFolios/create/'.$id.''); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> + Agregar</a>
</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'libro-folios-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
  'afterAjaxUpdate' => 'reinstallDatePicker', 
	'columns'=>array(
	

        array(
            'name'=>'fecha_ing',
             'header'=> 'fecha',
            //'value'=>'fecha_ingreso',
            'filter' =>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha_ing', 
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
		//'id',
		array('name'=>'folio',
        'header'=> 'folio',
        'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
       // 'value'=> '$data->product->model',
        ),
			array(
            'name'=>'tipo_docto',
            'value'=>'$data->ClaveDoctos->nombre',
            'filter'=>ClaveDoctos::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		//'fecha_ing',
		//'factura',
		array('name'=>'factura',
        'header'=> 'factura',
        'htmlOptions'=>array('style'=>'width: 20px;'),
       // 'value'=> '$data->product->model',
        ),
		//'importe',
		//'numerocheque',
		//'partida',
		//'fecha_contrarecibo',
		//'no_contrarecibo',
		//'detalle',
		//'id_proveedor',
		array('name'=>'id_proveedor',
        'header'=> 'proveedor',
        'htmlOptions'=>array('style'=>'width: 200px;'),
       // 'value'=> '$data->product->model',
        ),
        array('name'=>'importe',
        'header'=> 'importe',
        'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
        'value'=> 'number_format($data->importe,2)',
       // 'value'=> '$data->product->model',
        ),
        //'partida',
        array('name'=>'partida',
        'header'=> 'partida',
        'htmlOptions'=>array('style'=>'width: 20px;'),
       // 'value'=> '$data->product->model',
        ),
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
        'htmlOptions'=>array('style'=>'width: 50px;'),
       // 'value'=> '$data->product->model',
        ),
        'detalle',
		array(
            'name'=>'clasif',
            'value'=>'$data->Clasif->nombre',
            'filter'=>Clasif::model()->options,
                    ),
				
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
