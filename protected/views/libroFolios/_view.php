<?php
/* @var $this LibroFoliosController */
/* @var $data LibroFolios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ing')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factura')); ?>:</b>
	<?php echo CHtml::encode($data->factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerocheque')); ?>:</b>
	<?php echo CHtml::encode($data->numerocheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partida')); ?>:</b>
	<?php echo CHtml::encode($data->partida); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_contrarecibo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_contrarecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_contrarecibo')); ?>:</b>
	<?php echo CHtml::encode($data->no_contrarecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clasif')); ?>:</b>
	<?php echo CHtml::encode($data->clasif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_docto')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_docto); ?>
	<br />

	*/ ?>

</div>