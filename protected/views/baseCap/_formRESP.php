<?php
/* @var $this BaseCapController */
/* @var $model BaseCap */
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

/*]]>*/
</script>

<div id='info' >
 

</div>

<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Gastos
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'base-cap-form',
	'enableAjaxValidation'=>true,
)); ?>



	

		<div class="row">
   
		<div class="row-left">
			<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
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
                                'yearRange' => '2013:2013'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_ingreso'); ?>
			<span class="status">&nbsp;</span>
		</div>
		<div class="row-right">
		<?php echo $form->labelEx($model, 'cladgam'); 
                    	//$var = Yii::app()->user->setFlash('success', 'hola mundo');
                    	?>

						<?php echo $form->dropDownList($model, 'cladgam', $docto,  array(

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
	
		
		
	</div>

	<div class="row">
					<div class="row-left">
						<?php echo $form->labelEx($model,'folio'); ?>
						<?php echo $form->textField($model,'folio'); ?>
						<?php echo $form->error($model,'folio'); ?>
					</div>
					<div class="row-right">
                    	<?php echo $form->labelEx($model, 'subprog'); ?>
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


                    
	                    
						//'onchange'=>Yii::app()->user->setFlash('success', $docto)
				

						));?>
 						<?php echo $form->error($model, 'subprog'); ?>
	                </div>
	</div>

	<div class="row">

		<div class="row-left">
						<?php echo $form->labelEx($model,'factura'); ?>
						<?php echo $form->textField($model,'factura'); ?>
						<?php echo $form->error($model,'factura'); ?>
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


                    
	                    
						//'onchange'=>Yii::app()->user->setFlash('success', $docto)
				

						));?>
				
 						<?php echo $form->error($model, 'partida'); ?>
	                </div>

	                <div class="row-right">
							<?php echo $form->labelEx($model, 'bandera'); ?>
						<?php echo $form->dropDownList($model, 'bandera', $banderas);?>
 						<?php echo $form->error($model, 'bandera'); ?>
					</div>


    </div>
    <div class="row">
    <div class="row-left">
                    <?php echo $form->labelEx($model,'importe'); ?>
					<?php echo $form->textField($model,'importe'); ?>
					<?php echo $form->error($model,'importe'); ?>
	                </div>
 <div class="row-right">
							<?php echo $form->labelEx($model,'numerocheque'); ?>
							<?php echo $form->textField($model,'numerocheque'); ?>
							<?php echo $form->error($model,'numerocheque'); ?>
					</div>	
</div>
<div class="row">
	 <div class="row-left">
							<?php echo $form->labelEx($model,'cantidades'); ?>
							<?php echo $form->textField($model,'cantidades'); ?>
							<?php echo $form->error($model,'cantidades'); ?>
					</div>
	 <div class="row-right">
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
                                'yearRange' => '2013:2013'
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
	               
</div>

<div class="row">

		
						<?php echo $form->labelEx($model, 'proveedor'); ?>
						<?php 
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'proveedor',
    'id'=>'country-multiple',
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
        'style'=>'width:700px',
        //'style'=>'height:20px;',
    ),
));
						 ?>
 						<?php echo $form->error($model, 'proveedor'); ?>
					
</div>

<div class="row">
	 
							<?php echo $form->labelEx($model,'detalle'); ?>
							<?php echo $form->textArea($model,'detalle', array('class'=>'row-left','rows'=>"2", 'cols'=>"190")); ?>
							<?php echo $form->error($model,'detalle'); ?>
					
