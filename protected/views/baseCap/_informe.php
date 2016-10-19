
<?php


$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
	$periodo = Yii::app()->db->createCommand($sql)->queryRow();
 $anio = $periodo['nombre'];
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Conciliación Gastos <?=$anio?>
 </div>
<div class="form">

<div class="form">
<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">
<div class="span3">
<?php echo CHtml::hiddenField('id' , $id, array('id' => 'id')); ?>
	<?php echo CHtml::label('Informe por','terms');

$subprogramas = array();
$subprogramas[-1] = 'TODOS';
$subprogramas[0] = 'NO CONCILIADO';
$subprogramas[1] = 'CONCILIADO';


   ?>


<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'tipo',
   'options'=>array(
                        'placeholder' => 'Seleccionar ', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),

   /*findAll('status=1',array('order'=>'id'))*/
  'data' => $subprogramas,
)); ?>
</div>
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
			'yearRange' =>  "$anio:$anio",


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
			'yearRange' =>  "$anio:$anio",

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
</div>


<div class="row-fluid">
<div class="span2">

<?php
echo CHtml::ajaxSubmitButton(
	'Generar informe ',
	array('baseCap/reqInforme'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-success') 
);
?>

</div>



<?php //echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm();

 ?>
</div><!-- form -->

</div>
</div>
</div>


<div class='span12'>
<div id="req_res02">...</div>
</div>
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

