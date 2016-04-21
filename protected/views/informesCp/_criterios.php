



<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Consulta Presupuestal 2014
 </div>
<div class="form">

<div class="form">
<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">
<div class="span3">
	<?php echo CHtml::label('Proyectos','terms');

$subprogramas = array();
$subprogramas[0] = 'TODOS';

$resultpprov = Subprogramas::model()->findAll((array(
    'condition'=>'status=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
   // 'condition'=>"bandera=$id_bandera and area=$subprog and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'id'
  )));

 foreach ($resultpprov as $key => $value) {
            $subprogramas[$value->id] = "$value->alias2";
        }

   ?>


<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_subprog',
   'options'=>array(
                        'placeholder' => 'Seleccionar Proyecto', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),

   /*findAll('status=1',array('order'=>'id'))*/
  'data' => $subprogramas,
)); ?>
</div>

<div class="span3">
	<?php 

 		
/*$partidas[1] = 'TOTAL POR PARTIDA';
$partidas[2] = 'TOTAL POR SUBPROGRAMAS';
       
echo CHtml::label('Total','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_tipo',
   'options'=>array(
                        'placeholder' => 'Seleccionar Partida', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $partidas,
));*/ ?>
</div>




</div>
<div class="row-fluid">
<div class="span3">

<?php
echo CHtml::ajaxSubmitButton(
	'Generar informe ',
	array('informesCp/reqPto'),
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
<?php //echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm();

 ?>
</div><!-- form -->

</div>
</div>

<div id="req_res02">...</div>
<?php 

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.fancy-inline',
    'config'=>array(),
));


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

