<?php
/* @var $this SiauCpController */
/* @var $model SiauCp */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'siau-cp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asignado'); ?>
		<?php echo $form->textField($model,'asignado'); ?>
		<?php echo $form->error($model,'asignado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autorizado'); ?>
		<?php echo $form->textField($model,'autorizado'); ?>
		<?php echo $form->error($model,'autorizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponible'); ?>
		<?php echo $form->textField($model,'disponible'); ?>
		<?php echo $form->error($model,'disponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuentasxpagar'); ?>
		<?php echo $form->textField($model,'cuentasxpagar'); ?>
		<?php echo $form->error($model,'cuentasxpagar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ejercido'); ?>
		<?php echo $form->textField($model,'ejercido'); ?>
		<?php echo $form->error($model,'ejercido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingresos_extra'); ?>
		<?php echo $form->textField($model,'ingresos_extra'); ?>
		<?php echo $form->error($model,'ingresos_extra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
		<?php echo $form->error($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_mod'); ?>
		<?php echo $form->textField($model,'fecha_mod'); ?>
		<?php echo $form->error($model,'fecha_mod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->