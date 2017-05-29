<?php


Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];
?>
<h4>Administrar Pagos Pagados ejercicio <?=$anio?></h4>


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
       <a href="<?php echo CController::createUrl('pagos/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
      
</div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pagos-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'afterAjaxUpdate' => 'reinstallDatePicker', 
	'columns'=>array(
		//'id',
		//'fecha_contrarecibo',
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
		'no_contrarecibo',
		'folio',
		'proveedor',
		'detalle',
		'importe',
		array(
		'header' => 'Pagado',
		'type' => 'html',
		'value' => 'Chtml::image($data->imagen)',
		), 

		/*'tipo_persona',
		/*
		'pagado',
		'fecha_recibo',
		'fecha_pago',
		'cheque',
		'factura',
		'fecha_contrarecibo',
		'no_contrarecibo',
		'fecha_cheque',
		'banco',
		'depto',
		'id_periodo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
