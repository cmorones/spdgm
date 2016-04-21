<?php
/* @var $this IngExtController */
/* @var $data IngExt */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bandera')); ?>:</b>
	<?php echo CHtml::encode($data->id_bandera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->saldo_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargos')); ?>:</b>
	<?php echo CHtml::encode($data->cargos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abonos')); ?>:</b>
	<?php echo CHtml::encode($data->abonos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo_actual')); ?>:</b>
	<?php echo CHtml::encode($data->saldo_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->id_ejercicio); ?>
	<br />

	*/ ?>

</div>