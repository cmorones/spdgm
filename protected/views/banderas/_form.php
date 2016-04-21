<?php
/* @var $this BanderasController */
/* @var $model Banderas */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Banderas
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banderas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>


<div class="row">

	<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span6','size'=>180,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre'); ?>

</div>

<div class="row">

	<?php echo $form->labelEx($model,'Activar para Gastos'); ?>
		<?php echo $form->textField($model,'status',array('class'=>'span6','size'=>180,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'status'); ?>

</div>

<div class="row">

	<?php echo $form->labelEx($model,'Activar para Ingresos'); ?>
		<?php echo $form->textField($model,'ingext',array('class'=>'span6','size'=>180,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'ingext'); ?>

</div>


	

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<form>