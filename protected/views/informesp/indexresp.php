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
        $ejercicio['falso'] = 'Selecciona un ejercicio';
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


	echo CHtml::label('Por Pago','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_pago',
   'options'=>array(
                        'placeholder' => 'Seleccionar Partida', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $partidas,
)); ?>
</div>

</div>
<div class="row-fluid">
<div class="span3">

<?php
echo CHtml::ajaxSubmitButton(
	'Mostrar',
	//array('informespto/reqSiau'),
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

<div id="req_res02">
	