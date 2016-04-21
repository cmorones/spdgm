<?php
/* @var $this BaseCapController */
/* @var $model BaseCap */
/* @var $form CActiveForm


	<div class="row">
		<div class="row-left">
		</div>
		<div class="row-right">
		</div>
	</div>


 */
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

/*]]>*/
</script>

<script type="text/javascript">
$(function(){
	$("#btn").hide();
  	$("#btn2").hide();
});
 
  function updateEditForm(target_id){
  	 var id = $.fn.yiiGridView.getSelection(target_id);

  	 if(id!=''){
  	 	$("#btn").hide();
  	 	$("#btn2").hide();
  	 } else {
  	 //	$("#btn").addClass("btn btn-success");
  	 	 	 }

  	 $.getJSON('<?php echo $this->createUrl('userinputData'); ?>?id='+id,
  	 function(data){
  	 	$('#id').val(data.id);
  	 	$('#fecha_ing').val(data.fecha_ingreso);
  	 	$('#folio').val(data.folio);
  	 	$('#factura').val(data.factura);
  	 	$('#proveedor').val(data.proveedor);
  	 	$('#cladgam').val(data.cladgam);
  	 	$('#importe').val(data.importe);
  	 	$('#subprog').val(data.subprog);
  	 	$('#area').val(data.area);
  	 	$('#rfc').val(data.rfc);
  	 	$('#partida').val(data.partida);
  	 	$('#bandera').val(data.bandera);
  	 	$('#numerocheque').val(data.numerocheque);
  	 	$('#concepto').val(data.concepto);
  	 	$('#cantidades').val(data.cantidades);
  	 	$('#fecha_contrarecibo').val(data.fecha_contrarecibo);
  	 	$('#no_contrarecibo').val(data.no_contrarecibo);
  	 	$('#detalle').val(data.detalle);
  	 	$('#id_periodo').val(data.id_periodo);
  		if(data.validado==1){
  			$('#btn').hide();
  			$('#btn2').show();
  		}else{
  			$('#btn2').hide();
  			$('#btn').show();
  		}
  	 	//$('#btn').empty().removeAttr("disabled");
  	 });
  }


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
 <div class="portlet-title">Validacion de Gastos
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'base-cap-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">

				<div class="row-left">
  		<?php echo $form->hiddenField($model,'id',array('id'=>'id','type'=>"hidden",'size'=>5,'maxlength'=>5)); ?>					
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
                                'yearRange' => '2013:2014'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                'id'=>'fecha_ing',
                              //  'disabled'=>true,
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
		<?php echo $form->error($model,'fecha_ingreso'); ?>
		</div>

	<div class="row-left">

		<?php echo $form->labelEx($model,'folio'); ?>
		<?php echo $form->textField($model,'folio',array('id'=>'folio')); ?>
		<?php echo $form->error($model,'folio'); ?>
	
		</div>

		<div class="row-left">

		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model,'factura',array('id'=>'factura')); ?>
		<?php echo $form->error($model,'factura'); ?>
	
		</div>
	
		
<div class="row-left">

		<?php echo $form->labelEx($model,'proveedor'); ?>
		<?php echo $form->textField($model,'proveedor',array('id'=>'proveedor', 'style'=>'width:400px')); ?>
		<?php echo $form->error($model,'proveedor'); ?>
	
		</div>
		
	</div>

	<div class="row">
		<div class="row-right">
			<?php echo $form->labelEx($model, 'cladgam'); 
                    	//$var = Yii::app()->user->setFlash('success', 'hola mundo');
                    	?>

						<?php echo $form->dropDownList($model, 'cladgam', $docto,  array(
						'id' => 'cladgam',
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
						'id' => 'subprog',
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
						'id' => 'area',
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
		<?php echo $form->textField($model,'rfc',array('id'=>'rfc')); ?>
		<?php echo $form->error($model,'rfc'); ?>
		</div>


		
			
	</div>




		<div class="row">

	<div class="row-left">
			        <?php echo $form->labelEx($model, 'partida'); ?>
						<?php echo $form->dropDownList($model, 'partida', $partidas,  array(
						'id' => 'partida',
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

		<div class="row-left">
			<div id="destination">	
				  <?php echo CHtml::ajaxSubmitButton ("VALIDAR",

			                array('baseCap/ajax'),
			                array('update' => '#destination'),
			                array('id'=>'btn','class'=>'btn-info'));
			         	?>
			</div>

			<div id="destination2">	
				  <?php echo CHtml::ajaxSubmitButton ("DESVALIDAR",

			                array('baseCap/ajax2'),
			                array('update' => '#destination'),
			                array('id'=>'btn2','class'=>'btn-danger'));
			         	?>
			</div>
		</div>	
	</div>


	
	<div class="row">

		
		
		<div class="row-right">
			<?php echo $form->labelEx($model,'cantidades'); ?>
		<?php echo $form->textField($model,'cantidades',array('id'=>'cantidades')); ?>
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
                                'yearRange' => '2013:2013'
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

		<div class="row-left">

		<?php echo $form->labelEx($model,'concepto'); ?>
		<?php echo $form->textField($model,'concepto',array('id'=>'concepto', 'style'=>'width:400px')); ?>
		<?php echo $form->error($model,'concepto'); ?>
	
		</div>


		<div class="row-right">
	

	</div>
	<div class="row-right">
		<div id="destination2">	
	  <?php /*echo CHtml::ajaxSubmitButton ("MODIFICAR",

                array('baseCap/ajaxUpdate'),
                array('update' => '#destination2'),
                array('id'=>'btn2','class'=>'btnupdate','Disabled'=>'true')); 
*/

	?>
</div>
</div>
</div> 	



    


	



	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle', array('id'=>'detalle','class'=>'row','rows'=>"5", 'cols'=>"230")); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	
<div class="row">


	</div>

		




<?php $this->endWidget(); ?>

</div><!-- form -->
</div>


