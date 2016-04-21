<?php
/* @var $this CatEjercicioController */
/* @var $model CatEjercicio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cat-ejercicio-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre'); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>



		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php //echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->