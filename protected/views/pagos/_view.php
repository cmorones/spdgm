<?php
/* @var $this PagosController */
/* @var $data Pagos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_base')); ?>:</b>
	<?php echo CHtml::encode($data->id_base); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_persona')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_persona); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagado')); ?>:</b>
	<?php echo CHtml::encode($data->pagado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_recibo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_recibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_pago')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cheque')); ?>:</b>
	<?php echo CHtml::encode($data->cheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factura')); ?>:</b>
	<?php echo CHtml::encode($data->factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_contrarecibo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_contrarecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_contrarecibo')); ?>:</b>
	<?php echo CHtml::encode($data->no_contrarecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cheque')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco')); ?>:</b>
	<?php echo CHtml::encode($data->banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('depto')); ?>:</b>
	<?php echo CHtml::encode($data->depto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->id_periodo); ?>
	<br />

	*/ ?>

</div>