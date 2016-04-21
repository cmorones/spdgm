<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */
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

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Presupuesto <?php echo $anio ?>
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presupuesto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
		<div class="row">
	
		
		<div class="row-left">
			<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->dropDownList($model, 'grupo', $grupos,  array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('presupuesto/grupos'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )


						));?>
		<?php echo $form->error($model,'grupo'); ?>
		</div>
		<div class="row-right">

			<?php echo $form->labelEx($model,'subprog'); ?>
		<?php echo $form->dropDownList($model, 'subprog', $subprog,  array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('presupuesto/subprog'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )


						));?>
		<?php echo $form->error($model,'subprog'); ?>
		
		</div>
			<div class="row-left">
			<?php echo $form->labelEx($model, 'area'); ?>
						<?php echo $form->dropDownList($model, 'area', $areas, array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('presupuesto/area'),
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
	
	</div>


	<div class="row">
	
		<div class="row-right">

		<?php echo $form->labelEx($model, 'partida'); ?>
						<?php echo $form->dropDownList($model, 'partida', $partidas,  array(

						'ajax' => array(
	                    	'type'=>'POST',
            				'url'=> Yii::app()->createUrl('presupuesto/partida'),
           				    'update'=>'#info',
           				     'beforeSend' => 'function() {          
 							          $("#info").animate({opacity:1.0},10000).show();
	 							       }',
           				    'complete'=>'$("#info").animate({opacity:1.0},10000).slideUp("slow")',
           				    )

						));?>
				
 						<?php echo $form->error($model, 'partida'); ?>
		
		</div>
		<div class="row-left">
				<?php echo $form->labelEx($model,'presupuesto'); ?>
		<?php echo $form->textField($model,'presupuesto'); ?>
		<?php echo $form->error($model,'presupuesto'); ?>
		</div>
		<div class="row-right">
			<?php echo $form->labelEx($model, 'tipo'); ?>
		<?php echo $form->dropDownList($model, 'tipo', $tipo);?>
 		<?php echo $form->error($model, 'tipo'); ?>
		</div>
		
		
	</div>
	
	
	
	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>


<?php $this->endWidget(); ?>

</div><!-- 

<div class="row">
		<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo'); ?>
		<?php echo $form->error($model,'grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subprog'); ?>
		<?php echo $form->textField($model,'subprog'); ?>
		<?php echo $form->error($model,'subprog'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'partida'); ?>
		<?php echo $form->textField($model,'partida'); ?>
		<?php echo $form->error($model,'partida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'tipo'); ?>
		<?php echo $form->dropDownList($model, 'tipo', $tipo);?>
 		<?php echo $form->error($model, 'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area'); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presupuesto'); ?>
		<?php echo $form->textField($model,'presupuesto'); ?>
		<?php echo $form->error($model,'presupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gasto'); ?>
		<?php echo $form->textField($model,'gasto'); ?>
		<?php echo $form->error($model,'gasto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponible'); ?>
		<?php echo $form->textField($model,'disponible'); ?>
		<?php echo $form->error($model,'disponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
		<?php echo $form->error($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oficio'); ?>
		<?php echo $form->textField($model,'oficio'); ?>
		<?php echo $form->error($model,'oficio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_periodo'); ?>
		<?php echo $form->textField($model,'id_periodo'); ?>
		<?php echo $form->error($model,'id_periodo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
form -->
</div>