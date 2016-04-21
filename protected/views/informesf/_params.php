



<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informes General Presupuesto por Partida 
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
	<?php echo CHtml::label('Subprograma', 'subprograma'); ?>
<?php

echo CHtml::dropDownList('id_subprog','', array(-1=>'Seleccionar ',0=>'Todos',1=>'Subprograma 1',2=>'Subprograma 2',3=>'Subprograma 3',4=>'Subprograma 4'),
array(
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('presupuesto/partidas'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#id_partida', //selector to update
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
))); 
 
//empty since it will be filled by the other dropdown


?>


</div>

<div class="span3">
	<?php echo CHtml::label('Partidas', 'partidas'); ?>

 <?php 

echo CHtml::dropDownList('id_partida','', array());

 ?> 
</div>

</div>
<div class="row-fluid">
<div class="span3">

<?php
echo CHtml::ajaxSubmitButton(
	'Generar informe ',
	array('informesf/reqTest04'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-info') 
);
?>



</div>
<div class="span9">






</div>
</div>
<div class="row-fluid">
</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->

</div>
</div>

<div id="req_res02">...</div>
<?php 


//echo CHtml::link('PDF',array('informesf/pdf',
  //                      'fecha1'=>'value1')); 
//if(isset($fecha1,$fecha2)){

//echo $fecha1;
//echo $fecha2;


	//if (($fecha1 != '') && ($fecha1 != '')) {


//$titulo = "Informe por Presupuesto del $fecha1 al $fecha2";
/*$titulo = "Informe por Presupuesto 2014";

$url = "http://localhost/spdgm/index.php/api/pto";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo));

	//}


/*	}else {

?>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php

}*/



?>
