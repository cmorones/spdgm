<?php
/* @var $this CatAreasController */
/* @var $model CatAreas */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Áreas
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cat-areas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con<span class="required">*</span> son requeridos.</p>

	
<div class="row-fluid">
        <div class="span12">
            <div class="well">
               <div class="row-fluid">
                    <div class="span12">
	
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
</div>
</div>
</div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>