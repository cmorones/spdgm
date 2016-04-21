<?php
/* @var $this PartidasController */
/* @var $model Partidas */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Partidas
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partidas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>


<div class="row">
<div class="row-left">
			<?php echo $form->labelEx($model,'codigo'); ?>
			<?php echo $form->textField($model,'codigo',array('class'=>'span6')); ?>
			<?php echo $form->error($model,'codigo'); ?>
</div>
<div class="row-right">
		
</div>
</div>
<div class="row">

			<?php echo $form->labelEx($model,'descripcion'); ?>
			<?php echo $form->textField($model,'descripcion',array('class'=>'span12')); ?>
			<?php echo $form->error($model,'descripcion'); ?>


</div>

<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	
	</div>
	


<?php $this->endWidget(); ?>

</div><!-- form -->
</form>