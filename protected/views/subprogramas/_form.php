<?php
/* @var $this SubprogramasController */
/* @var $model Subprogramas */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Subrogramas
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subprogramas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row">

		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre'); ?>

</div>

<div class="row">

		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'status'); ?>

</div>

<div class="row">

		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'alias'); ?>

</div>

<div class="row">

		<?php echo $form->labelEx($model,'alias2'); ?>
		<?php echo $form->textField($model,'alias2',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'alias2'); ?>

</div>



	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>