<?php
/* @var $this CatalogoCuentasController */
/* @var $data CatalogoCuentas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bandera')); ?>:</b>
	<?php echo CHtml::encode($data->id_bandera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ejercicio')); ?>:</b>
	<?php echo CHtml::encode($data->id_ejercicio); ?>
	<br />


</div>