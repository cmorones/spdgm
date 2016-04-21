<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informe PAGOS
 </div>
<div class="form">

<div class="form">
<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">



<div class="span3">
	<?php echo CHtml::label('Ejercicio', 'ejercicio'); ?>
<?php
  $resultEjercicio = CatEjercicio::model()->findAll('estado=1 order by id desc');
        $ejercicio = array();
        $ejercicio[0] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

echo CHtml::dropDownList('id_periodo','', $ejercicio); 
 
//empty since it will be filled by the other dropdown


?>


</div>



<div class="span3">
	<?php 

 		$partidas[0] = "TODOS";
    $partidas[1] = "Pagados";
    $partidas[2] = "No pagados";


	echo CHtml::label('Por Pago','terms');
echo CHtml::dropDownList('id_pago','', $partidas); 
 ?>
</div>

<div class="span3">
  <?php 


        $resultareas = Clasif::model()->findAll();
        $areas = array();
        $areas[0] = 'TODOS';
        foreach ($resultareas as $key => $value) {
            $areas[$value->id] = $value->nombre;
        }


  echo CHtml::label('Clasificacion','terms'); 
echo CHtml::dropDownList('id_area','', $areas);  ?>
</div>

     <div class="span3">

<?php echo CHtml::label('proveedor','terms'); ?>
<?php 

$resultpprov = Pagos::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
    'select'=>'proveedor',
    'group'=>"proveedor",
  //  'order'=>'proveedor',
  )));
        $proveedor = array();
        $proveedor[0] = 'TODOS';
        foreach ($resultpprov as $key => $value) {
            $proveedor[$value->proveedor] = "$value->proveedor";
        }

$this->widget('ext.select2.ESelect2',array(
  'name'=>'prov',
   'options'=>array(
                        'placeholder' => 'Seleccionar proveedor', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $proveedor,
)); ?>
</div>

</div>
<div class="row-fluid">
<div class="span3">

<?php
echo CHtml::ajaxSubmitButton(
	'Mostrar',
	//array('informespto/reqSiau'), CatAreas
  array('informesp/reqPagos'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-info') 
);
?>



</div>







</div>
</div>
<div class="row-fluid">
</div>

<?php echo CHtml::endForm();

 ?>
</div><!-- form -->

</div>
</div>

<div id="req_res02">Aqui va
  
</div>
	