<?php
/* @var $this FoliosController */
/* @var $model Folios */
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
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clave_doc'); ?>
		<?php echo $form->textField($model,'clave_doc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_area'); ?>
		<?php echo $form->textField($model,'id_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_cr'); ?>
		<?php echo $form->textField($model,'fecha_cr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_cr'); ?>
		<?php echo $form->textField($model,'no_cr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_cheque'); ?>
		<?php echo $form->textField($model,'no_cheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingresos'); ?>
		<?php echo $form->textField($model,'ingresos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'partida'); ?>
		<?php echo $form->textField($model,'partida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factura'); ?>
		<?php echo $form->textField($model,'factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_proveedor'); ?>
		<?php echo $form->textField($model,'id_proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->