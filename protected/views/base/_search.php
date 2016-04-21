<?php
/* @var $this BaseController */
/* @var $model base */
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
		<?php echo $form->label($model,'subprog'); ?>
		<?php echo $form->textField($model,'subprog'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factura'); ?>
		<?php echo $form->textField($model,'factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importe'); ?>
		<?php echo $form->textField($model,'importe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerocheque'); ?>
		<?php echo $form->textField($model,'numerocheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'concepto'); ?>
		<?php echo $form->textField($model,'concepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidades'); ?>
		<?php echo $form->textField($model,'cantidades'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'partida'); ?>
		<?php echo $form->textField($model,'partida'); ?>
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
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textField($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bandera'); ?>
		<?php echo $form->textField($model,'bandera'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ingreso'); ?>
		<?php echo $form->textField($model,'fecha_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cladgam'); ?>
		<?php echo $form->textField($model,'cladgam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_periodo'); ?>
		<?php echo $form->textField($model,'id_periodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proveedor'); ?>
		<?php echo $form->textField($model,'proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rfc'); ?>
		<?php echo $form->textField($model,'rfc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registro_pago'); ?>
		<?php echo $form->textField($model,'registro_pago'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'validado'); ?>
		<?php echo $form->textField($model,'validado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_prov'); ?>
		<?php echo $form->textField($model,'tipo_prov'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_op'); ?>
		<?php echo $form->textField($model,'tipo_op'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_fiscal'); ?>
		<?php echo $form->textField($model,'id_fiscal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recidencia'); ?>
		<?php echo $form->textField($model,'recidencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nacionalidad'); ?>
		<?php echo $form->textField($model,'nacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iva'); ?>
		<?php echo $form->textField($model,'iva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subtotal'); ?>
		<?php echo $form->textField($model,'subtotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iva_ret'); ?>
		<?php echo $form->textField($model,'iva_ret'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isr_ret'); ?>
		<?php echo $form->textField($model,'isr_ret'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tasa'); ?>
		<?php echo $form->textField($model,'tasa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->