<?php
/* @var $this BaseController */
/* @var $data base */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folio')); ?>:</b>
	<?php echo CHtml::encode($data->folio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subprog')); ?>:</b>
	<?php echo CHtml::encode($data->subprog); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('concepto')); ?>:</b>
	<?php echo CHtml::encode($data->concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidades')); ?>:</b>
	<?php echo CHtml::encode($data->cantidades); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partida')); ?>:</b>
	<?php echo CHtml::encode($data->partida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_contrarecibo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_contrarecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_contrarecibo')); ?>:</b>
	<?php echo CHtml::encode($data->no_contrarecibo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bandera')); ?>:</b>
	<?php echo CHtml::encode($data->bandera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cladgam')); ?>:</b>
	<?php echo CHtml::encode($data->cladgam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->id_periodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfc')); ?>:</b>
	<?php echo CHtml::encode($data->rfc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro_pago')); ?>:</b>
	<?php echo CHtml::encode($data->registro_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('validado')); ?>:</b>
	<?php echo CHtml::encode($data->validado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_prov')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_prov); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_op')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_op); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fiscal')); ?>:</b>
	<?php echo CHtml::encode($data->id_fiscal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recidencia')); ?>:</b>
	<?php echo CHtml::encode($data->recidencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva')); ?>:</b>
	<?php echo CHtml::encode($data->iva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->subtotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva_ret')); ?>:</b>
	<?php echo CHtml::encode($data->iva_ret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isr_ret')); ?>:</b>
	<?php echo CHtml::encode($data->isr_ret); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tasa')); ?>:</b>
	<?php echo CHtml::encode($data->tasa); ?>
	<br />

	*/ ?>

</div>