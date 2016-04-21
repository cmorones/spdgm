
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informe General
 </div>
<div class="form">

<div class="row-fluid">

<?php echo CHtml::beginForm(array('Index'), 'post'); ?>


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

</div>
<?php echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm(); ?>

<div class="row-fluid">
</div>	
</div>
</div>

<?php 

if(isset($fecha1,$fecha2)){

//echo $partida;
//echo $fecha2;

	if (($fecha1 != '') && ($fecha1 != '')) {

	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
    'condition'=>"bandera=1 and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));

	}

	if (($fecha1 != '') && ($fecha1 != '')) {
	
	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
    'condition'=>"bandera=1  and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));



	}

if (($fecha1 == '') && ($fecha1 == '') ) {
?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php
} else {

$json =array();
$titulo = "Informe General detalle por mes del $fecha1 al $fecha2";


foreach ($resultado as $key => $row) {

		/*if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			  'grantotal' => 0,
			 );
		endif;

		 if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'fecha_ingreso'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;
		if( !isset($json["informe"]['partida'][$row["partida"]]['fecha_ingreso'][$row["fecha_ingreso"]])): 
			$json["informe"]['partida'][$row["partida"]]['fecha_ingreso'][$row["fecha_ingreso"]] = array(
			  'folio'=> $row["folio"],
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
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['fecha_ingreso'][$row["fecha_ingreso"]]['importe'];
		endif;

		$json["informe"]['grantotal'] = $json["informe"]['grantotal'] + $json["informe"]['partida'][$row["partida"]]['totalpartida'];
*/

}






$this->renderPartial('_rpt', array(
			'model'=>$json,
			'titulo'=>$titulo));

}
	
		
		/*echo "$subprog<br>";
		echo "$id_bandera<br>";
		echo "$fecha1<br>";
        echo "$fecha2<br>"; 

        die();*/

/*	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
    'condition'=>"bandera=$id_bandera and subprog=$subprog and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));

	
       // echo $resultado->getText().'<br/>';
        //the  params which will bind to ...
      //  print_r($resultado);
//;
//	die();
	$json =array();

$sql = "SELECT nombre  from subprog where id=$subprog"; 
	$subprog = Yii::app()->db->createCommand($sql)->queryRow();
	$titulo = "Informe detalle por Subprograma del $fecha1 al $fecha2<br>$subprog[nombre] ";



foreach ($resultado as $key => $row) {

		$sql = "SELECT SUM(presupuesto) as suma from presupuesto where partida=$row[partida] and subprog=$row[subprog]"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

		if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			 );
		endif;
 
        if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'fecha_ingreso'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;

		 if( !isset($json["informe"]['partida'][$row["partida"]]['fecha_ingreso'][$row["fecha_ingreso"]])): 
			$json["informe"]['partida'][$row["partida"]]['fecha_ingreso'][$row["fecha_ingreso"]] = array(
			  'folio'=> $row["folio"],
			  'area'=> $row["area"],
			  'proveedor'=> $row["proveedor"],
			  'importe'=> $row["importe"],
			  'concepto'=> $row["concepto"],
			  'detalle'=> $row["detalle"],
	
				);
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['fecha_ingreso'][$row["fecha_ingreso"]]['importe'];
		endif;


		/*    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
			  'ene' => array(),
			  'feb' => array(),
			  'mar' => array(),
			  'abr' => array(),
			  'may' => array(),
			  'jun' => array(),
			  'jul' => array(),
			  'ago' => array(),
			  'sep' => array(),
			  'oct' => array(),
			  'nov' => array(),
			  'dic' => array(),
              'totalene' => 0,
              'totalfeb' => 0,
              'totalmar' => 0,
              'totalabr' => 0,
              'totalmay' => 0,
              'totaljun' => 0,
              'totaljul' => 0,
              'totalago' => 0,
              'totalsep' => 0,
              'totaloct' => 0,
              'totalnov' => 0,
              'totaldic' => 0,
              'totalejercido' => 0,
              'presupuesto'=> $presupuesto['suma'],
             // 'totalejercido' => 0,
              'disponible'=> 0,
				);
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $presupuesto['suma'];
	  
		endif; 


		$fecha =$row["fecha_ingreso"]; 
		$date = strtotime("$fecha");

		 //Enero
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]) && date("m", $date) =='1'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['enet'] = $json["informe"]['enet'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		
		//$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		//$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}

		 //Febrero
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]) && date("m", $date) =='2'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['febt'] = $json["informe"]['febt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		
		//$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		//$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}

		 //Marzo
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]) && date("m", $date) =='3'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['mart'] = $json["informe"]['mart'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		
		}


		 //Abril
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]) && date("m", $date) =='4'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['abrt'] = $json["informe"]['abrt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		}

		 //May
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]) && date("m", $date) =='5'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['mayt'] = $json["informe"]['mayt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		}

		 //Junio
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]) && date("m", $date) =='6'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['junt'] = $json["informe"]['junt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		
		}

		 //Julio
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]) && date("m", $date) =='7'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['jult'] = $json["informe"]['jult'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		}

			 //Agosto
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]) && date("m", $date) =='8'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['agot'] = $json["informe"]['agot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		}

			 //Septiembre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]) && date("m", $date) =='9'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['sept'] = $json["informe"]['sept'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		}

			 //Octubre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]) && date("m", $date) =='10'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['octt'] = $json["informe"]['octt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		}

			 //Noviembre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]) && date("m", $date) =='11'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
			$json["informe"]['novt'] = $json["informe"]['novt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		}

			 //Diciembre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]) && date("m", $date) =='12'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
			$json["informe"]['dict'] = $json["informe"]['dict'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		}




		///totales

		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"]   ;
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["disponible"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["presupuesto"] - $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"];

$json["informe"]['ejercidot'] = $json["informe"]['enet'] + $json["informe"]['febt'] + $json["informe"]['mart'] + $json["informe"]['abrt'] + $json["informe"]['mayt'] + $json["informe"]['junt'] + $json["informe"]['jult'] + $json["informe"]['agot'] + $json["informe"]['sept'] + $json["informe"]['octt'] + $json["informe"]['novt'] + $json["informe"]['dict'];
$json["informe"]['disponiblet'] = $json["informe"]['presupuestot'] - $json["informe"]['ejercidot'];

*/

	
	//}

	/*	$this->renderPartial('_rpt', array(
			'model'=>$json,
			'titulo'=>$titulo));
	//}*/
}
/*if(isset($id,$fecha1,$fecha2)){

echo $fecha1;
echo $fecha2; 

if (($id!=0) && ($fecha1 != '') && ($fecha1 != '')) {
echo "entra con fechas $id";
// $criteria = new CDbCriteria;
 //$criteria->condition = 'area=' . $id . ' AND (fecha_ingreso BETWEEN "'.$fecha1.'" AND "'.$fecha2.'")';
// $criteria->condition = "'area=' . $id .'";
 

$resultado = BaseCap::model()->find(array( 'order'=>'partida','condition' => 'area=:area', 
'params' => array(':area'=>$id)));

}else {
echo "entra sin fechas $id";
$resultado = BaseCap::model()->findAll(array(
'order'=>'partida',
'condition' => 'area=:area',
'params' => array(':area'=>$id)));
}
		foreach ($resultado as $key => $row) {
			if( !isset( $json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'importetotal'=> 0,
			);
		endif;


	   if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			   'fecha'=>array(), 
				);
		endif;

		 if( !isset($json["informe"]['partida'][$row["partida"]]["fecha"][$row["fecha_ingreso"]])): 
			$json["informe"]['partida'][$row["partida"]]["fecha"][$row["fecha_ingreso"]] = array(
				'folio' => $row["folio"],
				'area' => $row["area"],  
				'importe' => $row["importe"],
				'concepto' => $row["concepto"],
				'fecha_contrarecibo' => $row["fecha_contrarecibo"],
				'no_contrarecibo' => $row["no_contrarecibo"],
				'detalle' => $row["detalle"],
				'proveedor' => $row["proveedor"],   
			);
		endif;

		

		









			}

echo $this->renderPartial('_rpt', array('model'=>$json)); 

}else {
?>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php
}*/
?>