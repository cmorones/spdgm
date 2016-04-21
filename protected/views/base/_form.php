


<?php
/* @var $this BaseController */
/* @var $model base */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScript('search', "



$('#importe_bruto').keyup(function(){
	var iva = eval($('#iva').val());
	var importe = eval($('#importe_bruto').val());
	 
	$('#subtotal').val(importe+iva);
});

$('#iva').keyup(function(){
	var iva = eval($('#iva').val());
	var importe = eval($('#importe_bruto').val());
	 
	$('#subtotal').val(importe+iva);
});

$('#iva_ret').keyup(function(){
	var iva = eval($('#iva_ret').val());
	var isr = eval($('#isr_ret').val());
	var subtotal = eval($('#subtotal').val());
	 
	$('#importe_neto').val(subtotal-iva-isr);
});

$('#isr_ret').keyup(function(){
	var iva = eval($('#iva_ret').val());
	var isr = eval($('#isr_ret').val());
	var subtotal = eval($('#subtotal').val());
	 
	$('#importe_neto').val(subtotal-iva-isr);
});

");

?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar datos DIOT ejercicio <?=$anio?>
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'base-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'proveedor'); ?>
		<?php echo $form->textField($model,'proveedor',array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'proveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rfc'); ?>
		<?php echo $form->textField($model,'rfc',array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'rfc'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_prov'); ?>
		<?php echo $form->dropDownList($model,'tipo_prov',$prov,array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'tipo_prov'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'tipo_op'); ?>
		<?php echo $form->dropDownList($model,'tipo_op',$tipop,array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'tipo_op'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_fiscal'); ?>
		<?php echo $form->textField($model,'id_fiscal',array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'id_fiscal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recidencia'); ?>
		<?php echo $form->textField($model,'recidencia',array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'recidencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nacionalidad'); ?>
		<?php echo $form->textField($model,'nacionalidad',array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'nacionalidad'); ?>
	</div>

	<div class="row">

	     <div class="row-right">
		<?php echo $form->labelEx($model,'importe_bruto'); ?>
		<?php echo $form->textField($model,'importe_bruto',array('id'=>'importe_bruto')); ?>
		<?php echo $form->error($model,'importe_bruto'); ?>
		</div>
	    <div class="row-right">
		<?php echo $form->labelEx($model,'iva'); ?>
		<?php echo $form->textField($model,'iva',array('id'=>'iva')); ?>
		<?php echo $form->error($model,'iva'); ?>
		</div>
		<div class="row-right">
		<?php echo $form->labelEx($model,'subtotal'); ?>
		<?php echo $form->textField($model,'subtotal', array('id'=>'subtotal')); ?>
		<?php echo $form->error($model,'subtotal'); ?>
		</div>
		<div class="row-right">
		<?php echo $form->labelEx($model,'iva_ret'); ?>
		<?php echo $form->textField($model,'iva_ret',array('id'=>'iva_ret')); ?>
		<?php echo $form->error($model,'iva_ret'); ?>
</div>
<div class="row-right">
	<?php echo $form->labelEx($model,'isr_ret'); ?>
		<?php echo $form->textField($model,'isr_ret',array('id'=>'isr_ret')); ?>
		<?php echo $form->error($model,'isr_ret'); ?>
</div>

	</div>


	<div class="row">
	    <div class="row-right">
	<?php echo $form->labelEx($model,'tasa'); ?>
		<?php echo $form->dropDownList($model,'tasa',$tasa); ?>
		<?php echo $form->error($model,'tasa'); ?>
</div>
<div class="row-right">
		<?php echo $form->labelEx($model,'importe_neto'); ?>
		<?php echo $form->textField($model,'importe_neto', array('id'=>'importe_neto')); ?>
		<?php echo $form->error($model,'importe_neto'); ?>
		</div>

	<div class="row-right">
		<?php echo $form->labelEx($model,'importe'); ?>
		<?php echo $form->textField($model,'importe', array('disabled'=>'true')); ?>
		<?php echo $form->error($model,'importe'); ?>
		</div>
	</div>




		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php //echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>