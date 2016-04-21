<?php
/* @var $this IngExtController */
/* @var $model IngExt */
/* @var $form CActiveForm */
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Agregar Saldos Iniciales y Presignación de Recursos
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ing-ext-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Campos con <span class="required">*</span> son requeridos.</p>



	<div class="row">
		<div class="row-left">
			<div class="row-right">
				<?php echo $form->labelEx($model, 'id_bandera'); ?>
						<?php echo $form->dropDownList($model, 'id_bandera', $banderas, array(
						'id' => 'bandera'));?>
 						<?php echo $form->error($model, 'id_bandera'); ?>
		</div>
		</div>
		<div class="row-left">
		<?php echo $form->labelEx($model,'saldo_anterior'); ?>
		<?php echo $form->textField($model,'saldo_anterior'); ?>
		<?php echo $form->error($model,'saldo_anterior'); ?>
		</div>
		<div class="row-left">
		<?php echo $form->labelEx($model,'cargos'); ?>
		<?php echo $form->textField($model,'cargos'); ?>
		<?php echo $form->error($model,'cargos'); ?>
		</div>
		<div class="row-left">
		<?php echo $form->labelEx($model,'abonos'); ?>
		<?php echo $form->textField($model,'abonos'); ?>
		<?php echo $form->error($model,'abonos'); ?>
		</div>
		<div class="row-left">
		<?php echo $form->labelEx($model,'saldo_actual'); ?>
		<?php echo $form->textField($model,'saldo_actual'); ?>
		<?php echo $form->error($model,'saldo_actual'); ?>
		</div>
	</div>

	

	<div class="row">
			<div class="row-left">
		<?php echo $form->labelEx($model,'fecha_ing'); ?>
		<?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_ing',


                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => '2013:2014'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                'id'=>'fecha_ing',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
		<?php echo $form->error($model,'fecha_ing'); ?>
		</div>
		<div class="row-left">
		<?php echo $form->labelEx($model, 'estado'); ?>
		<?php echo $form->dropDownList($model, 'estado', $tipo);?>
 		<?php echo $form->error($model, 'estado'); ?>
	</div>
	<div class="row-left">
		<?php echo $form->labelEx($model, 'id_ejercicio'); ?>
		<?php echo $form->dropDownList($model, 'id_ejercicio', $ejercicio);?>
 		<?php echo $form->error($model, 'id_ejercicio'); ?>
	</div>

	</div>

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>