<?php
/* @var $this IngextController */
/* @var $model Ingext */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ingext-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
				<?php echo $form->labelEx($model, 'id_bandera'); ?>
						<?php echo $form->dropDownList($model, 'id_bandera', $banderas, array('id' => 'id_bandera'));?>
 						<?php echo $form->error($model, 'id_bandera'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldo_inicial'); ?>
		<?php echo $form->textField($model,'saldo_inicial'); ?>
		<?php echo $form->error($model,'saldo_inicial'); ?>
	</div>


	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancelar', array('ingext/admin/'.$id_periodo), array('class'=>'btnCan')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->