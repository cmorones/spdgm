

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
 <div class="portlet-title">Modificar Gastos ejercicio <?=$anio?>
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'base-cap-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>



	<div class="row">

				<div class="row-left">
		<?php 


		

		echo $form->labelEx($model,'fecha_ingreso'); ?>
		<?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_ingreso',


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
                                'id'=>'fecha_ing',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
		<?php echo $form->error($model,'fecha_ingreso'); ?>
		</div>

			<div class="row-left">
			<?php echo $form->labelEx($model, 'folio'); ?>
						<?php //echo $form->dropDownList($model, 'concepto', $concepto,  array('class'=>'span12'));?>

								<?php 

		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'folio',
    'id'=>'libro-folio',
   // 'name'=>'country_single',
    'source'=>$this->createUrl('request/diarioFolios'),
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
            $('#numerocheque').val(ui.item.numerocheque);
            $('#fecha_contrarecibo').val(ui.item.fecha_contrarecibo);
            $('#no_contrarecibo').val(ui.item.no_contrarecibo);
           
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

		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model,'factura',array('id'=>'factura')); ?>
		<?php echo $form->error($model,'factura'); ?>
	
		</div>
	
		
		<div class="row-left">
		
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
        'style'=>'width:300px',
        //'style'=>'height:20px;',
    ),
));
						 ?>
 						<?php echo $form->error($model, 'proveedor'); ?>
		
	</div>
	</div>

	<div class="row">
		
		<div class="row-right">
			<?php echo $form->labelEx($model, 'cladgam'); 
                    	//$var = Yii::app()->user->setFlash('success', 'hola mundo');
                    	?>

						<?php echo $form->dropDownList($model, 'cladgam', $docto,  array(
						'id' => 'tipo_docto',
						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('baseCap/document'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )


                    
	                    
						//'onchange'=>Yii::app()->user->setFlash('success', $docto)
				

						));?>
 						<?php echo $form->error($model, 'cladgam'); ?>	
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($model,'subprog'); ?>
		<?php echo $form->dropDownList($model, 'subprog', $subprog,  array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('baseCap/subprog'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )


						));?>
		<?php echo $form->error($model,'subprog'); ?>
		</div>
		
		<div class="row-right">

			<?php echo $form->labelEx($model, 'area'); ?>
						<?php echo $form->dropDownList($model, 'area', $areas, array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('baseCap/area'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )


                    
	                    
						//'onchange'=>Yii::app()->user->setFlash('success', $docto)
				

						));?>
 						<?php echo $form->error($model, 'area'); ?>
		
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($model,'rfc'); ?>
		<?php echo $form->textField($model,'rfc'); ?>
		<?php echo $form->error($model,'rfc'); ?>
		</div>
		
		
	</div>




		<div class="row">

		<div class="row-left">
			        <?php echo $form->labelEx($model, 'partida'); ?>
						<?php echo $form->dropDownList($model, 'partida', $partidas,  array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('baseCap/partida'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )

						));?>
				
 						<?php echo $form->error($model, 'partida'); ?>
		</div>

		<div class="row-right">
				<?php echo $form->labelEx($model, 'bandera'); ?>
						<?php echo $form->dropDownList($model, 'bandera', $banderas, array(
						'id' => 'bandera'));?>
 						<?php echo $form->error($model, 'bandera'); ?>
		</div>
		<div class="row-left">
			<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe',array('id'=>'importe')); ?>
		<?php echo $form->error($model,'importe'); ?>
		</div>
		
		<div class="row-right">
			<?php echo $form->labelEx($model,'numerocheque'); ?>
		<?php echo $form->textField($model,'numerocheque',array('id'=>'numerocheque')); ?>
		<?php echo $form->error($model,'numerocheque'); ?>
		</div>

		
	</div>


	
	<div class="row">
		
	

			<div class="row-left">
			<?php echo $form->labelEx($model, 'concepto'); ?>
						<?php //echo $form->dropDownList($model, 'concepto', $concepto,  array('class'=>'span12'));?>

								<?php 

		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'htmlOptions'=>array(
        'size'=>'40',
        'style' => 'text-transform: uppercase',
    ),
    'attribute'=>'concepto',
    'id'=>'country-single',
   // 'name'=>'country_single',
    'source'=>$this->createUrl('request/suggestCountry'),
    
));
								


?>
 						<?php echo $form->error($model, 'concepto'); ?>
		</div>
			<div class="row-right">
			<?php echo $form->labelEx($model,'cantidades'); ?>
		<?php echo $form->textField($model,'cantidades'); ?>
		<?php echo $form->error($model,'cantidades'); ?>
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
		<div class="row-right">
			<?php echo $form->labelEx($model,'no_contrarecibo'); ?>
		<?php echo $form->textField($model,'no_contrarecibo',array('id'=>'no_contrarecibo')); ?>
		<?php echo $form->error($model,'no_contrarecibo'); ?>
		</div>

	</div>


    <div class="row">
		
	
	</div>


	



	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle', array('id'=>'detalle','class'=>'row','rows'=>"2", 'cols'=>"230")); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	


		



	<div class="row">
		
 		<div class="row-right">
				<?php echo $form->labelEx($model, 'registro_pago'); ?>
						<?php echo $form->dropDownList($model, 'registro_pago', $pago);?>
 						<?php echo $form->error($model, 'registro_pago'); ?>
		</div>

		 <div class="row-right">
                <?php echo $form->labelEx($model, 'clasificacion'); ?>
                <?php echo $form->dropDownList($model, 'clasificacion', $clasif, array(
                        'id' => 'clasificacion'));?>
                <?php echo $form->error($model, 'clasificacion'); ?>
        </div>
	</div>

	<div class="row buttons">
			<?php 

            if($model->validado == 0)
			echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
			
		<?php //echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>