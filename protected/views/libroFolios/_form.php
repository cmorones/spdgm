<?php
/* @var $this LibroFoliosController */
/* @var $model LibroFolios */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
/*<![CDATA[*/

	function split(val) {
		return val.split(/,\s*/);
	}
	function extractLast(term) {
		return split(term).pop();
	}

	$("#info2").animate({opacity:1.0},5000).slideUp("slow");

/*]]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">

*/
</script>

<script>
$(document).ready(function(){
  
  $('#id_proveedor').focusout(function(){


  	
  	var str = $('#id_proveedor').val();
  	var tamano=str.length;
  	if(str.substring(tamano-2,tamano-1) == ',' ){
    var res = str.substring(0,tamano-2);
    $('#id_proveedor').val(res);
    //$('#id_proveedor').css("background-color","blue");
	}
	
    
    
    
  });
});
</script>
<?php if(Yii::app()->user->hasFlash('success')):?>
   
<div id='info2' class="alert alert-success">
<button class="close" type="button" data-dismiss="alert">×</button>
<strong> <?php echo Yii::app()->user->getFlash('success'); ?></strong>
</div>



<script type="text/javascript">
$("#info2").animate({opacity:1.0},10000).slideUp("slow");
</script>

<?php endif; ?>

<div id='info' >
 

</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Folios
 </div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'libro-folios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">
		<div class="row-left">
				<?php echo $form->labelEx($model,'fecha_ing'); ?>
						    <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_ing',

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

                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_ing'); ?>
		</div>
		<div class="row-right">
				<?php echo $form->labelEx($model,'folio'); ?>
					<?php echo $form->textField($model,'folio'); ?>
					<?php echo $form->error($model,'folio'); ?>	
		</div>
		<div class="row-left">
				<?php echo $form->labelEx($model,'factura'); ?>
						<?php echo $form->textField($model,'factura',array('class'=>'span8','size'=>80,'maxlength'=>64)); ?>
						<?php echo $form->error($model,'factura'); ?>
		</div>

			<div class="row-right">
				<?php echo $form->labelEx($model, 'tipo_docto'); ?>
						<?php echo $form->dropDownList($model, 'tipo_docto', $tipodoc);?>
 						<?php echo $form->error($model, 'tipo_docto'); ?>
		</div>
		
	</div>

		<div class="row">
		
		<?php echo $form->labelEx($model, 'id_proveedor'); ?>
	

			

						 		<?php 
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'id_proveedor',
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
						 
 						<?php echo $form->error($model, 'id_proveedor'); ?>
		
	</div>


	<div class="row">
	     <div class="row-right">
			<?php echo $form->labelEx($model,'partida'); ?>
						<?php echo $form->textField($model,'partida',array('class'=>'span8','size'=>80,'maxlength'=>64)); ?>
						<?php echo $form->error($model,'partida'); ?>
		</div>
 <div class="row-right">
				<?php echo $form->labelEx($model, 'bandera'); ?>
						<?php echo $form->dropDownList($model, 'bandera', $banderas);?>
 						<?php echo $form->error($model, 'bandera'); ?>
		</div>

		<div class="row-left">
			    <?php echo $form->labelEx($model,'importe'); ?>
					<?php echo $form->textField($model,'importe'); ?>
					<?php echo $form->error($model,'importe'); ?>	
		</div>   
	
		<div class="row-left">
					<?php echo $form->labelEx($model,'numerocheque'); ?>
					<?php echo $form->textField($model,'numerocheque'); ?>
					<?php echo $form->error($model,'numerocheque'); ?>
		</div>
		
	</div>

	<div class="row">	
	         

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
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_contrarecibo'); ?>
		</div>

			<div class="row-right">
					<?php echo $form->labelEx($model,'no_contrarecibo'); ?>
					<?php echo $form->textField($model,'no_contrarecibo'); ?>
					<?php echo $form->error($model,'no_contrarecibo'); ?>
		</div>
	

	     <div class="row-left">
				<?php echo $form->labelEx($model, 'clasif'); ?>
						<?php echo $form->dropDownList($model, 'clasif', $clasif);?>
 						<?php echo $form->error($model, 'clasif'); ?>	
		</div>
	</div>

	
				<div class="row">
                    
							<?php echo $form->labelEx($model,'detalle'); ?>
							<?php echo $form->textArea($model,'detalle', array('class'=>'span12','rows'=>"6", 'cols'=>"40")); ?>
							<?php echo $form->error($model,'detalle'); ?>
					
				</div>
		

					
	




		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php //echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>


<?php $this->endWidget(); ?>

</div><!-- 



form -->