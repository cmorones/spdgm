<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informe Presupuesto SIAUWEB
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

echo CHtml::dropDownList('id_periodo','', $ejercicio,
array(
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('presupuesto/trimestre'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#id_trim', //selector to update
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
))); 
 
//empty since it will be filled by the other dropdown


?>


</div>

<div class="span3">
	<?php echo CHtml::label('Presupuesto', 'presupuesto'); ?>

 <?php 

echo CHtml::dropDownList('id_trim','', array());

 ?> 
</div>

<div class="span3">
	<?php 

 		$resulpartida = Partidas::model()->findAll();
        $partidas = array();
        $partidas[0] = 'TODAS LAS PARTIDAS';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo - $value->descripcion";
        }
	echo CHtml::label('Partidas','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_partida',
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
	array('informespto/reqSiau'),
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
	
