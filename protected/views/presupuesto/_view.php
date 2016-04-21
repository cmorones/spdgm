<?php
/* @var $this PresupuestoController */
/* @var $data Presupuesto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subprog')); ?>:</b>
	<?php echo CHtml::encode($data->subprog); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partida')); ?>:</b>
	<?php echo CHtml::encode($data->partida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->presupuesto); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('gasto')); ?>:</b>
	<?php echo CHtml::encode($data->gasto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disponible')); ?>:</b>
	<?php echo CHtml::encode($data->disponible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oficio')); ?>:</b>
	<?php echo CHtml::encode($data->oficio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->id_periodo); ?>
	<br />

	*/ ?>

</div>