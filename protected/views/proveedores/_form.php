<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Proveedores
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>

<div class="row">

			<?php echo $form->labelEx($model,'nombre'); ?>
	        <?php echo $form->textField($model,'nombre',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		    <?php echo $form->error($model,'nombre'); ?>

</div>
<div class="row">
	<?php echo $form->labelEx($model,'curp'); ?>
	                	<?php echo $form->textField($model,'curp',array('class'=>'span6','size'=>80,'maxlength'=>40)); ?>
		                <?php echo $form->error($model,'curp'); ?>
</div>

<div class="row">

		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
						<?php echo $form->error($model,'domicilio'); ?>

</div>

<div class="row">

	<?php echo $form->labelEx($model,'colonia'); ?>
		                <?php echo $form->textField($model,'colonia',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
	                	<?php echo $form->error($model,'colonia'); ?>
</div>

<div class="row">
<div class="row-left">
		<?php echo $form->labelEx($model,'codigo'); ?>
						<?php echo $form->textField($model,'codigo'); ?>
						<?php echo $form->error($model,'codigo'); ?>
</div>
<div class="row-right">
		<?php echo $form->labelEx($model,'telefono'); ?>
	                	<?php echo $form->textField($model,'telefono'); ?>
		                <?php echo $form->error($model,'telefono'); ?>
</div>
<div class="row-right">
	<?php echo $form->labelEx($model,'rfc'); ?>
		                <?php echo $form->textField($model,'rfc'); ?>
	                	<?php echo $form->error($model,'rfc'); ?>
</div>
<div class="row-right">
		<?php echo $form->labelEx($model,'entidad'); ?>
						<?php echo $form->textField($model,'entidad'); ?>
						<?php echo $form->error($model,'entidad'); ?>
</div>
</div>



<div class="row">

		<?php echo $form->labelEx($model,'actividad'); ?>
		<?php echo $form->textField($model,'actividad',array('class'=>'span6','size'=>80,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'actividad'); ?>

</div>

<div class="row">
	<div class="row-right">
		<?php echo $form->labelEx($model, 'tipo'); ?>
		<?php echo $form->dropDownList($model, 'tipo', array('falso' => 'Tipo','1' => 'Musico','2' => 'Orquesta','3' => 'Base','4' => 'Honorarios','5' => 'Confianza','6' => 'Funcionarios','7' => 'Proveedores','8' => 'Becarios','9' => 'NT'));?>
 		<?php echo $form->error($model, 'tipo'); ?>
	</div>

	<div class="row-right">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1' => 'Activo','2' => 'Baja'));?>
 		<?php echo $form->error($model, 'status'); ?>
	</div>

	


</div>

<div class="row">
	   <?php echo $form->labelEx($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('class'=>'span6','size'=>180,'maxlength'=>64)); ?>
	   <?php echo $form->error($model,'mail'); ?>
	</div>


	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!--}


	<div class="row">
		<?php echo $form->labelEx($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia'); ?>
		<?php echo $form->error($model,'colonia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono'); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rfc'); ?>
		<?php echo $form->textField($model,'rfc'); ?>
		<?php echo $form->error($model,'rfc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curp'); ?>
		<?php echo $form->textField($model,'curp'); ?>
		<?php echo $form->error($model,'curp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entidad'); ?>
		<?php echo $form->textField($model,'entidad'); ?>
		<?php echo $form->error($model,'entidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actividad'); ?>
		<?php echo $form->textField($model,'actividad'); ?>
		<?php echo $form->error($model,'actividad'); ?>
	</div>

 form -->
</div>