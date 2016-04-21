<?php
/* @var $this CatalogoCuentasController */
/* @var $model CatalogoCuentas */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalogo-cuentas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
			<?php echo $form->labelEx($model, 'id_bandera'); ?>
			<?php echo $form->dropDownList($model, 'id_bandera', $banderas, array('id' => 'id_bandera'));?>
 			<?php echo $form->error($model, 'id_bandera'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'id_tipo'); ?>
		<?php echo $form->dropDownList($model, 'id_tipo', $tipo, array('id' => 'id_tipo'));?>
 		<?php echo $form->error($model, 'id_tipo'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->labelEx($model, 'id_ejercicio'); ?>
		<?php echo $form->dropDownList($model, 'id_ejercicio', $ejercicio);?>
 		<?php echo $form->error($model, 'id_ejercicio'); ?>
	</div>

	<div class="row buttons">
		
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->