<?php
/* @var $this ConceptosController */
/* @var $model Conceptos */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Conceptos
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conceptos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>


<div class="row">

	<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre'); ?>


</div>


</div>

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>