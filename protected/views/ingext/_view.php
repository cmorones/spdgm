<?php
/* @var $this IngextController */
/* @var $data Ingext */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bandera')); ?>:</b>
	<?php echo CHtml::encode($data->id_bandera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->saldo_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->id_ejercicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ing')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ing); ?>
	<br />


</div>