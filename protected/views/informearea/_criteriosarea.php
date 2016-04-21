<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informes por Area
 </div>
<div class="form">

<div class="row-fluid">
    <div class="span4">
<?php echo CHtml::beginForm(array('Index'), 'post'); ?>
<?php echo CHtml::label('Seleccionar Area','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'id',
   'options'=>array(
                        'placeholder' => 'Seleccionar Area', 
                        'width'=>'80%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => CHtml::listData(CatAreas::model()->findAll(), 'id', 'nombre'),
)); ?>
</div>
<div class="span2">
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
<div class="span2">
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
<?php echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm(); ?>
</div>


</div>

</div>
</div>


<?php 

if(isset($id,$fecha1,$fecha2)){

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



		/* if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'fecha'=> array(),
	
				);
		endif;

		/* if( !isset($json["informe"]['partida'][$row["partida"]]["fecha"][$row["fecha_ingreso"]])): 
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
		endif;*/

		

		









			}

echo $this->renderPartial('_rpt', array('model'=>$json)); 

}else {
?>

<?php
}
?>