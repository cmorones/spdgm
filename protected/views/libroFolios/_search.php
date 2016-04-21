<?php
/* @var $this LibroFoliosController */
/* @var $model LibroFolios */
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
		<?php echo $form->label($model,'fecha_ing'); ?>
		<?php echo $form->textField($model,'fecha_ing'); ?>
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
		<?php echo $form->label($model,'id_proveedor'); ?>
		<?php echo $form->textField($model,'id_proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clasif'); ?>
		<?php echo $form->textField($model,'clasif'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_docto'); ?>
		<?php echo $form->textField($model,'tipo_docto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->