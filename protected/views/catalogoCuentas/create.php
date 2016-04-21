<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informes
 </div>
<div class="form">

<div class="form">
<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">

<div class="span3">
	<?php echo CHtml::label('Ejercicio','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_periodo',
   'options'=>array(
                        'placeholder' => 'Seleccionar Ejercicio', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),

   /*findAll('status=1',array('order'=>'id'))*/
  'data' => CHtml::listData(CatEjercicio::model()->findAll((array(
   // 'condition'=>'status=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
   // 'condition'=>"bandera=$id_bandera and area=$subprog and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'nombre desc'
	))), 'id', 'nombre'),
)); ?>
</div>

<div class="span9">


<?php
echo CHtml::ajaxSubmitButton(
	'Mostrar Cuentas',
	array('catalogoCuentas/reqCuentas'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-info') 
);
?>

</div>


<?php echo CHtml::endForm(); ?>
</div><!-- form -->

</div>
</div>
</div>

<div id="req_res02">
<?php
/* @var $this CatalogoCuentasController */
/* @var $model CatalogoCuentas */

/*$this->breadcrumbs=array(
	'Catalogo Cuentases'=>array('index'),
	'Create',
);*/
/*
$this->menu=array(
	//array('label'=>'List CatalogoCuentas', 'url'=>array('index')),
	array('label'=>'Administrar Cuentas', 'url'=>array('mostrar')),
);*/
?>

<h3>Agregar cuentas ejercicio</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model,
'banderas'=>$banderas,
			'ejercicio'=>$ejercicio,
			'tipo'=>$tipo,
)); ?>

</div>