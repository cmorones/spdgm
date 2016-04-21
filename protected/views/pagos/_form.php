<?php
/* @var $this PagosController */
/* @var $model Pagos */
/* @var $form CActiveForm */
?>

<div id='info' >
</div>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Pagos ejercicio <?=$anio?>
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pagos-form',
	'enableAjaxValidation'=>false,
)); ?>

		<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    
	<div class="row">
			<div class="row-left">
			<?php echo $form->labelEx($model, 'folio'); ?>
						<?php //echo $form->dropDownList($model, 'concepto', $concepto,  array('class'=>'span12'));?>

								<?php 

		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'folio',
    'id'=>'folio',
   // 'name'=>'country_single',
    'source'=>$this->createUrl('request/baseCap'),
    'options'=>array(
       // 'delay'=>300,
        //'minLength'=>2,
       // 'showAnim'=>'fold',
        'select'=>"js:function(event, ui) {
            $('#detalle').val(ui.item.detalle);
            $('#fecha_ing').val(ui.item.fecha_ing);
            $('#factura').val(ui.item.factura);
            $('#tipo_docto').val(ui.item.tipo_docto);
            $('#importe').val(ui.item.importe);
            $('#bandera').val(ui.item.bandera);
            $('#id_proveedor').val(ui.item.id_proveedor);
            $('#cheque').val(ui.item.numerocheque);
            $('#fecha_contrarecibo').val(ui.item.fecha_contrarecibo);
            $('#no_contrarecibo').val(ui.item.no_contrarecibo);
            $('#id_base').val(ui.item.id);
           
        }"
    ),
    'htmlOptions'=>array(
        'size'=>'40'
    ),
    
			));
								


			?>
 		<?php echo $form->error($model, 'folio'); ?>
		</div>

	   <div class="row-left">
            <?php echo $form->labelEx($model,'fecha_contrarecibo'); ?>
                            <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_contrarecibo',

                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => "$anio:$anio",
                                 'minDate' => "$anio-01-01",      // minimum date
                                 'maxDate' => "$anio-12-31",
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                'id'=>'fecha_contrarecibo',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model,'fecha_contrarecibo'); ?>
        </div>


			<div class="row-left">

		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model,'factura',array('id'=>'factura')); ?>
		<?php echo $form->error($model,'factura'); ?>
	
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'cheque'); ?>
		<?php echo $form->textField($model,'cheque',array('id'=>'cheque')); ?>
		<?php echo $form->error($model,'cheque'); ?>
		</div>
			<div class="row-left">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe',array('id'=>'importe')); ?>
		<?php echo $form->error($model,'importe'); ?>
		</div>
	</div>




			<div class="row">
		
		<?php echo $form->labelEx($model, 'proveedor'); ?>
	

						<?php 
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'proveedor',
    'id'=>'id_proveedor',
   // 'name'=>'country_multiple',
    'source'=>"js:function(request, response) {
        $.getJSON('".$this->createUrl('request/provs')."', {
            term: extractLast(request.term)
        }, response);
    }",
    'options'=>array(
        'delay'=>300,
        'minLength'=>2,
        'showAnim'=>'fold',
        'select'=>"js:function(event, ui) {
            var terms = split(this.value);
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push('');
            this.value = terms.join(', ');
            return false;
        }"
    ),
    'htmlOptions'=>array(
        'style'=>'width:600px',
        //'style'=>'height:20px;',
    ),
));
						 ?>
 						<?php echo $form->error($model, 'proveedor'); ?>
		
	</div>

	



	<div class="row">
	

            <div class="row-left">
        <?php echo $form->labelEx($model,'fecha_pago'); ?>
        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_pago',


                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => "$anio:2015",
                                 'minDate' => "$anio-01-01",      // minimum date
                                 'maxDate' => "2016-12-31",
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                'id'=>'fecha_ing',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
        <?php echo $form->error($model,'fecha_pago'); ?>
        </div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'no_contrarecibo'); ?>
		<?php echo $form->textField($model,'no_contrarecibo',array('id'=>'no_contrarecibo')); ?>
		<?php echo $form->error($model,'no_contrarecibo'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model,'fecha_cheque'); ?>
						    <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_cheque',

                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => "$anio:$anio",
                                 'minDate' => "$anio-01-01",      // minimum date
                                 'maxDate' => "$anio-12-31",
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                'id'=>'fecha_cheque',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_cheque'); ?>
	</div>
	<div class="row-right">
        <?php echo $form->labelEx($model, 'banco'); ?>
        <?php echo $form->dropDownList($model, 'banco', $bancos);?>
        <?php echo $form->error($model, 'banco'); ?>
    </div>

	<div class="row-right">
		<?php echo $form->labelEx($model,'depto'); ?>
		<?php echo $form->dropDownList($model, 'depto', $areas);?>
		<?php echo $form->error($model,'depto'); ?>
	</div>

  <div class="row">
        <?php echo $form->labelEx($model,'detalle'); ?>
        <?php echo $form->textArea($model,'detalle', array('id'=>'detalle','class'=>'row','rows'=>"2", 'cols'=>"230")); ?>
        <?php echo $form->error($model,'detalle'); ?>
    </div>

	</div>

	
	



	<div class="row">
  <div class="row-left">
        <?php echo $form->labelEx($model,'fecha_recibo'); ?>
        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_recibo',


                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => "$anio:$anio",
                                 'minDate' => "$anio-01-01",      // minimum date
                                 'maxDate' => "$anio-12-31",
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                //'id'=>'fecha_ing',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
        <?php echo $form->error($model,'fecha_recibo'); ?>
        </div>
	
		<div class="row-right">
		<?php echo $form->labelEx($model, 'tipo_persona'); ?>
		<?php echo $form->dropDownList($model, 'tipo_persona', array('falso' => 'Tipo','1' => 'Proveedor','2' => 'Acreedor'));?>
 		<?php echo $form->error($model, 'tipo_persona'); ?>
	</div>

   <div class="row-left">
                <?php echo $form->labelEx($model, 'clasificacion'); ?>
                        <?php echo $form->dropDownList($model, 'clasificacion', $clasificacion);?>
                        <?php echo $form->error($model, 'clasificacion'); ?>   
        </div>

	

	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'pagado'); ?>
        <?php echo $form->checkBox($model,'pagado',array('value'=>1, 'uncheckValue'=>2)); ?>
        <?php echo $form->error($model,'pagado'); ?>
    </div>

	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
        
    
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>