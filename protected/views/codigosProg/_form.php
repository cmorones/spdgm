<?php
/* @var $this CodigosProgController */
/* @var $model CodigosProg */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Codigos Presupuestales
 </div>
<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'codigos-prog-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'partida'); ?>
		<?php echo $form->textField($model,'partida'); ?>
		<?php echo $form->error($model,'partida'); ?>
	</div>

	<div class="row">
				<?php 

	$resultado = Subprogramas::model()->findAll('status=1',array('order'=>'id desc'));
        $subprog = array();
        $subprog['falso'] = 'Selecciona subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->alias;
        }

					echo $form->labelEx($model, 'subprog'); ?>
						<?php echo $form->dropDownList($model, 'subprog', $subprog, array(
						'id' => 'subprog'));?>
 						<?php echo $form->error($model, 'subprog'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion'); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave'); ?>
		<?php echo $form->textField($model,'clave'); ?>
		<?php echo $form->error($model,'clave'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>