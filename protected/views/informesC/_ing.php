



<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Consulta Ingresos 2014
 </div>
<div class="form">

<div class="form">
<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">
<div class="span3">

<?php echo CHtml::label('Fecha de Inicio', 'fecha1'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
		// you must specify name or model/attribute
		//'model'=>$model,
		//'attribute'=>'projectDateStart',
		'name'=>'fecha1',

		// optional: what's the initial value/date?
		//'value' => $model->projectDateStart
		//'value' => '08/20/2010',

		// optional: change the language
		//'language' => 'de',
		//'language' => 'fr',
		//'language' => 'es',
		'language' => 'es',

		/* optional: change visual
		 * themeUrl: "where the themes for this widget are located?"
		 * theme: theme name. Note that there must be a folder under themeUrl with the theme name
		 * cssFile: specifies the css file name under the theme folder. You may specify a
		 *          single filename or an array of filenames
		 * try http://jqueryui.com/themeroller/
		*/
	//	'themeUrl' => Yii::app()->baseUrl.'/css/pool' ,
	//	'theme'=>'pool',	//try 'bee' also to see the changes
	//	'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),


		//  optional: jquery Datepicker options
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy-mm-dd',
			'yearRange' => '2013:2014',


			// user will be able to change month and year
			'changeMonth' => 'true',
			'changeYear' => 'true',

			// shows the button panel under the calendar (buttons like "today" and "done")
			'showButtonPanel' => 'true',

			// this is useful to allow only valid chars in the input field, according to dateFormat
			'constrainInput' => 'false',

			// speed at which the datepicker appears, time in ms or "slow", "normal" or "fast"
			'duration'=>'fast',

			// animation effect, see http://docs.jquery.com/UI/Effects
			'showAnim' =>'slide',
		),


		// optional: html options will affect the input element, not the datepicker widget itself
		'htmlOptions'=>array(
		/*'style'=>'height:30px;
			background:#ffbf00;
			color:#00a;
			font-weight:bold;
			font-size:0.9em;
			border: 1px solid #A80;
			padding-left: 4px;'*/
		)
	)
);
 ?>
</div>

<div class="span3">
<?php echo CHtml::label('Fecha de Termino', 'fecha2'); ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
	array(
		// you must specify name or model/attribute
		//'model'=>$model,
		//'attribute'=>'projectDateStart',
		'name'=>'fecha2',

		// optional: what's the initial value/date?
		//'value' => $model->projectDateStart
		//'value' => '08/20/2010',

		// optional: change the language
		//'language' => 'de',
		//'language' => 'fr',
		//'language' => 'es',
		'language' => 'es',

		/* optional: change visual
		 * themeUrl: "where the themes for this widget are located?"
		 * theme: theme name. Note that there must be a folder under themeUrl with the theme name
		 * cssFile: specifies the css file name under the theme folder. You may specify a
		 *          single filename or an array of filenames
		 * try http://jqueryui.com/themeroller/
		*/
	//	'themeUrl' => Yii::app()->baseUrl.'/css/pool' ,
	//	'theme'=>'pool',	//try 'bee' also to see the changes
	//	'cssFile'=>array('jquery-ui.css' /*,anotherfile.css, etc.css*/),


		//  optional: jquery Datepicker options
		'options' => array(
			// how to change the input format? see http://docs.jquery.com/UI/Datepicker/formatDate
			'dateFormat'=>'yy-mm-dd',

			// user will be able to change month and year
			'changeMonth' => 'true',
			'changeYear' => 'true',

			// shows the button panel under the calendar (buttons like "today" and "done")
			'showButtonPanel' => 'true',

			// this is useful to allow only valid chars in the input field, according to dateFormat
			'constrainInput' => 'false',

			// speed at which the datepicker appears, time in ms or "slow", "normal" or "fast"
			'duration'=>'fast',

			// animation effect, see http://docs.jquery.com/UI/Effects
			'showAnim' =>'slide',
		),


		// optional: html options will affect the input element, not the datepicker widget itself
		'htmlOptions'=>array(
		/*'style'=>'height:30px;
			background:#ffbf00;
			color:#00a;
			font-weight:bold;
			font-size:0.9em;
			border: 1px solid #A80;
			padding-left: 4px;'*/
		)
	)
);
 ?>
</div>
<div class="span3">
	<?php echo CHtml::label('Subprograma','terms');

$subprogramas = array();
$subprogramas[0] = 'TODOS';

$resultpprov = Subprogramas::model()->findAll((array(
    'condition'=>'status=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
   // 'condition'=>"bandera=$id_bandera and area=$subprog and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'id'
  )));

 foreach ($resultpprov as $key => $value) {
            $subprogramas[$value->id] = "$value->alias";
        }

   ?>


<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id_subprog',
   'options'=>array(
                        'placeholder' => 'Seleccionar Subprograma', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),

   /*findAll('status=1',array('order'=>'id'))*/
  'data' => $subprogramas,
)); ?>
</div>



<div class="span3">
	<?php echo CHtml::label('Area','terms'); ?>
<?php 
$areas = array();
$areas[0] = 'TODOS';

$resultpprov = CatAreas::model()->findAll();

 foreach ($resultpprov as $key => $value) {
            $areas[$value->id] = "$value->nombre";
        }


$this->widget('ext.select2.ESelect2',array(
  'name'=>'id_area',
   'options'=>array(
                        'placeholder' => 'Seleccionar Area', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $areas,
)); ?>
</div>




</div>
<div class="row-fluid">
	   <div class="span3">

<?php echo CHtml::label('proveedor','terms'); ?>
<?php 

$resultpprov = BaseCap::model()->findAll((array(
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
  'name'=>'proveedor',
   'options'=>array(
                        'placeholder' => 'Seleccionar proveedor', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $proveedor,
)); ?>
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

<div class="span3">
	<?php echo CHtml::label('Bandera','terms'); ?>
<?php 

$bandera = array();
$bandera[0] = 'TODAS';

$resultpprov = Banderas::model()->findAll((array(
    'condition'=>'status=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
   // 'condition'=>"bandera=$id_bandera and area=$subprog and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'nombre desc'
	)), 'id', 'nombre');

 foreach ($resultpprov as $key => $value) {
            $bandera[$value->id] = "$value->nombre";
        }

$this->widget('ext.select2.ESelect2',array(
  'name'=>'id_bandera',
   'options'=>array(
                        'placeholder' => 'Seleccionar Bandera', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),

   /*findAll('status=1',array('order'=>'id'))*/
  'data' => $bandera,
)); ?>
</div>

<div class="span3">
	    <?php echo CHtml::label('Observaciones','terms');?>
		 <?echo(CHtml::textField('observa','',array('class'=>'input-large ')));?>
		
	</div>

</div>
<div class="row-fluid">
<div class="span2">

<?php
echo CHtml::ajaxSubmitButton(
	'Generar informe ',
	array('informesC/reqIng'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-success') 
);
?>

</div>

<div class="span2">

<?php echo CHtml::submitButton('Limpiar formulario',array('class'=>'btn-info')); ?>


</div>
<div class="span8">






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