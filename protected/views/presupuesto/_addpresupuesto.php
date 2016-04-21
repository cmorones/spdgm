

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informes
 </div>
<div class="form">

<div class="row-fluid">

<?php echo CHtml::beginForm(array('generar'), 'post'); ?>

<div class="span3">
<?php
echo CHtml::dropDownList('id_periodo','', array(0=>'Seleccionar',18=>'2013',19=>'2014',20=>'2015',21=>'2016'),
array(
  'id'=>'id_periodo',
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
 <?php 

echo CHtml::dropDownList('id_trim','', array());

 ?> 
</div>


<?php echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm(); ?>
</div>
<div class="row-fluid">
</div>	
</div>
</div>

<?

if ($id_periodo==0 && $id_trim==0 ){


}  else {

$trim_ant = $id_trim -2;

	$sql ="INSERT INTO presupuesto (
  grupo,
  subprog,
  partida,
  tipo,
  area,
  presupuesto,
  gasto,
  disponible,
  fecha_reg,
  oficio,
  id_periodo,
  id_trimestre )
  SELECT 
  grupo,
  subprog,
  partida,
  tipo,
  area,
  0,
  gasto,
  disponible,
  fecha_reg,
  oficio,
  $id_periodo,
  $id_trim FROM presupuesto where id_trimestre=$trim_ant";


$command=Yii::app()->db->createCommand($sql);
$command->execute();

?>
</div>
</diV>
<div class="alert alert-success">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!!</strong>
Se genero el presupuesto con base al anterior!!!!!!!!!.
</div>
</div>
<?php echo CHtml::link('Aceptar', array('admin'), array('class'=>'btnback '));?>
<?


}
?>