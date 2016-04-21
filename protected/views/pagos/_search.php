<?php
/* @var $this PagosController */
/* @var $model Pagos */
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
		<?php echo $form->label($model,'id_base'); ?>
		<?php echo $form->textField($model,'id_base'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proveedor'); ?>
		<?php echo $form->textField($model,'proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textField($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_persona'); ?>
		<?php echo $form->textField($model,'tipo_persona'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagado'); ?>
		<?php echo $form->textField($model,'pagado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_recibo'); ?>
		<?php echo $form->textField($model,'fecha_recibo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_pago'); ?>
		<?php echo $form->textField($model,'fecha_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cheque'); ?>
		<?php echo $form->textField($model,'cheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factura'); ?>
		<?php echo $form->textField($model,'factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_contrarecibo'); ?>
		<?php echo $form->textField($model,'fecha_contrarecibo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_contrarecibo'); ?>
		<?php echo $form->textField($model,'no_contrarecibo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_cheque'); ?>
		<?php echo $form->textField($model,'fecha_cheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banco'); ?>
		<?php echo $form->textField($model,'banco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'depto'); ?>
		<?php echo $form->textField($model,'depto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_periodo'); ?>
		<?php echo $form->textField($model,'id_periodo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->