<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Actualizar presupuesto por partida
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
	<?php echo CHtml::label('Partida','partida');

$docs = array();
//$docs[0] = 'TODOS';
$q = "SELECT distinct presupuesto.partida FROM presupuesto order by partida";


$cmd = Yii::app()->db->createCommand($q);
$resultado = $cmd->query();

    

    echo CHtml::tag('option', array('value'=>0),'Seleccionar',true);
foreach ($resultado as $row) 
    {


	//$sql = "SELECT nombre from clave_doctos where id=$row[cladgam]"; 
	//$band = Yii::app()->db->createCommand($sql)->queryRow();
   
         $docs[$row['partida']] = "$row[partida]";
    }


   echo CHtml::dropDownList('id_partida','', $docs);
     ?>
</div>

</div>
<div class="row-fluid">
<div class="span3">

<?php
echo CHtml::ajaxSubmitButton(
	'Mostrar',
	array('presupuesto/reqMostrar'),
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
	

<?php
if($valores!=0){
?>

<div class="row-fluid">


<div class="span3"></div>
<div class="span6">
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Se registro Correctamente!!!!!!!!
 </div>
<div class="form">

<div class="form">
<?php //echo CHtml::beginForm('registro2','post'); ?>



<table class="table table-striped  table-hover">
	<tr>
	<th>Subprograma</th>
	<th>Partida</th>
	<th>Tipo</th>
	<th>Importe</th>
	</tr>


<?php

//print_r($valores);
$total =0;
foreach ($valores as $key => $row) {

 $q = "UPDATE presupuesto set presupuesto='$row'  WHERE id='$key'";
 $cmd = Yii::app()->db->createCommand($q);
 $cmd->execute();






 $sql = "SELECT presupuesto.subprog, presupuesto.partida, tipo.nombre  from presupuesto, tipo 
 where 
 presupuesto.tipo=tipo.id and presupuesto.id=$key"; 
 $presupuesto = Yii::app()->db->createCommand($sql)->queryRow();


    $importe =number_format($row,2);
 
    echo "<tr>";
	    echo "<td align=\"center\">$presupuesto[subprog]</td>";
	    echo "<td align=\"center\">$presupuesto[partida]</td>";
	    echo "<td align=\"right\">$presupuesto[nombre]</td>";
	    echo "<td align=\"right\">$importe</td>";
    echo "</tr>";
   

	$total =$total + $row;

}
 $totalf = number_format($total,2);
 echo "<tr>";
	    echo "<td align=\"center\"></td>";
	    echo "<td align=\"center\"></td>";
	    echo "<td align=\"right\"><strong>Subtotal</strong></td>";
	    echo "<td align=\"right\">$totalf</td>";
    echo "</tr>";

$totalf2 = number_format($totalf2,2);

/* echo "<tr>";
	    echo "<td align=\"center\"></td>";
	    echo "<td align=\"center\"></td>";
	    echo "<td align=\"right\"><strong>Gran Total</strong></td>";
	    echo "<td align=\"right\">$totalf2</td>";
    echo "</tr>";*/

 /*  echo "<tr>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"><strong>Subtotal</strong></td>";
	    echo "<td align=\"right\"><input type=\"text\" id=\"total\" disabled value=\"0\"></td>";
    echo "</tr>";*/

?>
</table>


<?php //echo CHtml::submitButton('Registrar', array('name' => 'button1','class'=>'btn-success')); ?>
<?php //echo CHtml::endForm(); ?>

</div><!-- form -->

</div>
</div>
</div>
<div class="span2"></div>
</div>


<?php



}

?>

</div>
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