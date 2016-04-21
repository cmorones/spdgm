<?php
/* @var $this BanderasController */
/* @var $data Banderas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b>Activar para Gastos:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b>Activar para Ingresos Extraordinarios:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>