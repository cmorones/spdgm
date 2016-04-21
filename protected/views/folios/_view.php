<?php
/* @var $this FoliosController */
/* @var $data Folios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clave_doc')); ?>:</b>
	<?php echo CHtml::encode($data->clave_doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_area')); ?>:</b>
	<?php echo CHtml::encode($data->id_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cr')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cr); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('no_cr')); ?>:</b>
	<?php echo CHtml::encode($data->no_cr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_cheque')); ?>:</b>
	<?php echo CHtml::encode($data->no_cheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingresos')); ?>:</b>
	<?php echo CHtml::encode($data->ingresos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partida')); ?>:</b>
	<?php echo CHtml::encode($data->partida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factura')); ?>:</b>
	<?php echo CHtml::encode($data->factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	*/ ?>

</div>