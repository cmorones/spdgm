<?php
/* @var $this SiauCpController */
/* @var $model SiauCp */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asignado'); ?>
		<?php echo $form->textField($model,'asignado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'autorizado'); ?>
		<?php echo $form->textField($model,'autorizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disponible'); ?>
		<?php echo $form->textField($model,'disponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuentasxpagar'); ?>
		<?php echo $form->textField($model,'cuentasxpagar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ejercido'); ?>
		<?php echo $form->textField($model,'ejercido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingresos_extra'); ?>
		<?php echo $form->textField($model,'ingresos_extra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_mod'); ?>
		<?php echo $form->textField($model,'fecha_mod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->