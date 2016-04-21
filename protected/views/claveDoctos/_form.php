<?php
/* @var $this ClaveDoctosController */
/* @var $model ClaveDoctos */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Clave de Documento
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clave-doctos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son  requeridos.</p>

	<div class="row">
<div class="row-left">
	<?php echo $form->labelEx($model,'nombre'); ?>
						<?php echo $form->textField($model,'nombre',array('class'=>'span6')); ?>
						<?php echo $form->error($model,'nombre'); ?>
</div>
<div class="row-right">
</div>
</div>
<div class="row">
<div class="row-left">
		<?php echo $form->labelEx($model,'detalle'); ?>
						<?php echo $form->textField($model,'detalle',array('class'=>'span6')); ?>
						<?php echo $form->error($model,'detalle'); ?>
</div>
<div class="row-right">
</div>
</div>



	

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>