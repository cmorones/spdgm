<?php
/* @var $this BasecapprovController */
/* @var $model Basecapprov */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basecapprov-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model, 'proveedor'); ?>
  <?php $this->widget('ext.select2.ESelect2',array(
  'model'=>$model,
  'attribute'=>'id_proveedor',
  //'name'=>'id_proveedor',
   'options'=>array(
                        'placeholder' => 'Seleccionar proveedor', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => CHtml::listData(Proveedores::model()->findAll(), 'id','nombre'),
  'htmlOptions'=>array(
  //'multiple'=>'multiple',
  ),
)); ?>
 						<?php echo $form->error($model, 'proveedor'); ?>
	</div>

	  

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->