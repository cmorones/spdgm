<?php
/* @var $this IngextController */
/* @var $model Ingext */
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
		<?php echo $form->label($model,'id_bandera'); ?>
		<?php echo $form->textField($model,'id_bandera'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saldo_inicial'); ?>
		<?php echo $form->textField($model,'saldo_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_ejercicio'); ?>
		<?php echo $form->textField($model,'id_ejercicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ing'); ?>
		<?php echo $form->textField($model,'fecha_ing'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->