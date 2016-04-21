<?php
/* @var $this FoliosController */
/* @var $model Folios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'folios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
		<?php echo $form->error($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave_doc'); ?>
		<?php echo $form->textField($model,'clave_doc'); ?>
		<?php echo $form->error($model,'clave_doc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_area'); ?>
		<?php echo $form->textField($model,'id_area'); ?>
		<?php echo $form->error($model,'id_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
		<?php echo $form->error($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_cr'); ?>
		<?php echo $form->textField($model,'fecha_cr'); ?>
		<?php echo $form->error($model,'fecha_cr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_cr'); ?>
		<?php echo $form->textField($model,'no_cr'); ?>
		<?php echo $form->error($model,'no_cr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_cheque'); ?>
		<?php echo $form->textField($model,'no_cheque'); ?>
		<?php echo $form->error($model,'no_cheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingresos'); ?>
		<?php echo $form->textField($model,'ingresos'); ?>
		<?php echo $form->error($model,'ingresos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'partida'); ?>
		<?php echo $form->textField($model,'partida'); ?>
		<?php echo $form->error($model,'partida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model,'factura'); ?>
		<?php echo $form->error($model,'factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_proveedor'); ?>
		<?php echo $form->textField($model,'id_proveedor'); ?>
		<?php echo $form->error($model,'id_proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones'); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->