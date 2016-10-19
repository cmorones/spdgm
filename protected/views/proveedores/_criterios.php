



<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Proveedores
 </div>


<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">


<div class="span3">
	<?php echo CHtml::label('Tipo','terms');

$subprogramas = array();
$subprogramas[0] = 'TODOS';
$subprogramas[1] = 'Musico';
$subprogramas[2] = 'Orquesta';
$subprogramas[3] = 'Base';
$subprogramas[4] = 'Honorarios';
$subprogramas[5] = 'Confianza';
$subprogramas[6] = 'Funcionarios';
$subprogramas[7] = 'Proveedores';
$subprogramas[8] = 'Becarios';
$subprogramas[9] = 'NT';



   ?>


<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_subprog',
   'options'=>array(
                        'placeholder' => 'Seleccionar tipo', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),

   /*findAll('status=1',array('order'=>'id'))*/
  'data' => $subprogramas,
)); ?>
</div>



<div class="span3">
	<?php echo CHtml::label('Estado','terms'); ?>
<?php 
$areas = array();
$areas[0] = 'TODOS';
$areas[1] = 'Activo';
$areas[2] = 'Baja';




$this->widget('ext.select2.ESelect2',array(
  'name'=>'id_area',
   'options'=>array(
                        'placeholder' => 'Seleccionar Status', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $areas,
)); ?>
</div>


	   <div class="span6">

<?php echo CHtml::label('proveedor','terms'); ?>
<?php 

$resultpprov = Proveedores::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
  //	'select'=>'proveedor',
   // 'group'=>"proveedor",
  // 'order'=>'proveedor',
	)));
        $proveedor = array();
        $proveedor[0] = 'TODOS';
        foreach ($resultpprov as $key => $value) {
            $proveedor[$value->nombre] = "$value->nombre";
        }

$this->widget('ext.select2.ESelect2',array(
  'name'=>'proveedor',
   'options'=>array(
                        'placeholder' => 'Seleccionar proveedor', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $proveedor,
)); ?>
</div>
</div>

<br>
<div class="row-fluid">

   <div class="span6">

<?php echo CHtml::label('Correo','terms'); ?>
<?php 

$resultpprov = Proveedores::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
  //  'select'=>'proveedor',
   // 'group'=>"proveedor",
  // 'order'=>'proveedor',
  )));
        $proveedor = array();
        $proveedor[0] = 'TODOS';
        foreach ($resultpprov as $key => $value) {
            $proveedor[$value->mail] = "$value->mail";
        }

$this->widget('ext.select2.ESelect2',array(
  'name'=>'mail',
   'options'=>array(
                        'placeholder' => 'Seleccionar correo', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $proveedor,
)); ?>
</div>
</div>

<?php
echo CHtml::ajaxSubmitButton(
	'Generar informe ',
	array('proveedores/reqPto'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-success') 
);
?>

<?php //echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm();

 ?>

</div>





</div>
<div class="row-fluid">
<div class="span12">



<div id="req_res02">...</div>


</div>
</div>
<?php 





?>

