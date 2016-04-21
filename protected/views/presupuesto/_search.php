<?php
/* @var $this PresupuestoController */
/* @var $model Presupuesto */
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
		<?php echo $form->label($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subprog'); ?>
		<?php echo $form->textField($model,'subprog'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'partida'); ?>
		<?php echo $form->textField($model,'partida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presupuesto'); ?>
		<?php echo $form->textField($model,'presupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gasto'); ?>
		<?php echo $form->textField($model,'gasto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disponible'); ?>
		<?php echo $form->textField($model,'disponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oficio'); ?>
		<?php echo $form->textField($model,'oficio'); ?>
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