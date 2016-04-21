<?php
/* @var $this BaseIngController */
/* @var $model BaseIng */
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
		<?php echo $form->label($model,'id_proveedor'); ?>
		<?php echo $form->textField($model,'id_proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cladgam'); ?>
		<?php echo $form->textField($model,'cladgam'); ?>
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