</div>




	<?php /*<div class="row-fluid">
        <div class="span12">
            
            	  <div class="row-fluid">
                    <div class="span4">
						<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
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
                                'yearRange' => '2013:2013'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_ingreso'); ?>
					</div>
					 <div class="span4">
                    	<?php echo $form->labelEx($model, 'cladgam'); 
                    	$var = Yii::app()->user->setFlash('success', 'hola mundo');
                    	?>

						<?php echo $form->dropDownList($model, 'cladgam', $docto,  array(

						'class'=>'span12',
						'onchange'=>CHtml::ajax(array(
	                        'success'=>"$var",
                    )),
	                    
						//'onchange'=>Yii::app()->user->setFlash('success', $docto)
				

						));?>
 						<?php echo $form->error($model, 'cladgam'); ?>
	                </div>
	                 <div class="span4">
                    	
	                </div>
				</div>
               <div class="row-fluid">
                    <div class="span4">
						<?php echo $form->labelEx($model,'folio'); ?>
						<?php echo $form->textField($model,'folio'); ?>
						<?php echo $form->error($model,'folio'); ?>
					</div>
					 <div class="span4">
                    	<?php echo $form->labelEx($model, 'subprog'); ?>
						<?php echo $form->dropDownList($model, 'subprog', $subprog,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'subprog'); ?>
	                </div>
	                 <div class="span4">
                    	<?php echo $form->labelEx($model, 'area'); ?>
						<?php echo $form->dropDownList($model, 'area', $areas,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'area'); ?>
	                </div>
				</div>
				 <div class="row-fluid">
                    <div class="span8">
						<?php echo $form->labelEx($model,'factura'); ?>
						<?php echo $form->textField($model,'factura',array('class'=>'span8','size'=>80,'maxlength'=>64)); ?>
						<?php echo $form->error($model,'factura'); ?>
					</div>
					 <div class="span4">
                    <?php echo $form->labelEx($model,'importe'); ?>
					<?php echo $form->textField($model,'importe'); ?>
					<?php echo $form->error($model,'importe'); ?>
	                </div>
	              
				</div>
				 <div class="row-fluid">
                    <div class="span4">
							<?php echo $form->labelEx($model,'numerocheque'); ?>
							<?php echo $form->textField($model,'numerocheque'); ?>
							<?php echo $form->error($model,'numerocheque'); ?>
					</div>
					 <div class="span8">
                    		<?php echo $form->labelEx($model, 'concepto'); ?>
						<?php //echo $form->dropDownList($model, 'concepto', $concepto,  array('class'=>'span12'));?>

								<?php 

		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'concepto',
    'id'=>'country-single',
   // 'name'=>'country_single',
    'source'=>$this->createUrl('request/suggestCountry'),
    'htmlOptions'=>array(
        'size'=>'40'
    ),
));
								


?>
 						<?php echo $form->error($model, 'concepto'); ?>
	                </div>
	                
				</div>
				 <div class="row-fluid">
                    <div class="span4">
							<?php echo $form->labelEx($model,'cantidades'); ?>
							<?php echo $form->textField($model,'cantidades'); ?>
							<?php echo $form->error($model,'cantidades'); ?>
					</div>
					 <div class="span8">
                    <?php echo $form->labelEx($model, 'partida'); ?>
						<?php echo $form->dropDownList($model, 'partida', $partidas,  array('class'=>'span12'));?>
				
 						<?php echo $form->error($model, 'partida'); ?>
	                </div>
	                
				</div>
				<div class="row-fluid">
                    <div class="span4">
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
                                'yearRange' => '2013:2013'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_contrarecibo'); ?>
					</div>
					 <div class="span4">
                    <?php echo $form->labelEx($model,'no_contrarecibo'); ?>
					<?php echo $form->textField($model,'no_contrarecibo'); ?>
					<?php echo $form->error($model,'no_contrarecibo'); ?>
	                </div>
	                 <div class="span4">
                  
	                </div>
	                
				</div>

				 <div class="row-fluid">
                    <div class="span8">
							<?php echo $form->labelEx($model,'detalle'); ?>
							<?php echo $form->textArea($model,'detalle', array('class'=>'span12','rows'=>"6", 'cols'=>"40")); ?>
							<?php echo $form->error($model,'detalle'); ?>
					</div>
					
	                
				</div>

					 <div class="row-fluid">
                    <div class="span8">
							<?php echo $form->labelEx($model, 'bandera'); ?>
						<?php echo $form->dropDownList($model, 'bandera', $banderas,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'bandera'); ?>
					</div>
					
	                
				</div>

					
				<div class="row-fluid">
                    
					<div class="span4">
						<?php echo $form->labelEx($model, 'id_periodo'); ?>
						<?php echo $form->dropDownList($model, 'id_periodo', $ejercicio,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'id_periodo'); ?>
					</div>

				
					
	                
				</div>

				


					<div class="row-fluid">
                    
					<div class="span12">
						<?php echo $form->labelEx($model, 'proveedor'); ?>
						<?php 
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute'=>'proveedor',
    'id'=>'country-multiple',
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
        'style'=>'width:700px',
        //'style'=>'height:20px;',
    ),
));
						 ?>
 						<?php echo $form->error($model, 'proveedor'); ?>
					</div>

				
					
	                
				</div>
				<div class="row-fluid">
					<div class="span8">
						<?php echo $model->proveedor ?>
</div>
</div>

			
		</div>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>



</div><!-- 
*/
?>


<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>


<?php $this->endWidget(); ?>

<!--form -->
</div>