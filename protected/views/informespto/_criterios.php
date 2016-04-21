<br>
<BR>
<?php

$resultado = Presupuesto::model()->findAll((array(
    'condition'=>'id_periodo=1',
    'order'=>'grupo,partida'
	)));

$titulo = "Informe Presupuestal General 2013";




foreach ($resultado as $key => $row) {

		if( !isset($json['informe'] ) ): 
			$json['informe'] = array(
			  'registros' => array(),
			  'presupuestot'=> 0,
             
			);
		endif;

		$sql = "SELECT codigo from cat_grupos where id=$row[grupo]"; 
		$grupo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		if($row["tipo"] == 1){
			$tipo ="D";
		}
		if($row["tipo"] == 2){
			$tipo ="C";
		}
		if($row["tipo"] == 3){
			$tipo ="S";
		}

		if( !isset( $json['informe']['registros'][$row["id"]]) ): 
			$json['informe']['registros'][$row["id"]] = array(
			  'grupo' => $grupo['codigo'],
			  'subprog' => $row["subprog"], 
			  'partida' => $row["partida"],
			  'tipo' => $tipo,
			  'area' => $row["area"],
			  'presupuesto' => $row["presupuesto"],
			  'descripcion' => $partida["descripcion"],              
			);
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $row["presupuesto"];
		endif;




		/*	if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
			$json["informe"]['partida'][$row["partida"]] = array(
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
		if( !isset($json["informe"]['partida'][$row["partida"]]["ene"][$row["fecha_ingreso"]]) && date("m", $date) =='1'){ 
			$json["informe"]['partida'][$row["partida"]]["ene"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalene"] = $json["informe"]['partida'][$row["partida"]]["totalene"]  + $json["informe"]['partida'][$row["partida"]]["ene"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['enet'] = $json["informe"]['enet'] + $json["informe"]['partida'][$row["partida"]]["ene"][$row["fecha_ingreso"]]['importe'];
		
		//$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		//$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}

		 //Febrero
		if( !isset($json["informe"]['partida'][$row["partida"]]["feb"][$row["fecha_ingreso"]]) && date("m", $date) =='2'){ 
			$json["informe"]['partida'][$row["partida"]]["feb"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalfeb"] = $json["informe"]['partida'][$row["partida"]]["totalfeb"]  + $json["informe"]['partida'][$row["partida"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['febt'] = $json["informe"]['febt'] + $json["informe"]['partida'][$row["partida"]]["feb"][$row["fecha_ingreso"]]['importe'];
		
		//$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		//$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}

		 //Marzo
		if( !isset($json["informe"]['partida'][$row["partida"]]["mar"][$row["fecha_ingreso"]]) && date("m", $date) =='3'){ 
			$json["informe"]['partida'][$row["partida"]]["mar"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalmar"] = $json["informe"]['partida'][$row["partida"]]["totalmar"]  + $json["informe"]['partida'][$row["partida"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['mart'] = $json["informe"]['mart'] + $json["informe"]['partida'][$row["partida"]]["mar"][$row["fecha_ingreso"]]['importe'];
		
		}


		 //Abril
		if( !isset($json["informe"]['partida'][$row["partida"]]["abr"][$row["fecha_ingreso"]]) && date("m", $date) =='4'){ 
			$json["informe"]['partida'][$row["partida"]]["abr"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalabr"] = $json["informe"]['partida'][$row["partida"]]["totalabr"]  + $json["informe"]['partida'][$row["partida"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['abrt'] = $json["informe"]['abrt'] + $json["informe"]['partida'][$row["partida"]]["abr"][$row["fecha_ingreso"]]['importe'];
		}

		 //May
		if( !isset($json["informe"]['partida'][$row["partida"]]["may"][$row["fecha_ingreso"]]) && date("m", $date) =='5'){ 
			$json["informe"]['partida'][$row["partida"]]["may"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalmay"] = $json["informe"]['partida'][$row["partida"]]["totalmay"]  + $json["informe"]['partida'][$row["partida"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['mayt'] = $json["informe"]['mayt'] + $json["informe"]['partida'][$row["partida"]]["may"][$row["fecha_ingreso"]]['importe'];
		}

		 //Junio
		if( !isset($json["informe"]['partida'][$row["partida"]]["jun"][$row["fecha_ingreso"]]) && date("m", $date) =='6'){ 
			$json["informe"]['partida'][$row["partida"]]["jun"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totaljun"] = $json["informe"]['partida'][$row["partida"]]["totaljun"]  + $json["informe"]['partida'][$row["partida"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['junt'] = $json["informe"]['junt'] + $json["informe"]['partida'][$row["partida"]]["jun"][$row["fecha_ingreso"]]['importe'];
		
		}

		 //Julio
		if( !isset($json["informe"]['partida'][$row["partida"]]["jul"][$row["fecha_ingreso"]]) && date("m", $date) =='7'){ 
			$json["informe"]['partida'][$row["partida"]]["jul"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totaljul"] = $json["informe"]['partida'][$row["partida"]]["totaljul"]  + $json["informe"]['partida'][$row["partida"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['jult'] = $json["informe"]['jult'] + $json["informe"]['partida'][$row["partida"]]["jul"][$row["fecha_ingreso"]]['importe'];
		}

			 //Agosto
		if( !isset($json["informe"]['partida'][$row["partida"]]["ago"][$row["fecha_ingreso"]]) && date("m", $date) =='8'){ 
			$json["informe"]['partida'][$row["partida"]]["ago"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalago"] = $json["informe"]['partida'][$row["partida"]]["totalago"]  + $json["informe"]['partida'][$row["partida"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['agot'] = $json["informe"]['agot'] + $json["informe"]['partida'][$row["partida"]]["ago"][$row["fecha_ingreso"]]['importe'];
		}

			 //Septiembre
		if( !isset($json["informe"]['partida'][$row["partida"]]["sep"][$row["fecha_ingreso"]]) && date("m", $date) =='9'){ 
			$json["informe"]['partida'][$row["partida"]]["sep"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalsep"] = $json["informe"]['partida'][$row["partida"]]["totalsep"]  + $json["informe"]['partida'][$row["partida"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['sept'] = $json["informe"]['sept'] + $json["informe"]['partida'][$row["partida"]]["sep"][$row["fecha_ingreso"]]['importe'];
		}

			 //Octubre
		if( !isset($json["informe"]['partida'][$row["partida"]]["oct"][$row["fecha_ingreso"]]) && date("m", $date) =='10'){ 
			$json["informe"]['partida'][$row["partida"]]["oct"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totaloct"] = $json["informe"]['partida'][$row["partida"]]["totaloct"]  + $json["informe"]['partida'][$row["partida"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['octt'] = $json["informe"]['octt'] + $json["informe"]['partida'][$row["partida"]]["oct"][$row["fecha_ingreso"]]['importe'];
		}

			 //Noviembre
		if( !isset($json["informe"]['partida'][$row["partida"]]["nov"][$row["fecha_ingreso"]]) && date("m", $date) =='11'){ 
			$json["informe"]['partida'][$row["partida"]]["nov"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totalnov"] = $json["informe"]['partida'][$row["partida"]]["totalnov"]  + $json["informe"]['partida'][$row["partida"]]["nov"][$row["fecha_ingreso"]]['importe'];
			$json["informe"]['novt'] = $json["informe"]['novt'] + $json["informe"]['partida'][$row["partida"]]["nov"][$row["fecha_ingreso"]]['importe'];
		}

			 //Diciembre
		if( !isset($json["informe"]['partida'][$row["partida"]]["dic"][$row["fecha_ingreso"]]) && date("m", $date) =='12'){ 
			$json["informe"]['partida'][$row["partida"]]["dic"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]["totaldic"] = $json["informe"]['partida'][$row["partida"]]["totaldic"]  + $json["informe"]['partida'][$row["partida"]]["dic"][$row["fecha_ingreso"]]['importe'];
			$json["informe"]['dict'] = $json["informe"]['dict'] + $json["informe"]['partida'][$row["partida"]]["dic"][$row["fecha_ingreso"]]['importe'];
		}




		///totales

		$json["informe"]['partida'][$row["partida"]]["totalejercido"] = $json["informe"]['partida'][$row["partida"]]["totalene"] + $json["informe"]['partida'][$row["partida"]]["totalfeb"] +  $json["informe"]['partida'][$row["partida"]]["totalmar"] +  $json["informe"]['partida'][$row["partida"]]["totalabr"] +  $json["informe"]['partida'][$row["partida"]]["totalmay"] +  $json["informe"]['partida'][$row["partida"]]["totaljun"] +  $json["informe"]['partida'][$row["partida"]]["totaljul"] +  $json["informe"]['partida'][$row["partida"]]["totalago"] +  $json["informe"]['partida'][$row["partida"]]["totalsep"] +  $json["informe"]['partida'][$row["partida"]]["totaloct"] +  $json["informe"]['partida'][$row["partida"]]["totalnov"] +  $json["informe"]['partida'][$row["partida"]]["totaldic"]   ;
		$json["informe"]['partida'][$row["partida"]]["disponible"] = $json["informe"]['partida'][$row["partida"]]["presupuesto"] - $json["informe"]['partida'][$row["partida"]]["totalejercido"];

$json["informe"]['ejercidot'] = $json["informe"]['enet'] + $json["informe"]['febt'] + $json["informe"]['mart'] + $json["informe"]['abrt'] + $json["informe"]['mayt'] + $json["informe"]['junt'] + $json["informe"]['jult'] + $json["informe"]['agot'] + $json["informe"]['sept'] + $json["informe"]['octt'] + $json["informe"]['novt'] + $json["informe"]['dict'];
$json["informe"]['disponiblet'] = $json["informe"]['presupuestot'] - $json["informe"]['ejercidot'];
*/
		}


		$this->renderPartial('_rpt', array(
			'model'=>$json,
			'titulo'=>$titulo));
	

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
