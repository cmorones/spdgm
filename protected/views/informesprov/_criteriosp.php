

<h3>Informe por proveedor</h3>
<div class="form">

<div class="row-fluid">
    <div class="span6">
<?php echo CHtml::beginForm(array('Proveedor'), 'post'); ?>

<?php echo CHtml::label('Seleccionar proveedor','terms'); ?>
<?php 

$resultpprov = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
  	'select'=>'proveedor',
    'group'=>"proveedor",
  //  'order'=>'proveedor',
	)));
        $proveedor = array();
        //$partidas[0] = 'TODAS LAS PARTIDAS';
        foreach ($resultpprov as $key => $value) {
            $proveedor[$value->proveedor] = "$value->proveedor";
        }

$this->widget('ext.select2.ESelect2',array(
  'name'=>'id',
   'options'=>array(
                        'placeholder' => 'Seleccionar proveedor', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => $proveedor,
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
<?php echo CHtml::submitButton('Generar'); ?>
<?php echo CHtml::endForm(); ?>
</div>

<?php 

if(isset($fecha1,$fecha2,$id)){



	if (($fecha1 != '') && ($fecha1 != '') && ($id != '')) {

	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
    'condition'=>"proveedor='$id' and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog,fecha_ingreso'
	)));

	}





	

if (($fecha1 == '') && ($fecha1 == '') && ($id == '')) {
?>

</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php
} else {

//print_r($resultado);
//die();

$json =array();
$titulo = "Informe General detalle por provveedor del $fecha1 al $fecha2";
$contador=1;


foreach ($resultado as $key => $row) {



		if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			  'grantotal' => 0,
			 );
		endif;

		 if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			//  'folios'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;
		if( !isset($json["informe"]['partida'][$row["partida"]]['folio'][$row["folio"]])): 
			$json["informe"]['partida'][$row["partida"]]['folios'][$row["folio"]] = array(
			  'folio'=> $row["folio"],
			  'fecha'=> $row["fecha_ingreso"],
			  'subprog' => $row["subprog"], 
			  'area'=> $row["area"],
			  'proveedor'=> $row["proveedor"],
			  'importe'=> $row["importe"],
			  'concepto'=> $row["concepto"],
			  'partida'=> $row["partida"],
			  'fecha_contrarecibo'=> $row["fecha_contrarecibo"],
			  'no_contrarecibo'=> $row["no_contrarecibo"],
			  'detalle'=> $row["detalle"],
	
				);
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['folios'][$row["folio"]]['importe'];

		endif;

$json["informe"]['grantotal'] = $json["informe"]['grantotal'] + $json["informe"]['partida'][$row["partida"]]['folios'][$row["folio"]]['importe'];
		
		

}


	




$this->renderPartial('_rpt', array(
			'model'=>$json,
			'titulo'=>$titulo));

}
	

}

?>

