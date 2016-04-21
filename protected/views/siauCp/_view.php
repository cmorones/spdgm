<?php
/* @var $this SiauCpController */
/* @var $data SiauCp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asignado')); ?>:</b>
	<?php echo CHtml::encode($data->asignado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autorizado')); ?>:</b>
	<?php echo CHtml::encode($data->autorizado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disponible')); ?>:</b>
	<?php echo CHtml::encode($data->disponible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuentasxpagar')); ?>:</b>
	<?php echo CHtml::encode($data->cuentasxpagar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ejercido')); ?>:</b>
	<?php echo CHtml::encode($data->ejercido); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ingresos_extra')); ?>:</b>
	<?php echo CHtml::encode($data->ingresos_extra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	*/ ?>

</div>