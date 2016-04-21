<?php


class ApiController extends Controller {

public function actionJson2() {
$data = array(
'title'=>'Dynamic!',
'content'=>'<p>Lorem ipsum <em>dolor</em>...</p>'
);
echo CJSON::encode($data);
}


public function actionPresupuestosiau(){

$this->layout=false;

$resultado = SiauP::model()->findAll((array(
  //  'condition'=>'id_periodo=2',
    'order'=>'partida'
	)));

//$titulo = "Informe Presupuestal General 2013";




foreach ($resultado as $key => $row) {

	$sql = "SELECT SUM(presupuesto) as suma from presupuesto where id_trimestre=5 and partida=$row[partida]"; 
	$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

	$diferencia = $presupuesto['suma'] - $row["autorizado"];

		if( !isset($json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'asignadot'=> 0,
			  'autorizadot'=> 0,
			  'disponiblet'=> 0,
			  'cuentasxpagart'=> 0,
			  'ejercidot'=> 0,
			  'ingresosextrat'=> 0,
             
			);
		endif;

			if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
			$json["informe"]['partida'][$row["partida"]] = array(
			'asignado'=> $row["asignado"],
			'autorizado'=> $row["autorizado"],
			'check'=> $diferencia,
			'disponible'=> $row["disponible"],
			'cuentasxpagar'=> $row["cuentasxpagar"],
			'ejercido'=> $row["ejercido"],
			'ingresos_extra'=> $row["ingresos_extra"],
			//'presupuestopartida'=> 0,
             // 'totalejercido' => 0,
          	);

			endif;

			  $json["informe"]['asignadot'] =   $json["informe"]['asignadot'] + $row["asignado"];
			  $json["informe"]['autorizadot'] =   $json["informe"]['autorizadot'] + $row["autorizado"];
			  $json["informe"]['disponiblet'] =   $json["informe"]['disponiblet'] + $row["disponible"];
			  $json["informe"]['cuentasxpagart'] =   $json["informe"]['cuentasxpagart'] + $row["cuentasxpagar"];
			  $json["informe"]['ejercidot'] =   $json["informe"]['ejercidot'] + $row["ejercido"];
			  $json["informe"]['ingresosextrat'] =   $json["informe"]['ingresosextrat'] + $row["ingresos_extra"];

			/*if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'codigo'=> $codigo["codigo"],
	
				);
		endif;

	/*	$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; */



		}  


header('Content-type: application/json');  
echo json_encode($json);  
Yii::app()->end(); 
}
public function actionPresupuestosiau2($id_periodo,$id_trim,$id_partida){

$this->layout=false;

if($id_partida==0){

$resultado = Siaup::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and id_trim=$id_trim",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'partida,subprog'
	)));
}else {

	$resultado = Siaup::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and id_trim=$id_trim and partida=$id_partida",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'partida,subprog'
	)));
}





foreach ($resultado as $key => $row) {

	$sql = "SELECT presupuesto from presupuesto where id_periodo=$row[id_periodo] and id_trimestre=$row[id_trim] and partida=$row[partida] and subprog=$row[subprog]"; 
	$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

	$sql = "SELECT alias from subprog where id=$row[subprog]"; 
	$subprog = Yii::app()->db->createCommand($sql)->queryRow();

	$diferencia = $presupuesto['presupuesto'] - $row["autorizado"];

		if( !isset($json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'asignadot'=> 0,
			  'autorizadot'=> 0,
			  'disponiblet'=> 0,
			  'cuentasxpagart'=> 0,
			  'ejercidot'=> 0,
			  'ingresosextrat'=> 0,
             
			);
		endif;

			if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
			$json["informe"]['partida'][$row["partida"]] = array(
			'subprog' => array(),
			  'asignadotp'=> 0,
			  'autorizadotp'=> 0,
			  'disponibletp'=> 0,
			  'cuentasxpagartp'=> 0,
			  'ejercidotp'=> 0,
			  'ingresosextratp'=> 0,
          	);
			endif;

			if( !isset($json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]) ): 
			$json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]] = array(
			
			'asignado'=> $row["asignado"],
			'autorizado'=> $row["autorizado"],
			'check'=> $diferencia,
			'disponible'=> $row["disponible"],
			'cuentasxpagar'=> $row["cuentasxpagar"],
			'ejercido'=> $row["ejercido"],
			'ingresos_extra'=> $row["ingresos_extra"],
			//'presupuestopartida'=> 0,
             // 'totalejercido' => 0,
          	);
			endif;
			
			 $json["informe"]['partida'][$row["partida"]]['asignadotp'] = $json["informe"]['partida'][$row["partida"]]['asignadotp'] + $json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]['asignado'];
			 $json["informe"]['partida'][$row["partida"]]['autorizadotp'] = $json["informe"]['partida'][$row["partida"]]['autorizadotp'] + $json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]['autorizado'];
			 $json["informe"]['partida'][$row["partida"]]['disponibletp'] = $json["informe"]['partida'][$row["partida"]]['disponibletp'] + $json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]['disponible'];
			 $json["informe"]['partida'][$row["partida"]]['cuentasxpagartp'] = $json["informe"]['partida'][$row["partida"]]['cuentasxpagartp'] + $json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]['cuentasxpagar'];
			 $json["informe"]['partida'][$row["partida"]]['ejercidotp'] = $json["informe"]['partida'][$row["partida"]]['ejercidotp'] + $json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]['ejercido'];
			 $json["informe"]['partida'][$row["partida"]]['ingresosextratp'] = $json["informe"]['partida'][$row["partida"]]['ingresosextratp'] + $json["informe"]['partida'][$row["partida"]]["subprog"][$subprog["alias"]]['ingresos_extra'];



			  $json["informe"]['asignadot'] =   $json["informe"]['asignadot'] + $row["asignado"];
			  $json["informe"]['autorizadot'] =   $json["informe"]['autorizadot'] + $row["autorizado"];
			  $json["informe"]['disponiblet'] =   $json["informe"]['disponiblet'] + $row["disponible"];
			  $json["informe"]['cuentasxpagart'] =   $json["informe"]['cuentasxpagart'] + $row["cuentasxpagar"];
			  $json["informe"]['ejercidot'] =   $json["informe"]['ejercidot'] + $row["ejercido"];
			  $json["informe"]['ingresosextrat'] =   $json["informe"]['ingresosextrat'] + $row["ingresos_extra"];

			/*if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'codigo'=> $codigo["codigo"],
	
				);
		endif;

	/*	$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; */



		}  


header('Content-type: application/json');  
echo json_encode($json);  
Yii::app()->end(); 
}


public function actionPresupuesto(){

$this->layout=false;

$resultado = Presupuesto::model()->findAll((array(
    'condition'=>'id_trimestre=5',
    'order'=>'grupo,partida'
	)));

$titulo = "Informe Presupuestal General 2013";




foreach ($resultado as $key => $row) {

		if( !isset($json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'presupuestot'=> 0,
             
			);
		endif;

			if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
			$json["informe"]['partida'][$row["partida"]] = array(
			'subprog'=> array(),
			'presupuestopartida'=> 0,
             // 'totalejercido' => 0,
          
				);
			endif;

			if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'subprog'=> array(),
	
				);
		endif;

		$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; 



		}  


header('Content-type: application/json');  
echo json_encode($json);  
Yii::app()->end(); 
}

public function actionPresupuesto2do($id_periodo,$id_trim,$id_partida){

$this->layout=false;

if($id_partida==0){

$resultado = Presupuesto::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and id_trimestre=$id_trim and presupuesto<>0",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'partida,subprog'
	)));
}else {
	$resultado = Presupuesto::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and id_trimestre=$id_trim and partida=$id_partida and presupuesto<>0",
   // 'condition'=>"id_periodo=$id_periodo", AND 
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'partida,subprog'
	)));
}

$titulo = "Informe Presupuestal General 2013";




foreach ($resultado as $key => $row) {

		if( !isset($json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'presupuestot'=> 0,
             
			);
		endif;

			if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
			$json["informe"]['partida'][$row["partida"]] = array(
			'subprog'=> array(),
			'presupuestopartida'=> 0,
             // 'totalejercido' => 0,
          
				);
			endif;

			if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'subprog'=> array(),
	
				);
		endif;

		$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; 



		}  


header('Content-type: application/json');  
echo json_encode($json);  
Yii::app()->end(); 
}

public function actionPresupuesto3er(){

$this->layout=false;

$resultado = Presupuesto::model()->findAll((array(
    'condition'=>'id_trimestre=7',
    'order'=>'grupo,partida'
	)));

$titulo = "Informe Presupuestal General 2013";




foreach ($resultado as $key => $row) {

		if( !isset($json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'presupuestot'=> 0,
             
			);
		endif;

			if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
			$json["informe"]['partida'][$row["partida"]] = array(
			'subprog'=> array(),
			'presupuestopartida'=> 0,
             // 'totalejercido' => 0,
          
				);
			endif;

			if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'subprog'=> array(),
	
				);
		endif;

		$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; 



		}  


header('Content-type: application/json');  
echo json_encode($json);  
Yii::app()->end(); 
}


public function actionJson($fecha1, $fecha2) {
	   		 $this->layout=false;  
    		//$arr=array('Fechas'=>array( $fecha1,$fecha2),'Vegetables'=>array('beans','carrot'));  
    			
	   		 	$resultado = BaseCap::model()->findAll((array(
    'condition'=>"bandera=1",
    'condition'=>"fecha_ingreso BETWEEN '$fecha1' AND '$fecha2'",
    'order'=>'partida'
	)));

	$sql = "SELECT nombre  from banderas where id=1"; 
$nombandera = Yii::app()->db->createCommand($sql)->queryRow();

	$titulo = "Informe Presupuestal General del $fecha1 al $fecha2<br>$nombandera[nombre]";

	foreach ($resultado as $key => $row) {

		$sql = "SELECT SUM(presupuesto) as suma from presupuesto where partida=$row[partida]"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

		if( !isset( $json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'enet' => 0,
			  'febt' => 0,
			  'mart' => 0,
			  'abrt' => 0,
			  'mayt' => 0,
			  'junt' => 0,
			  'jult' => 0,
			  'agot' => 0,
			  'sept' => 0,
			  'octt' => 0,
			  'novt' => 0,
			  'dict' => 0,
			  'presupuestot'=> 0,
              'ejercidot' => 0,
              'disponiblet'=> 0,
			);
		endif;


			if( !isset($json["informe"]['partida'][$row["partida"]]) ): 
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

		}

    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end();  
}



public function actionIngext($anio,$id) {
	   		 $this->layout=false;  
    		//$arr=array('Fechas'=>array( $fecha1,$fecha2),'Vegetables'=>array('beans','carrot'));  
    			
	$resultado = Banderas::model()->findAll((array(
   'condition'=>"ingext=1",
 //   'condition'=>"fecha_ingreso BETWEEN '$fecha1' AND '$fecha2'",
    'order'=>'nombre'
	)));

	/*$sql = "SELECT nombre  from banderas where id=1"; 
$nombandera = Yii::app()->db->createCommand($sql)->queryRow();
*/
	//$titulo = "Informe de Ingresos Extraordinarios del $fecha1 al $fecha2<br>";

	foreach ($resultado as $key => $row) {

		if( !isset( $json['informe'] ) ): 
			$json['informe'] = array(
			  'cuenta' => array(),
			  'SaldoInicialTotal' => 0,
			  'ingenet' => 0,
			  'gastoenet' => 0,
			  'ingfebt' => 0,
			  'gastofebt' => 0,
			  'ingmart' => 0,
			  'gastomart' => 0,
			  'ingabrt' => 0,
			  'gastoabrt' => 0,
			  'ingmayt' => 0,
			  'gastomayt' => 0,
			  'ingjunt' => 0,
			  'gastojunt' => 0,
			  'ingjult' => 0,
			  'gastojult' => 0,
			  'ingagot' => 0,
			  'gastoagot' => 0,
			  'ingsept' => 0,
			  'gastosept' => 0,
			  'ingoctt' => 0,
			  'gastooctt' => 0,
			  'ingnovt' => 0,
			  'gastonovt' => 0,
			  'ingresotot'=> 0,
			  'ingdict' => 0,
			  'gastodict' => 0,
              'gastotot' => 0,
              'disponiblet'=> 0,
			);
		endif;

		//Calculo del saldo inicial
		$sql = "SELECT SUM(saldo_inicial) as suma from ing_ext where id_ejercicio=$id and id_bandera=$row[id]"; 
		$saldo = Yii::app()->db->createCommand($sql)->queryRow();

		//Calculo de depositos enero
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-01-01' AND '$anio-01-31'"; 
		$deposito = Yii::app()->db->createCommand($sql)->queryRow();

		if($deposito['deposito']==""){
			$deposito=0;
		}else{
			$deposito=$deposito['deposito'];
		}

		//Calculo de GASTOS enero
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-01-01' AND '$anio-01-31'"; 
		$gastos = Yii::app()->db->createCommand($sql)->queryRow();

		if($gastos['gastos']==""){
			$gastos=0;
		}else{
			
			$gastos=$gastos['gastos'];
		}



		
		//Calculo de depositos febrero
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-02-01' AND '$anio-02-28'"; 

		//echo $sql;
		//die();
		$depositofeb = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositofeb['deposito']==""){
			$depositofeb=0;
		}else{
			$depositofeb=$depositofeb['deposito'];
		}

		//Calculo de GASTOS febrero
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-02-01' AND '$anio-02-28'"; 
		$gastosfeb = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosfeb['gastos']==""){
			$gastosfeb=0;
		}else{
			$gastosfeb=$gastosfeb['gastos'];
		}


       	//Calculo de depositos marzo
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-03-01' AND '$anio-03-31'"; 

		//echo $sql;
		//die();
		$depositomar = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositomar['deposito']==""){
			$depositomar=0;
		}else{
			$depositomar=$depositomar['deposito'];
		}

	   //Calculo de GASTOS marzo
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-03-01' AND '$anio-03-31'"; 
		$gastosmar = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosmar['gastos']==""){
			$gastosmar=0;
		}else{
			$gastosmar=$gastosmar['gastos'];
		}

		 	//Calculo de depositos abril
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-04-01' AND '$anio-04-30'"; 

		//echo $sql;
		//die();
		$depositoabr = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositoabr['deposito']==""){
			$depositoabr=0;
		}else{
			$depositoabr=$depositoabr['deposito'];
		}

	   //Calculo de GASTOS abril
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-04-01' AND '$anio-04-30'"; 
		$gastosabr = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosabr['gastos']==""){
			$gastosabr=0;
		}else{
			$gastosabr=$gastosabr['gastos'];
		}


			 	//Calculo de depositos Mayo
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-05-01' AND '$anio-05-31'"; 

		//echo $sql;
		//die();
		$depositomay = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositomay['deposito']==""){
			$depositomay=0;
		}else{
			$depositomay=$depositomay['deposito'];
		}

	   //Calculo de GASTOS abril
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-05-01' AND '$anio-05-31'"; 
		$gastosmay = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosmay['gastos']==""){
			$gastosmay=0;
		}else{
			$gastosmay=$gastosmay['gastos'];
		}


			 	//Calculo de depositos JUn
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-06-01' AND '$anio-06-30'"; 

		//echo $sql;
		//die();
		$depositojun = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositojun['deposito']==""){
			$depositojun=0;
		}else{
			$depositojun=$depositojun['deposito'];
		}

	   //Calculo de GASTOS Jun
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-06-01' AND '$anio-06-30'"; 
		$gastosjun = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosjun['gastos']==""){
			$gastosjun=0;
		}else{
			$gastosjun=$gastosjun['gastos'];
		}

			 	//Calculo de depositos Jul
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-07-01' AND '$anio-07-31'"; 

		//echo $sql;
		//die();
		$depositojul = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositojul['deposito']==""){
			$depositojul=0;
		}else{
			$depositojul=$depositojul['deposito'];
		}

	   //Calculo de GASTOS Jul
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-07-01' AND '$anio-07-31'"; 
		$gastosjul = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosjul['gastos']==""){
			$gastosjul=0;
		}else{
			$gastosjul=$gastosjul['gastos'];
		}


			 	//Calculo de depositos Ago
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-08-01' AND '$anio-08-31'"; 

		//echo $sql;
		//die();
		$depositoago = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositoago['deposito']==""){
			$depositoago=0;
		}else{
			$depositoago=$depositoago['deposito'];
		}

	   //Calculo de GASTOS Ago
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-08-01' AND '$anio-08-31'"; 
		$gastosago = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosago['gastos']==""){
			$gastosago=0;
		}else{
			$gastosago=$gastosago['gastos'];
		}

			 	//Calculo de depositos Sep
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-09-01' AND '$anio-09-30'"; 

		//echo $sql;
		//die();
		$depositosep = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositosep['deposito']==""){
			$depositosep=0;
		}else{
			$depositosep=$depositosep['deposito'];
		}

	   //Calculo de GASTOS Sep
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-09-01' AND '$anio-09-30'"; 
		$gastossep = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastossep['gastos']==""){
			$gastossep=0;
		}else{
			$gastossep=$gastossep['gastos'];
		}

		 	//Calculo de depositos OCt
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-10-01' AND '$anio-10-31'"; 

		//echo $sql;
		//die();
		$depositooct = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositooct['deposito']==""){
			$depositooct=0;
		}else{
			$depositooct=$depositooct['deposito'];
		}

	   //Calculo de GASTOS OCt
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-10-01' AND '$anio-10-31'"; 
		$gastosoct = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosoct['gastos']==""){
			$gastosoct=0;
		}else{
			$gastosoct=$gastosoct['gastos'];
		}

		 	//Calculo de depositos nov
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-11-01' AND '$anio-11-30'"; 

		//echo $sql;
		//die();
		$depositonov = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositonov['deposito']==""){
			$depositonov=0;
		}else{
			$depositonov=$depositonov['deposito'];
		}

	   //Calculo de GASTOS nov
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-11-01' AND '$anio-11-30'"; 
		$gastosnov = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosnov['gastos']==""){
			$gastosnov=0;
		}else{
			$gastosnov=$gastosnov['gastos'];
		}

		//Calculo de depositos dic
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-12-01' AND '$anio-12-31'"; 

		//echo $sql;
		//die();
		$depositodic = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositodic['deposito']==""){
			$depositodic=0;
		}else{
			$depositodic=$depositodic['deposito'];
		}

	   //Calculo de GASTOS dic
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '$anio-12-01' AND '$anio-12-31'"; 
		$gastosdic = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosdic['gastos']==""){
			$gastosdic=0;
		}else{
			$gastosdic=$gastosdic['gastos'];
		}













        $depositosmeses = $saldo['suma'] + $deposito + $depositofeb + $depositomar + $depositoabr + $depositomay + $depositojun + $depositojul + $depositoago + $depositosep + $depositooct + $depositonov + $depositodic;
        $gastosmeses = $gastos + $gastosfeb + $gastosmar + $gastosabr + $gastosmay + $gastosjun + $gastosjul + $gastosago + $gastossep + $gastosoct + $gastosnov + $gastosdic;
        $disponible = $depositosmeses - $gastosmeses;

		if( !isset($json["informe"]['cuenta'][$row["nombre"]]) ): 
			$json["informe"]['cuenta'][$row["nombre"]] = array(
			  'SaldoInicial' => $saldo['suma'],
			  'depositoEne' => $deposito,
			  'enegas' => $gastos,
			  'depositoFeb' => $depositofeb,
			  'febgas' => $gastosfeb,
			  'depositoMar' => $depositomar,
			  'margas' => $gastosmar,
			  'depositoAbr' => $depositoabr,
			  'abrgas' => $gastosabr,
			  'depositoMay' => $depositomay,
			  'maygas' => $gastosmay,
			  'depositoJun' => $depositojun,
			  'jungas' => $gastosjun,
			  'depositoJul' => $depositojul,
			  'julgas' => $gastosjul,
			  'depositoAgo' => $depositoago,
			  'agogas' => $gastosago,
			  'depositoSep' => $depositosep,
			  'sepgas' => $gastossep,
			  'depositoOct' => $depositooct,
			  'octgas' => $gastosoct,
			  'depositoNov' => $depositonov,
			  'novgas' => $gastosnov,
			   'depositoDic' => $depositodic,
			  'dicgas' => $gastosdic,
			  'depositosmes' => $depositosmeses,
			  'gastossmes' => $gastosmeses,
			  'disponible' => $disponible,
			  );
		endif;













		//SUMA DEL SALDO INICIAL
		$json["informe"]['SaldoInicialTotal'] = $json["informe"]['SaldoInicialTotal'] + $json["informe"]['cuenta'][$row["nombre"]]['SaldoInicial'];
	   //SUMA DE DEPOSITOS ENERO
		$json["informe"]['ingenet'] = $json["informe"]['ingenet'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoEne'];
	   //SUMA DE DEPOSITOS ENERO
		$json["informe"]['gastoenet'] = $json["informe"]['gastoenet'] + $json["informe"]['cuenta'][$row["nombre"]]['enegas'];
	    //SUMA DE DEPOSITOS FEBRERO
		$json["informe"]['ingfebt'] = $json["informe"]['ingfebt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoFeb'];
	   //SUMA DE DEPOSITOS FEBRERO
		$json["informe"]['gastofebt'] = $json["informe"]['gastofebt'] + $json["informe"]['cuenta'][$row["nombre"]]['febgas'];
	     //SUMA DE DEPOSITOS MARZO
		$json["informe"]['ingmart'] = $json["informe"]['ingmart'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoMar'];
	   //SUMA DE DEPOSITOS MARZO
		$json["informe"]['gastomart'] = $json["informe"]['gastomart'] + $json["informe"]['cuenta'][$row["nombre"]]['margas'];
	       //SUMA DE DEPOSITOS ABRIL
		$json["informe"]['ingabrt'] = $json["informe"]['ingabrt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoAbr'];
	   //SUMA DE DEPOSITOS ABRIL
		$json["informe"]['gastoabrt'] = $json["informe"]['gastoabrt'] + $json["informe"]['cuenta'][$row["nombre"]]['abrgas'];
	      //SUMA DE DEPOSITOS MAYO
		$json["informe"]['ingmayt'] = $json["informe"]['ingmayt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoMay'];
	   //SUMA DE DEPOSITOS MAYO
		$json["informe"]['gastomayt'] = $json["informe"]['gastomayt'] + $json["informe"]['cuenta'][$row["nombre"]]['maygas'];
	      //SUMA DE DEPOSITOS JUNIO
		$json["informe"]['ingjunt'] = $json["informe"]['ingjunt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoJun'];
	   //SUMA DE DEPOSITOS JUNIO
		$json["informe"]['gastojunt'] = $json["informe"]['gastojunt'] + $json["informe"]['cuenta'][$row["nombre"]]['jungas'];
	  //SUMA DE DEPOSITOS JUL
		$json["informe"]['ingjult'] = $json["informe"]['ingjult'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoJul'];
	   //SUMA DE DEPOSITOS JUL
		$json["informe"]['gastojult'] = $json["informe"]['gastojult'] + $json["informe"]['cuenta'][$row["nombre"]]['julgas'];
	   //SUMA DE DEPOSITOS AGO
		$json["informe"]['ingagot'] = $json["informe"]['ingagot'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoAgo'];
	   //SUMA DE DEPOSITOS AGO
		$json["informe"]['gastoagot'] = $json["informe"]['gastoagot'] + $json["informe"]['cuenta'][$row["nombre"]]['agogas'];
	   //SUMA DE DEPOSITOS SEP
		$json["informe"]['ingsept'] = $json["informe"]['ingsept'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoSep'];
	   //SUMA DE DEPOSITOS SEP
		$json["informe"]['gastosept'] = $json["informe"]['gastosept'] + $json["informe"]['cuenta'][$row["nombre"]]['sepgas'];
	   //SUMA DE DEPOSITOS oct
		$json["informe"]['ingoctt'] = $json["informe"]['ingoctt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoOct'];
	   //SUMA DE DEPOSITOS oct
		$json["informe"]['gastooctt'] = $json["informe"]['gastooctt'] + $json["informe"]['cuenta'][$row["nombre"]]['octgas'];
	   //SUMA DE DEPOSITOS NOV
		$json["informe"]['ingnovt'] = $json["informe"]['ingnovt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoNov'];
	   //SUMA DE DEPOSITOS NOV
		$json["informe"]['gastonovt'] = $json["informe"]['gastonovt'] + $json["informe"]['cuenta'][$row["nombre"]]['novgas'];
	   //SUMA DE DEPOSITOS DIC
		$json["informe"]['ingdict'] = $json["informe"]['ingdict'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoDic'];
	   //SUMA DE DEPOSITOS DIC
		$json["informe"]['gastodict'] = $json["informe"]['gastodict'] + $json["informe"]['cuenta'][$row["nombre"]]['dicgas'];
	  
       

        $json["informe"]['ingresotot'] = $json["informe"]['SaldoInicialTotal'] + $json["informe"]['ingenet'] + $json["informe"]['ingfebt'] + $json["informe"]['ingmart'] + $json["informe"]['ingabrt'] + $json["informe"]['ingmayt'] + $json["informe"]['ingjunt'] + $json["informe"]['ingjult'] + $json["informe"]['ingagot'] + $json["informe"]['ingsept'] + $json["informe"]['ingoctt'] + $json["informe"]['ingnovt'] + $json["informe"]['ingdict'];
        $json["informe"]['gastotot'] = $json["informe"]['gastoenet'] + $json["informe"]['gastofebt'] + $json["informe"]['gastomart'] + $json["informe"]['gastoabrt'] + $json["informe"]['gastomayt'] + $json["informe"]['gastojunt'] + $json["informe"]['gastojult'] + $json["informe"]['gastoagot'] + $json["informe"]['gastosept'] + $json["informe"]['gastooctt'] + $json["informe"]['gastonovt'] + $json["informe"]['gastodict'];
        $json["informe"]['disponiblet'] = $json["informe"]['ingresotot'] - $json["informe"]['gastotot'] ;


	}
	
    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end();  
 }

public function actionIngext2() {
	   		 $this->layout=false;  
    		//$arr=array('Fechas'=>array( $fecha1,$fecha2),'Vegetables'=>array('beans','carrot'));  
    			
	$resultado = Banderas::model()->findAll((array(
   'condition'=>"ingext=1",
 //   'condition'=>"fecha_ingreso BETWEEN '$fecha1' AND '$fecha2'",
    'order'=>'nombre'
	)));

	/*$sql = "SELECT nombre  from banderas where id=1"; 
$nombandera = Yii::app()->db->createCommand($sql)->queryRow();
*/
	//$titulo = "Informe de Ingresos Extraordinarios del $fecha1 al $fecha2<br>";

	foreach ($resultado as $key => $row) {

		if( !isset( $json['informe'] ) ): 
			$json['informe'] = array(
			  'cuenta' => array(),
			  'SaldoInicialTotal' => 0,
			  'ingenet' => 0,
			  'gastoenet' => 0,
			  'ingfebt' => 0,
			  'gastofebt' => 0,
			  'ingmart' => 0,
			  'gastomart' => 0,
			  'ingabrt' => 0,
			  'gastoabrt' => 0,
			  'ingmayt' => 0,
			  'gastomayt' => 0,
			  'ingjunt' => 0,
			  'gastojunt' => 0,
			  'ingjult' => 0,
			  'gastojult' => 0,
			  'ingagot' => 0,
			  'gastoagot' => 0,
			  'ingsept' => 0,
			  'gastosept' => 0,
			  'ingoctt' => 0,
			  'gastooctt' => 0,
			  'ingnovt' => 0,
			  'gastonovt' => 0,
			  'ingresotot'=> 0,
			  'ingdict' => 0,
			  'gastodict' => 0,
              'gastotot' => 0,
              'disponiblet'=> 0,
			);
		endif;

		//Calculo del saldo inicial
		$sql = "SELECT SUM(saldo_inicial) as suma from ing_ext where id_bandera=$row[id]"; 
		$saldo = Yii::app()->db->createCommand($sql)->queryRow();

		//Calculo de depositos enero
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-01-01' AND '2015-01-31'"; 
		$deposito = Yii::app()->db->createCommand($sql)->queryRow();

		if($deposito['deposito']==""){
			$deposito=0;
		}else{
			$deposito=$deposito['deposito'];
		}

		//Calculo de GASTOS enero
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-01-01' AND '2015-01-31'"; 
		$gastos = Yii::app()->db->createCommand($sql)->queryRow();

		if($gastos['gastos']==""){
			$gastos=0;
		}else{
			
			$gastos=$gastos['gastos'];
		}



		
		//Calculo de depositos febrero
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-02-01' AND '2015-02-28'"; 

		//echo $sql;
		//die();
		$depositofeb = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositofeb['deposito']==""){
			$depositofeb=0;
		}else{
			$depositofeb=$depositofeb['deposito'];
		}

		//Calculo de GASTOS febrero
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-02-01' AND '2015-02-28'"; 
		$gastosfeb = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosfeb['gastos']==""){
			$gastosfeb=0;
		}else{
			$gastosfeb=$gastosfeb['gastos'];
		}


       	//Calculo de depositos marzo
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-03-01' AND '2015-03-31'"; 

		//echo $sql;
		//die();
		$depositomar = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositomar['deposito']==""){
			$depositomar=0;
		}else{
			$depositomar=$depositomar['deposito'];
		}

	   //Calculo de GASTOS marzo
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-03-01' AND '2015-03-31'"; 
		$gastosmar = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosmar['gastos']==""){
			$gastosmar=0;
		}else{
			$gastosmar=$gastosmar['gastos'];
		}

		 	//Calculo de depositos abril
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-04-01' AND '2015-04-30'"; 

		//echo $sql;
		//die();
		$depositoabr = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositoabr['deposito']==""){
			$depositoabr=0;
		}else{
			$depositoabr=$depositoabr['deposito'];
		}

	   //Calculo de GASTOS abril
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-04-01' AND '2015-04-30'"; 
		$gastosabr = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosabr['gastos']==""){
			$gastosabr=0;
		}else{
			$gastosabr=$gastosabr['gastos'];
		}


			 	//Calculo de depositos Mayo
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-05-01' AND '2015-05-31'"; 

		//echo $sql;
		//die();
		$depositomay = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositomay['deposito']==""){
			$depositomay=0;
		}else{
			$depositomay=$depositomay['deposito'];
		}

	   //Calculo de GASTOS abril
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-05-01' AND '2015-05-31'"; 
		$gastosmay = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosmay['gastos']==""){
			$gastosmay=0;
		}else{
			$gastosmay=$gastosmay['gastos'];
		}


			 	//Calculo de depositos JUn
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-06-01' AND '2015-06-30'"; 

		//echo $sql;
		//die();
		$depositojun = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositojun['deposito']==""){
			$depositojun=0;
		}else{
			$depositojun=$depositojun['deposito'];
		}

	   //Calculo de GASTOS Jun
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-06-01' AND '2015-06-30'"; 
		$gastosjun = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosjun['gastos']==""){
			$gastosjun=0;
		}else{
			$gastosjun=$gastosjun['gastos'];
		}

			 	//Calculo de depositos Jul
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-07-01' AND '2015-07-31'"; 

		//echo $sql;
		//die();
		$depositojul = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositojul['deposito']==""){
			$depositojul=0;
		}else{
			$depositojul=$depositojul['deposito'];
		}

	   //Calculo de GASTOS Jul
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-07-01' AND '2015-07-31'"; 
		$gastosjul = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosjul['gastos']==""){
			$gastosjul=0;
		}else{
			$gastosjul=$gastosjul['gastos'];
		}


			 	//Calculo de depositos Ago
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-08-01' AND '2015-08-31'"; 

		//echo $sql;
		//die();
		$depositoago = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositoago['deposito']==""){
			$depositoago=0;
		}else{
			$depositoago=$depositoago['deposito'];
		}

	   //Calculo de GASTOS Ago
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-08-01' AND '2015-08-31'"; 
		$gastosago = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosago['gastos']==""){
			$gastosago=0;
		}else{
			$gastosago=$gastosago['gastos'];
		}

			 	//Calculo de depositos Sep
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-09-01' AND '2015-09-30'"; 

		//echo $sql;
		//die();
		$depositosep = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositosep['deposito']==""){
			$depositosep=0;
		}else{
			$depositosep=$depositosep['deposito'];
		}

	   //Calculo de GASTOS Sep
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-09-01' AND '2015-09-30'"; 
		$gastossep = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastossep['gastos']==""){
			$gastossep=0;
		}else{
			$gastossep=$gastossep['gastos'];
		}

		 	//Calculo de depositos OCt
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-10-01' AND '2015-10-31'"; 

		//echo $sql;
		//die();
		$depositooct = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositooct['deposito']==""){
			$depositooct=0;
		}else{
			$depositooct=$depositooct['deposito'];
		}

	   //Calculo de GASTOS OCt
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-10-01' AND '2015-10-31'"; 
		$gastosoct = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosoct['gastos']==""){
			$gastosoct=0;
		}else{
			$gastosoct=$gastosoct['gastos'];
		}

		 	//Calculo de depositos nov
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-11-01' AND '2015-11-30'"; 

		//echo $sql;
		//die();
		$depositonov = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositonov['deposito']==""){
			$depositonov=0;
		}else{
			$depositonov=$depositonov['deposito'];
		}

	   //Calculo de GASTOS nov
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-11-01' AND '2015-11-30'"; 
		$gastosnov = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosnov['gastos']==""){
			$gastosnov=0;
		}else{
			$gastosnov=$gastosnov['gastos'];
		}

		//Calculo de depositos dic
		$sql = "SELECT SUM(importe) as deposito from base_ing where bandera=$row[id] and fecha_ingreso BETWEEN '2015-12-01' AND '2015-12-31'"; 

		//echo $sql;
		//die();
		$depositodic = Yii::app()->db->createCommand($sql)->queryRow();

		if($depositodic['deposito']==""){
			$depositodic=0;
		}else{
			$depositodic=$depositodic['deposito'];
		}

	   //Calculo de GASTOS dic
		$sql = "SELECT SUM(importe) as gastos from base_cap where bandera=$row[id] and fecha_ingreso BETWEEN '2015-12-01' AND '2015-12-31'"; 
		$gastosdic = Yii::app()->db->createCommand($sql)->queryRow();

		//echo $sql;
		//die();
		if($gastosdic['gastos']==""){
			$gastosdic=0;
		}else{
			$gastosdic=$gastosdic['gastos'];
		}













        $depositosmeses = $saldo['suma'] + $deposito + $depositofeb + $depositomar + $depositoabr + $depositomay + $depositojun + $depositojul + $depositoago + $depositosep + $depositooct + $depositonov + $depositodic;
        $gastosmeses = $gastos + $gastosfeb + $gastosmar + $gastosabr + $gastosmay + $gastosjun + $gastosjul + $gastosago + $gastossep + $gastosoct + $gastosnov + $gastosdic;
        $disponible = $depositosmeses - $gastosmeses;

		if( !isset($json["informe"]['cuenta'][$row["nombre"]]) ): 
			$json["informe"]['cuenta'][$row["nombre"]] = array(
			  'SaldoInicial' => $saldo['suma'],
			  'depositoEne' => $deposito,
			  'enegas' => $gastos,
			  'depositoFeb' => $depositofeb,
			  'febgas' => $gastosfeb,
			  'depositoMar' => $depositomar,
			  'margas' => $gastosmar,
			  'depositoAbr' => $depositoabr,
			  'abrgas' => $gastosabr,
			  'depositoMay' => $depositomay,
			  'maygas' => $gastosmay,
			  'depositoJun' => $depositojun,
			  'jungas' => $gastosjun,
			  'depositoJul' => $depositojul,
			  'julgas' => $gastosjul,
			  'depositoAgo' => $depositoago,
			  'agogas' => $gastosago,
			  'depositoSep' => $depositosep,
			  'sepgas' => $gastossep,
			  'depositoOct' => $depositooct,
			  'octgas' => $gastosoct,
			  'depositoNov' => $depositonov,
			  'novgas' => $gastosnov,
			   'depositoDic' => $depositodic,
			  'dicgas' => $gastosdic,
			  'depositosmes' => $depositosmeses,
			  'gastossmes' => $gastosmeses,
			  'disponible' => $disponible,
			  );
		endif;













		//SUMA DEL SALDO INICIAL
		$json["informe"]['SaldoInicialTotal'] = $json["informe"]['SaldoInicialTotal'] + $json["informe"]['cuenta'][$row["nombre"]]['SaldoInicial'];
	   //SUMA DE DEPOSITOS ENERO
		$json["informe"]['ingenet'] = $json["informe"]['ingenet'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoEne'];
	   //SUMA DE DEPOSITOS ENERO
		$json["informe"]['gastoenet'] = $json["informe"]['gastoenet'] + $json["informe"]['cuenta'][$row["nombre"]]['enegas'];
	    //SUMA DE DEPOSITOS FEBRERO
		$json["informe"]['ingfebt'] = $json["informe"]['ingfebt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoFeb'];
	   //SUMA DE DEPOSITOS FEBRERO
		$json["informe"]['gastofebt'] = $json["informe"]['gastofebt'] + $json["informe"]['cuenta'][$row["nombre"]]['febgas'];
	     //SUMA DE DEPOSITOS MARZO
		$json["informe"]['ingmart'] = $json["informe"]['ingmart'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoMar'];
	   //SUMA DE DEPOSITOS MARZO
		$json["informe"]['gastomart'] = $json["informe"]['gastomart'] + $json["informe"]['cuenta'][$row["nombre"]]['margas'];
	       //SUMA DE DEPOSITOS ABRIL
		$json["informe"]['ingabrt'] = $json["informe"]['ingabrt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoAbr'];
	   //SUMA DE DEPOSITOS ABRIL
		$json["informe"]['gastoabrt'] = $json["informe"]['gastoabrt'] + $json["informe"]['cuenta'][$row["nombre"]]['abrgas'];
	      //SUMA DE DEPOSITOS MAYO
		$json["informe"]['ingmayt'] = $json["informe"]['ingmayt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoMay'];
	   //SUMA DE DEPOSITOS MAYO
		$json["informe"]['gastomayt'] = $json["informe"]['gastomayt'] + $json["informe"]['cuenta'][$row["nombre"]]['maygas'];
	      //SUMA DE DEPOSITOS JUNIO
		$json["informe"]['ingjunt'] = $json["informe"]['ingjunt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoJun'];
	   //SUMA DE DEPOSITOS JUNIO
		$json["informe"]['gastojunt'] = $json["informe"]['gastojunt'] + $json["informe"]['cuenta'][$row["nombre"]]['jungas'];
	  //SUMA DE DEPOSITOS JUL
		$json["informe"]['ingjult'] = $json["informe"]['ingjult'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoJul'];
	   //SUMA DE DEPOSITOS JUL
		$json["informe"]['gastojult'] = $json["informe"]['gastojult'] + $json["informe"]['cuenta'][$row["nombre"]]['julgas'];
	   //SUMA DE DEPOSITOS AGO
		$json["informe"]['ingagot'] = $json["informe"]['ingagot'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoAgo'];
	   //SUMA DE DEPOSITOS AGO
		$json["informe"]['gastoagot'] = $json["informe"]['gastoagot'] + $json["informe"]['cuenta'][$row["nombre"]]['agogas'];
	   //SUMA DE DEPOSITOS SEP
		$json["informe"]['ingsept'] = $json["informe"]['ingsept'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoSep'];
	   //SUMA DE DEPOSITOS SEP
		$json["informe"]['gastosept'] = $json["informe"]['gastosept'] + $json["informe"]['cuenta'][$row["nombre"]]['sepgas'];
	   //SUMA DE DEPOSITOS oct
		$json["informe"]['ingoctt'] = $json["informe"]['ingoctt'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoOct'];
	   //SUMA DE DEPOSITOS oct
		$json["informe"]['gastooctt'] = $json["informe"]['gastooctt'] + $json["informe"]['cuenta'][$row["nombre"]]['octgas'];
	   //SUMA DE DEPOSITOS NOV
		$json["informe"]['ingagot'] = $json["informe"]['ingagot'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoNov'];
	   //SUMA DE DEPOSITOS NOV
		$json["informe"]['gastoagot'] = $json["informe"]['gastoagot'] + $json["informe"]['cuenta'][$row["nombre"]]['novgas'];
	   //SUMA DE DEPOSITOS DIC
		$json["informe"]['ingdict'] = $json["informe"]['ingdict'] + $json["informe"]['cuenta'][$row["nombre"]]['depositoDic'];
	   //SUMA DE DEPOSITOS DIC
		$json["informe"]['gastodict'] = $json["informe"]['gastodict'] + $json["informe"]['cuenta'][$row["nombre"]]['dicgas'];
	  
       

        $json["informe"]['ingresotot'] = $json["informe"]['SaldoInicialTotal'] + $json["informe"]['ingenet'] + $json["informe"]['ingfebt'] + $json["informe"]['ingmart'] + $json["informe"]['ingabrt'] + $json["informe"]['ingmayt'] + $json["informe"]['ingjunt'] + $json["informe"]['ingjult'] + $json["informe"]['ingagot'] + $json["informe"]['ingsept'] + $json["informe"]['ingoctt'] + $json["informe"]['ingnovt'] + $json["informe"]['ingdict'];
        $json["informe"]['gastotot'] = $json["informe"]['gastoenet'] + $json["informe"]['gastofebt'] + $json["informe"]['gastomart'] + $json["informe"]['gastoabrt'] + $json["informe"]['gastomayt'] + $json["informe"]['gastojunt'] + $json["informe"]['gastojult'] + $json["informe"]['gastoagot'] + $json["informe"]['gastosept'] + $json["informe"]['gastooctt'] + $json["informe"]['gastonovt'] + $json["informe"]['gastodict'];
        $json["informe"]['disponiblet'] = $json["informe"]['ingresotot'] - $json["informe"]['gastotot'] ;


	}
	
    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end();  
 }

public function actionAll($fecha1,$fecha2) {
	$this->layout=false;


//$arreglo = Yii::app()->getSession()->get('post');


/*$fecha1='2015-01-01';
$fecha2='2014-01-30';*/

$sql = "SELECT  * from criterios where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();
//echo $criterios->getText();


$id_partida = $criterios['partida'];
$id_subprog = $criterios['subprog'];
$id_area = $criterios['area'];
$id_bandera = $criterios['bandera'];
$proveedor = $criterios['proveedor'];
$observa = $criterios['observa'];
$importe = $criterios['importe'];

//$fecha1 = $criterios['fecha1'];
//$fecha2 = $criterios['fecha2'];
/*$id_partida = $citerios['partida'];
$id_area = $citerios['area'];
$id_subprog = $citerios['subprog'];
$id_bandera = $citerios['bandera'];
$proveedor = $citerios['proveedor'];
$observa = $citerios['observa'];*/

//$json = array();



//echo $fecha1;
//$filtro ="id_periodo = 2 AND ";
$filtro ="";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";

if($fecha1 !="" && $fecha2 != ""){
	  //echo "entro al if";
		$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";
	}
if($id_partida !=""){
	$filtro .="partida =$id_partida AND ";
}

if($id_subprog !=""){
	$filtro .="subprog = $id_subprog AND ";
}

if($id_area !=""){
	$filtro .="area =$id_area AND ";
}




if($proveedor !=""){
	$filtro .="proveedor ='$proveedor' AND ";
}

if($importe !=0){
	$filtro .="importe >= '$importe' AND ";
}

if($observa !=""){
//$observa = 'OFUNAM';
$filtro .="detalle like '%$observa%' AND ";
}


if($id_bandera !=""){
	$filtro .="bandera =$id_bandera AND ";
}



if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT id, area, folio, proveedor, concepto, detalle,
  		     fecha_contrarecibo, no_contrarecibo, subprog, bandera, partida, fecha_ingreso, importe, factura 
  		     FROM 
  		     base_cap ".$filtro2."
		     order by partida,fecha_ingreso";



$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

$json = array();
//if (is_array($resultado)){
foreach ($resultado as $row) {

if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			  'sumatotal' => 0,
			 );
		endif;
 
       if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'ids'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;

		if(!isset($json["informe"]['partida'][$row["partida"]]['id'][$row["id"]])): 
			$json["informe"]['partida'][$row["partida"]]['id'][$row["id"]] = array(
			  'fecha_ingreso'=> $row["fecha_ingreso"],
			  'folio'=> $row["folio"],
			  'area'=> $row["area"],
			  'subprog'=> $row["subprog"],
			  'bandera'=> $row["bandera"],
			  'factura'=> $row["factura"],
			  'proveedor'=> str_replace('"','',$row["proveedor"]),
			  'importe'=> $row["importe"],
			  'concepto'=> $row["concepto"],
			  'detalle'=> str_replace('"','',$row["detalle"]),
			  'fecha_contrarecibo'=> $row["fecha_contrarecibo"],
			  'no_contrarecibo'=> $row["no_contrarecibo"],
	
				);
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];
		endif;

		$json["informe"]['sumatotal'] = $json["informe"]['sumatotal'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];


		
	}
/*}else {

	$json = array();
}*/
	

    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

}

public function actionAll2($arreglo) {

header('Content-type: application/json');  
echo json_encode($arreglo);  
Yii::app()->end();


}


public function actionPto($fecha1,$fecha2,$id_periodo,$id_trim) 
{
    



$lista=array(
				"154",
				"181",
				"183",
				"196",
				"197",
				"211",
				"212",
				"214",
				"216",
				"218",
				"221",
				"223",
				"231",
				"232",
				"233",
				"234",
				"235",
				"243",
				"244",
				"252",
				"253",
				"347",
				"411",
				"413",
				"414",
				"514",
				"721",
				"731"
			 );
/*foreach ($semana as $dia) {
        echo "$dia ,";
        }*/
  
		foreach($lista as $row){

$q = "select * from base_cap where partida=$row and id_periodo=$id_periodo  and bandera=1 and  (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2') order by partida"; 

$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();
$resultado = $cmd->query();
$ene =0;
$feb =0;
$mar =0;
$abr =0;
$may =0;
$jun =0;
$jul =0;
$ago =0;
$sep =0;
$oct =0;
$nov =0;
$dic =0;
foreach ($resultado as $base) {

$fecha =$base["fecha_ingreso"]; 
$date = strtotime("$fecha");	


 if(date("m",$date) =='1'){
$ene = $ene + $base['importe'];
 }

  if(date("m",$date) =='2'){
$feb = $feb + $base['importe'];
 }

  if(date("m",$date) =='3'){
$mar = $mar + $base['importe'];
 }
   if(date("m",$date) =='4'){
$abr = $abr + $base['importe'];
 }

  if(date("m",$date) =='5'){
$may = $may + $base['importe'];
 }

  if(date("m",$date) =='6'){
$jun = $jun + $base['importe'];
 }

 if(date("m",$date) =='7'){
$jul = $jul + $base['importe'];
 }

 if(date("m",$date) =='8'){
$ago = $ago + $base['importe'];
 }

 if(date("m",$date) =='9'){
$sep = $sep + $base['importe'];
 }

 if(date("m",$date) =='10'){
$oct = $oct + $base['importe'];
 }

 if(date("m",$date) =='11'){
$nov = $nov + $base['importe'];
 }

 if(date("m",$date) =='12'){
$dic = $dic + $base['importe'];
 }

 }


 
		if( !isset( $json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'ene' => array(),
			  'enet' => 0,
			  'febt' => 0,
			  'mart' => 0,
			  'abrt' => 0,
			  'mayt' => 0,
			  'junt' => 0,
			  'jult' => 0,
			  'agot' => 0,
			  'sept' => 0,
			  'octt' => 0,
			  'novt' => 0,
			  'dict' => 0,
			  'presupuestot'=> 0,
              'ejercidot' => 0,
              'disponiblet'=> 0,
			);


		endif;


		if( !isset($json["informe"]['partida'][$row]) ):
		$sql = "SELECT SUM(presupuesto) as suma from presupuesto where partida=$row and id_trimestre=$id_trim"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

	

 
			$json["informe"]['partida'][$row] = array(
			  'ene' => $ene,
			  'feb' => $feb,
			  'mar' => $mar,
			  'abr' => $abr,
			  'may' => $may,
			  'jun' => $jun,
			  'jul' => $jul,
			  'ago' => $ago,
			  'sep' => $sep,
			  'oct' => $oct,
			  'nov' => $nov,
			  'dic' => $dic,
			//  'totalenero' => 0,
              'totalejercido' => $ene + $feb + $mar + $abr + $may + $jun + $jul + $ago + $sep + $oct + $nov + $dic,
              'presupuesto'=> $presupuesto['suma'],
             // 'totalejercido' => 0,
              'disponible'=> 0,
				);

		$json["informe"]['partida'][$row]['disponible'] = $json["informe"]['partida'][$row]['presupuesto'] - $json["informe"]['partida'][$row]['totalejercido'];
		$json["informe"]['enet'] = $json["informe"]['enet'] + $ene;
		$json["informe"]['febt'] = $json["informe"]['febt'] + $feb;
		$json["informe"]['mart'] = $json["informe"]['mart'] + $mar;
		$json["informe"]['abrt'] = $json["informe"]['abrt'] + $abr;
		$json["informe"]['mayt'] = $json["informe"]['mayt'] + $may;
		$json["informe"]['junt'] = $json["informe"]['junt'] + $jun;
		$json["informe"]['jult'] = $json["informe"]['jult'] + $jul;
		$json["informe"]['agot'] = $json["informe"]['agot'] + $ago;
		$json["informe"]['sept'] = $json["informe"]['sept'] + $sep;
		$json["informe"]['octt'] = $json["informe"]['octt'] + $oct;
		$json["informe"]['novt'] = $json["informe"]['novt'] + $nov;
		$json["informe"]['dict'] = $json["informe"]['dict'] + $dic;
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $presupuesto['suma'];
	

	  
		endif; 

		$json["informe"]['ejercidot'] =  $json["informe"]['enet'] +  $json["informe"]['febt'] +  $json["informe"]['mart'] +  $json["informe"]['abrt'] +  $json["informe"]['mayt'] +  $json["informe"]['junt'] +  $json["informe"]['jult'] +  $json["informe"]['agot'] +  $json["informe"]['sept'] +  $json["informe"]['octt'] +  $json["informe"]['novt'] +  $json["informe"]['dict'];
		$json["informe"]['disponiblet'] = $json["informe"]['presupuestot'] - $json["informe"]['ejercidot'];

 		//Enero

 	/*	$sql = "SELECT SUM(importe) as suma from base_cap where partida=$row[partida] and id_periodo=2 and  (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')"; 
		//echo $sql;
		$ene = Yii::app()->db->createCommand($sql)->queryRow();
		
		if($ene['suma']){ 
			$json["informe"]['partida'][$row["partida"]]["ene"] = $ene['suma'];

		}*/

		//$json["informe"]['partida'][$row["partida"]]["totalenero"] = $json["informe"]['partida'][$row["partida"]]["totalenero"] + $json["informe"]['partida'][$row["partida"]]["ene"];
		//$json["informe"]['enet']= $json["informe"]['enet'] + $ene['suma'];
		/*$json["informe"]['febt']= $json["informe"]['febt'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['mart']= $json["informe"]['mart'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['abrt']= $json["informe"]['abrt'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['mayt']= $json["informe"]['mayt'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['junt']= $json["informe"]['junt'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['jult']= $json["informe"]['jult'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['agot']= $json["informe"]['agot'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['sept']= $json["informe"]['sept'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['octt']= $json["informe"]['octt'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['novt']= $json["informe"]['novt'] + $json["informe"]['partida'][$row["partida"]]["ene"];
		$json["informe"]['dict']= $json["informe"]['dict'] + $json["informe"]['partida'][$row["partida"]]["ene"];*/

		}


header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

//}
//}
}




public function actionSubprog($subprog,$id_partida,$id_periodo,$id_trim,$id_area) {
	$this->layout=false;

/*if($subprog==0 && $id_area==0){

	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and area=$area",
    'condition'=>"bandera=1 and id_periodo=$id_periodo and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));

}

if($subprog!=0 && $id_area!=0){

	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and area=$area",
    'condition'=>"bandera=1 and subprog=$subprog and  area=$id_area and id_periodo=$id_periodo and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));

}	

if($subprog==0 && $id_area!=0){

	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and area=$area",
    'condition'=>"bandera=1 and area=$id_area and id_periodo=$id_periodo and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));

}

if($subprog!=0 && $id_area==0){

	$resultado = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and area=$area",
    'condition'=>"bandera=1 and subprog=$subprog and id_periodo=$id_periodo and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'partida,subprog'
	)));

}		*/

//echo $fecha1;
$filtro ="id_periodo = $id_periodo and id_trimestre=$id_trim and area<>12 and partida<>211 and partida<>331 and partida<>612 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($subprog !=0){
	$filtro .="subprog =$subprog AND ";
}

if($id_partida !=0){
	$filtro .="partida =$id_partida AND ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}




$q = "SELECT id, partida, subprog, presupuesto FROM 
  		     presupuesto ".$filtro2."
		     order by partida,subprog";



$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

$resultado = $cmd->query();


$json = array();
foreach ($resultado as $row) {


		$sql = "SELECT SUM(presupuesto) as suma from presupuesto where id_trimestre=$id_trim and partida=$row[partida] and subprog=$row[subprog]"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

		if( !isset( $json['informe'] ) ): 
			$json['informe'] = array(
			  'partida' => array(),
			  'enet' => 0,
			  'febt' => 0,
			  'mart' => 0,
			  'abrt' => 0,
			  'mayt' => 0,
			  'junt' => 0,
			  'jult' => 0,
			  'agot' => 0,
			  'sept' => 0,
			  'octt' => 0,
			  'novt' => 0,
			  'dict' => 0,
			  'presupuestot'=> 0,
              'ejercidot' => 0,
              'disponiblet'=> 0,
			);
		endif;
 
        if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'subprog'=> array(),
	
				);
		endif;

	    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
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


	/*$fecha =$row["fecha_ingreso"]; 
		$date = strtotime("$fecha");

		$anio =date('Y');
		$fechaini = $anio."-01-01";*/

		$sql = "SELECT SUM(importe) as suma from base_cap where partida=$row[partida] and subprog=$row[subprog] and (fecha_ingreso BETWEEN '2016-01-01' and '2016-01-31') "; 
		$gasto_ene = Yii::app()->db->createCommand($sql)->queryRow();

		if($gasto_ene["suma"] > 0){
            $importe_enero=$gasto_ene["suma"];
		}else{
			$importe_enero="";
		}


		$sql = "SELECT SUM(importe) as suma from base_cap where partida=$row[partida] and subprog=$row[subprog] and (fecha_ingreso BETWEEN '2016-02-01' and '2016-02-29') "; 
		$gasto_feb = Yii::app()->db->createCommand($sql)->queryRow();

		if($gasto_feb["suma"] > 0){
            $importe_enero=$gasto_feb["suma"];
		}else{
			$importe_feb="";
		}

		 //Enero
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["id"]])){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"]= array(
				'importe' => $gasto_ene["suma"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"]['importe'];
		$json["informe"]['enet'] = $json["informe"]['enet'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"]['importe'];
		
		}


		 //Febrero
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["id"]])){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"]= array(
				'importe' => $gasto_feb["suma"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"]['importe'];
		$json["informe"]['febt'] = $json["informe"]['febt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"]['importe'];
		
		}

		/* //Febrero
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='2'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['febt'] = $json["informe"]['febt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		
		//$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		//$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}

		 //Marzo
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='3'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['mart'] = $json["informe"]['mart'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		
		}


		 //Abril
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='4'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['abrt'] = $json["informe"]['abrt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		}

		 //May
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='5'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['mayt'] = $json["informe"]['mayt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		}

		 //Junio
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='6'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['junt'] = $json["informe"]['junt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		
		}

		 //Julio
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='7'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['jult'] = $json["informe"]['jult'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		}

			 //Agosto
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='8'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['agot'] = $json["informe"]['agot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		}

			 //Septiembre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='9'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['sept'] = $json["informe"]['sept'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		}

			 //Octubre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='10'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json["informe"]['octt'] = $json["informe"]['octt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		}

			 //Noviembre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='11'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
			$json["informe"]['novt'] = $json["informe"]['novt'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		}

			 //Diciembre
		if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]][$row["id"]]) && date("m", $date) =='12'){ 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"]  + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
			$json["informe"]['dict'] = $json["informe"]['dict'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		}

*/


		///totales

		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] +  $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"]   ;
		$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["disponible"] = $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["presupuesto"] - $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"];

$json["informe"]['ejercidot'] = $json["informe"]['enet'] + $json["informe"]['febt'] + $json["informe"]['mart'] + $json["informe"]['abrt'] + $json["informe"]['mayt'] + $json["informe"]['junt'] + $json["informe"]['jult'] + $json["informe"]['agot'] + $json["informe"]['sept'] + $json["informe"]['octt'] + $json["informe"]['novt'] + $json["informe"]['dict'];
$json["informe"]['disponiblet'] = $json["informe"]['presupuestot'] - $json["informe"]['ejercidot'];



	
	}


	

    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

}

public function actionPdf($fecha1,$fecha2,$titulo)
		{

set_time_limit(0);
if($fecha1!='' && $fecha2 !=''){
$html ="Del $fecha1 al $fecha2 ";
}else {
$fecha1 ='';
$fecha2 ='';
}

$url = "http://localhost/spdgm/index.php/api/all?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #003399;
    font-size: 14px;
    font-weight: normal;
    padding: 10px 8px; 
    }
    td {
        color: #666699;
        font-size: 12px;
    	padding: 9px 8px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    </style>';
$html .='
<header></header>
<body>

 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

<h3>'.$titulo.'</h3>
<table >
	<tr>
		<th>Partida</th>
		<th>Fecha</th>
		<th>Folio</th>
		<th>Factura</th>
		<th>Area</th>5
		<th>Subprog</th>
		<th>Referencia</th>
		<th>Importe</th>
		<th>Concepto</th>
		<th>Fecha C/R</th>
		<th>Contrarecibo</th>
		<th>Observaciones</th>
		
	</tr>';


foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			



   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

					$html .="<tr>
	 	
	 		
	 		<td  align=\"right\">$indice3</td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"left\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";

	 			if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
							if (is_array($valor4)){
								foreach ($valor4 as $indice5 => $valor5) {
									//	echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

	$fecha_ingreso = $model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_ingreso'];
	$folio = $model[$indice][$indice2][$indice3][$indice4][$indice5]['folio'];
	$importe =$model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'];
	$area =$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
	$subprog =$model[$indice][$indice2][$indice3][$indice4][$indice5]['subprog'];
	$bandera =$model[$indice][$indice2][$indice3][$indice4][$indice5]['bandera'];
	$factura =$model[$indice][$indice2][$indice3][$indice4][$indice5]['factura'];
	$concepto =$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
	$fecha_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
	$no_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
	$detalle =$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];
	$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];


	
	

	$html .="<tr>
	 	
	 		
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\" style=\"width:100px\">$fecha_ingreso</td>
	 		<td  align=\"center\">$folio</td>
	 	    <td  align=\"center\">$factura</td>
	 		<td  align=\"center\">$area</td>
	 		<td  align=\"center\">$subprog</td>
	 		<td  align=\"left\" style=\"width:300px\">$proveedor</td>
	 		<td  align=\"right\">$importe</td>
	 		<td  align=\"center\">$concepto</td>
	 		<td  align=\"center\" style=\"width:100px\">$fecha_contrarecibo</td>
	 		<td  align=\"center\">$no_contrarecibo</td>
	 		<td  align=\"center\" style=\"width:300px\">$detalle</td>
	 		

	 	</tr>";

								}
							}




					

						}

		//$totalpartida =0;
		$totalpartida = number_format($model[$indice][$indice2][$indice3]['totalpartida'],2);
			$html .="<tr>
	 	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Total</b></td>
	 		<td  align=\"right\"><b>$totalpartida</b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		</tr>";
					}
				}
			}


   		}
   			$html .="<tr>
	 	
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Suma Total</b></td>
	 		<td  align=\"right\"><b>$sumatotal</b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";
   	}

 }

$html .='</table>

</body>
	';



$mpdf=Yii::app()->ePdf->mPDF();
$mpdf->AddPage('L','','','','',5,5,10,10,10,10);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGeneral-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}

public function actionPdfpto($fecha1,$fecha2,$id_periodo,$id_trim)
		{



$url = "http://localhost/spdgm/index.php/api/pto?fecha1=$fecha1&fecha2=$fecha2&id_periodo=$id_periodo&id_trim=$id_trim";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #000000;
    font-size: 14px;
    font-weight: normal;
    padding: 5px 4px; 
    }
    td {
        color: #000000;
        font-size: 12px;
    	padding:4px 8px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    .bpmTopicC td, .bpmTopicC td p { text-align: center; }

      @frame footer {
    -pdf-frame-content: footerContent;
    bottom: 2cm;
    margin-left: 1cm;
    margin-right: 1cm;
    height: 1cm;
  }
  table.page_footer {width: 100%; border: none; background-color: #ffffff; border-top: solid 1mm #AAAADD; padding: 2mm}
    </style>';
$html .='
<header></header>
<body>
 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>
<h3>Informe por Presupuesto del '.$fecha1.' al '. $fecha2 .'</h3>
<table class="bpmTopic">
	<tr>
		<th>Partida</th>
		<th>Ene</th>
		<th>Feb</th>
		<th>Mar</th>
		<th>Abr</th>
		<th>May</th>
		<th>Jun</th>
		<th>Jul</th>
		<th>Ago</th>
		<th>Sep</th>
		<th>Oct</th>
		<th>Nov</th>
		<th>Dic</th>
		<th>P. Autorizado</th>
		<th>Ejercido</th>
		<th>Disponible</th>
	</tr>';


foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
		//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					 if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
						//	echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
						

						$presupuestop = number_format($model[$indice][$indice2][$indice3]['presupuesto'],2);
						$enet = number_format($model[$indice][$indice2][$indice3]['ene'],2);
						$febt = number_format($model[$indice][$indice2][$indice3]['feb'],2);
						$mart = number_format($model[$indice][$indice2][$indice3]['mar'],2);
						$abrt = number_format($model[$indice][$indice2][$indice3]['abr'],2);
						$mayt = number_format($model[$indice][$indice2][$indice3]['may'],2);
						$junt = number_format($model[$indice][$indice2][$indice3]['jun'],2);
						/*$mart = number_format($model[$indice][$indice2][$indice3]['totalmar'],2);
						$abrt = number_format($model[$indice][$indice2][$indice3]['totalabr'],2);
						$mayt = number_format($model[$indice][$indice2][$indice3]['totalmay'],2);
						$junt = number_format($model[$indice][$indice2][$indice3]['totaljun'],2);
						$jult = number_format($model[$indice][$indice2][$indice3]['totaljul'],2);
						$agot = number_format($model[$indice][$indice2][$indice3]['totalago'],2);
						$sept = number_format($model[$indice][$indice2][$indice3]['totalsep'],2);
						$octt = number_format($model[$indice][$indice2][$indice3]['totaloct'],2);
						$novt = number_format($model[$indice][$indice2][$indice3]['totalnov'],2);
						$dict = number_format($model[$indice][$indice2][$indice3]['totaldic'],2);*/
						$totalejercido = number_format($model[$indice][$indice2][$indice3]['totalejercido'],2);
						$disponible = number_format($model[$indice][$indice2][$indice3]['disponible'],2);


				if ($enet==0) { $enet =''; }
			  	if ($febt==0) { $febt =''; }
			  	if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	/*if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	if ($jult==0) { $jult =''; }
			  	if ($agot==0) { $agot =''; }
			  	if ($sept==0) { $sept =''; }
			  	if ($octt==0) { $octt =''; }
			  	if ($novt==0) { $novt =''; }
			  	if ($dict==0) { $dict =''; }*/
			  	if ($presupuestop==0) { $presupuestop =0; } 
			  	if ($totalejercido==0) { $totalejercido =0; } 
			  	if ($disponible==0) { $disponible =0; }
						}
				}
							$html .="<tr>
	 		<td align=\"right\">$indice3</td>
	 		
	 		<td  align=\"right\">$enet</td>
	 		<td  align=\"right\">$febt</td>
	 		<td  align=\"right\">$mart</td>
	 		<td  align=\"right\">$abrt</td>
	 		<td  align=\"right\">$mayt</td>
	 		<td  align=\"right\">$junt</td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">$presupuestop</td>
	 		<td  align=\"right\">$totalejercido</td>
	 		<td  align=\"right\">$disponible</td>

	 	</tr>";
				}
			}
	
	 	}
	}

				$enet = number_format($model[$indice]['enet'],2);
				$febt = number_format($model[$indice]['febt'],2);
				$mart = number_format($model[$indice]['mart'],2);
				$abrt = number_format($model[$indice]['abrt'],2);
				$mayt = number_format($model[$indice]['mayt'],2);
				$junt = number_format($model[$indice]['junt'],2);
				/*$abrt = number_format($model[$indice]['abrt'],2);
				$mayt = number_format($model[$indice]['mayt'],2);
				$junt = number_format($model[$indice]['junt'],2);
				$jult = number_format($model[$indice]['jult'],2);
				$agot = number_format($model[$indice]['agot'],2);
				$sept = number_format($model[$indice]['sept'],2);
				$octt = number_format($model[$indice]['octt'],2);
				$novt = number_format($model[$indice]['novt'],2);
				$dict = number_format($model[$indice]['dict'],2);*/
				$prept = number_format($model[$indice]['presupuestot'],2);
				$ejercidot = number_format($model[$indice]['ejercidot'],2);
				$disponiblet = number_format($model[$indice]['disponiblet'],2);


				if ($enet==0) { $enet =''; }
			  	if ($febt==0) { $febt =''; }
			  	if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	/*if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	if ($jult==0) { $jult =''; }
			  	if ($agot==0) { $agot =''; }
			  	if ($sept==0) { $sept =''; }
			  	if ($octt==0) { $octt =''; }
			  	if ($novt==0) { $novt =''; }
			  	if ($dict==0) { $dict =''; }*/
			  	if ($prept==0) { $prept =0; } 
			  	if ($ejercidot==0) { $ejercidot =0; } 
			  	/*if ($disponiblet==0) { $disponiblet =0; } */
	$html .="<tr>
	 		<td  align=\"right\"><b>Total:</b></td>
	 		<td  align=\"right\"><b>$enet</b></td>
	 		<td  align=\"right\"><b>$febt</b></td>
	 		<td  align=\"right\"><b>$mart</b></td>
	 		<td  align=\"right\"><b>$abrt</b></td>
	 		<td  align=\"right\"><b>$mayt</b></td>
	 		<td  align=\"right\"><b>$junt</b></td>
	 		<td  align=\"right\"><b></b></td>
	 		<td  align=\"right\"><b></b></td>
	 		<td  align=\"right\"><b></b></td>
	 		<td  align=\"right\"><b></b></td>
	 		<td  align=\"right\"><b></b></td>
	 		<td  align=\"right\"><b></b></td>
	 		<td  align=\"right\"><b>$prept</b></td>
	 		<td  align=\"right\"><b>$ejercidot</b></td>
	 		<td  align=\"right\"><b>$disponiblet </b></td>

	 	</tr>";
}


$html .='</table>
  <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    Sistema Presupuestal
                </td>
                <td style="width: 34%; text-align: center">
                    
                </td>
                <td style="width: 33%; text-align: right">
                 page [[page_cu]]/[[page_nb]]   
                </td>
            </tr>
        </table>
    </page_footer>
</body>

	';



$mpdf=Yii::app()->ePdf->html2pdf();
//$mpdf->AddPage('L','Legal','','','',5,5,5,5,5,5);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
//$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGeneral-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}


public function actionInfpto($id_subprog) 
{
$this->layout=false;

 //echo $fecha1;
$filtro ="";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";




if($id_subprog !=""){
	$filtro .="subprog = $id_subprog AND ";
}





if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}






$q = "select * from siau_p ".$filtro2." order by partida";

//echo $q;

$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();
$resultado = $cmd->query();

$json = array();
foreach ($resultado as $row) {

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  'id' => array(),
			  'asignadot'=> 0,
			  'autorizadot'=> 0,
			  'disponiblet'=> 0,
			  'ejercidot'=> 0,
			  'ingextt'=> 0,
			  'gastosregt'=> 0,
			  'ingresosregt'=> 0,
			  'disponiblerealt'=> 0,
             
			);
		endif;

		/*$sql = "SELECT SUM(asignado) as asign,
				 	   SUM(autorizado) as autorizado,
				 	   SUM(disponible) as disponible,
				 	   SUM(ejercido) as ejercido,
				 	   SUM(ingresos_extra) as ingresos
				 	   from siau_p2 where partida=$row[partida]"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

		
        if($row['area']!=12){*/
		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=2 and partida=$row[partida] and subprog=$row[subprog] and bandera=1";

		$gastos = Yii::app()->db->createCommand($sql)->queryRow();
		/*}else {

			$gastos['gastos']=$presupuesto['ejercido'];
		}*/

		$sql = "SELECT SUM(importe) as ingresos
				 	   from base_ing where id_periodo=2 and subprog=$row[subprog] and partida=$row[partida]"; 
		$ingresos = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(presupuesto) as presupuesto
				 	   from presupuesto where id_periodo=2 and id_trimestre=6  and subprog=$row[subprog] and partida=$row[partida]";

		$pto = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT area
				 	   from presupuesto where id_periodo=2 and id_trimestre=6  and subprog=$row[subprog] and partida=$row[partida]";

		$area = Yii::app()->db->createCommand($sql)->queryRow();

		$diferenciaaut = $row['autorizado'] - $pto["presupuesto"];
		$diferenciaej = $row['ejercido'] - $gastos['gastos'];
		$disponiblereal = $pto["presupuesto"] - $gastos['gastos'];



			if( !isset($json["informe"]['id'][$row["id"]]) ): 
			$json["informe"]['id'][$row["id"]] = array(
			'partida'=> $row['partida'],
			'subprog'=> $row['subprog'],
			'asignado'=> $row['asignado'],
			'autorizado'=> $row['autorizado'],
			'checkaut'=> $diferenciaaut,
			'disponible'=> $row['disponible'],
			'ejercido'=> $row['ejercido'],
			'checkej'=> $diferenciaej,
			'checkarea'=> $area['area'],
			'ingext'=> $row['ingresos_extra'],
			'gastosreg'=> $gastos['gastos'],
			'ingresosreg'=> $ingresos['ingresos'],
			'disponiblereal'=> $disponiblereal,
             // 'totalejercido' => 0,
          
				);
			endif;

			$json["informe"]['asignadot'] = $json["informe"]['asignadot'] + $json["informe"]['id'][$row["id"]]['asignado'];
			$json["informe"]['autorizadot'] = $json["informe"]['autorizadot'] + $json["informe"]['id'][$row["id"]]['autorizado'];;
			$json["informe"]['disponiblet'] = $json["informe"]['disponiblet'] + $json["informe"]['id'][$row["id"]]['disponible'];;
			$json["informe"]['ejercidot'] = $json["informe"]['ejercidot'] + $json["informe"]['id'][$row["id"]]['ejercido'];;
			$json["informe"]['ingextt'] = $json["informe"]['ingextt'] + $json["informe"]['id'][$row["id"]]['ingext'];;
			$json["informe"]['gastosregt'] = $json["informe"]['gastosregt'] + $json["informe"]['id'][$row["id"]]['gastosreg'];;
			$json["informe"]['ingresosregt'] = $json["informe"]['ingresosregt'] + $json["informe"]['id'][$row["id"]]['ingresosreg'];
			$json["informe"]['disponiblerealt'] = $json["informe"]['disponiblerealt'] + $json["informe"]['id'][$row["id"]]['disponiblereal'];;

		


		}   

header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

//}
//}
}

public function actionInfpto2($id_subprog,$id_tipo) 
{
$this->layout=false;

 //echo $fecha1;
$filtro ="id_periodo = 2 and id_trimestre=6 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";




if($id_subprog !=0){
	$filtro .="subprog = $id_subprog AND ";
}





if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}






$q = "select * from presupuesto ".$filtro2." order by partida";

//echo $q;

$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();
$resultado = $cmd->query();

$json = array();
/*foreach ($resultado as $row) {

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  'id' => array(),
			  'presupuestot'=> 0,
             
			);
		endif;

		$sql = "SELECT SUM(asignado) as asign,
				 	   SUM(autorizado) as autorizado,
				 	   SUM(disponible) as disponible,
				 	   SUM(ejercido) as ejercido,
				 	   SUM(ingresos_extra) as ingresos
				 	   from siau_p2 where partida=$row[partida]"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=2 and partida=$row[partida] and subprog=$row[subprog]";

		$gastos = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(importe) as ingresos
				 	   from base_ing where id_periodo=2 and partida=$row[partida] and subprog=$row[subprog]"; 
		$ingresos = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(presupuesto) as presupuesto
				 	   from presupuesto where id_periodo=2 and id_trimestre=6 and partida=$row[partida]";

		$pto = Yii::app()->db->createCommand($sql)->queryRow();

		$diferenciaaut = $presupuesto['autorizado'] - $pto["presupuesto"];
		$diferenciaej = $presupuesto['ejercido'] - $gastos['gastos'];



			if( !isset($json["informe"]['id'][$row["id"]]) ): 
			$json["informe"]['id'][$row["id"]] = array(
			'partida'=> $row['partida'],
			'subprog'=> $row['subprog'],
			'asignado'=> $presupuesto['asign'],
			'autorizado'=> $presupuesto['autorizado'],
			'checkaut'=> $diferenciaaut,
			'disponible'=> $presupuesto['disponible'],
			'ejercido'=> $presupuesto['ejercido'],
			'checkej'=> $diferenciaej,
			'ingext'=> $presupuesto['ingresos'],
			'gastosreg'=> $gastos['gastos'],
			'ingresosreg'=> $ingresos['ingresos'],
             // 'totalejercido' => 0,
          
				);
			endif;

			/*if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'subprog'=> array(),
	
				);
		endif;

		$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; 



		}   */

header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

//}
//}
}



public function actionDetalle($subprog,$partida) {
	$this->layout=false;


//$arreglo = Yii::app()->getSession()->get('post');


/*$fecha1='2014-01-01';
$fecha2='2014-01-30';*/


//$fecha1 = $criterios['fecha1'];
//$fecha2 = $criterios['fecha2'];
/*$id_partida = $citerios['partida'];
$id_area = $citerios['area'];
$id_subprog = $citerios['subprog'];
$id_bandera = $citerios['bandera'];
$proveedor = $citerios['proveedor'];
$observa = $citerios['observa'];*/

//$json = array();



//echo $fecha1;
$filtro ="id_periodo = 2 and bandera=1 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($partida !=""){
	$filtro .="partida =$partida AND ";
}

if($subprog !=""){
	$filtro .="subprog = $subprog AND ";
}





if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT id, area, folio, proveedor, concepto, detalle,
  		     fecha_contrarecibo, no_contrarecibo, subprog, bandera, partida, fecha_ingreso, importe 
  		     FROM 
  		     base_cap ".$filtro2."
		     order by partida,fecha_ingreso";



$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

$json = array();
//if (is_array($resultado)){
foreach ($resultado as $row) {

if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			  'sumatotal' => 0,
			 );
		endif;
 
       if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'ids'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;

		if(!isset($json["informe"]['partida'][$row["partida"]]['id'][$row["id"]])): 
			$json["informe"]['partida'][$row["partida"]]['id'][$row["id"]] = array(
			  'fecha_ingreso'=> $row["fecha_ingreso"],
			  'folio'=> $row["folio"],
			  'area'=> $row["area"],
			  'subprog'=> $row["subprog"],
			  'bandera'=> $row["bandera"],
			  'proveedor'=> str_replace('"','',$row["proveedor"]),
			  'importe'=> $row["importe"],
			  'concepto'=> $row["concepto"],
			  'detalle'=> str_replace('"','',$row["detalle"]),
			  'fecha_contrarecibo'=> $row["fecha_contrarecibo"],
			  'no_contrarecibo'=> $row["no_contrarecibo"],
	
				);
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];
		endif;

		$json["informe"]['sumatotal'] = $json["informe"]['sumatotal'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];


		
	}
/*}else {

	$json = array();
}*/
	

    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

}

public function actionInfptoEj($fecha1,$fecha2) 
{
$this->layout=false;

$q = "select folio, sum(pagado) as pagado from ejercido_siau where (fecha BETWEEN '$fecha1' AND '$fecha2') group by folio"; 

$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();
$resultado = $cmd->query();

$json = array();
foreach ($resultado as $row) {

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  'folio' => array(),
			  //'asignadot'=> 0,
			  /*'autorizadot'=> 0,
			  'disponiblet'=> 0,
			  'ejercidot'=> 0,
			  'ingextt'=> 0,
			  'gastosregt'=> 0,
			  'ingresosregt'=> 0,
			  'disponiblerealt'=> 0,*/
             
			);
		endif;

		$folio = $row['folio'];
		list($pro, $sdo, $tro) = split('[/.-]', $folio);
        
        if($pro=='REC'){
		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=2 and bandera=1 and no_contrarecibo='$sdo-$tro'";

		$gastos = Yii::app()->db->createCommand($sql)->queryRow();
		$gastosf = $gastos['gastos'];
		}else{
			$gastosf = 0;
		}
        
        
		$check = $row['pagado'] - $gastosf;
		




			if( !isset($json["informe"]['folio'][$row["folio"]]) && $pro=='REC' ): 
			$json["informe"]['folio'][$row["folio"]] = array(
			//'codigo'=> $row['codigo'],
			'folio'=> $row['folio'],
			//'fecha'=> $row['fecha'],
			'pagado'=> $row['pagado'],
			'contrarecibo'=> $sdo.'-'.$tro,
			'gastos'=> $gastos['gastos'],
			'check'=> $check,
			/*'asignado'=> $row['asignado'],
			'autorizado'=> $row['autorizado'],
			'checkaut'=> $diferenciaaut,
			'disponible'=> $row['disponible'],
			'ejercido'=> $row['ejercido'],
			'checkej'=> $diferenciaej,
			'checkarea'=> $area['area'],
			'ingext'=> $row['ingresos_extra'],
			'gastosreg'=> $gastos['gastos'],
			'ingresosreg'=> $ingresos['ingresos'],
			'disponiblereal'=> $disponiblereal,*/
             // 'totalejercido' => 0,
          
				);
			endif;

			/*$json["informe"]['asignadot'] = $json["informe"]['asignadot'] + $json["informe"]['id'][$row["id"]]['asignado'];
			$json["informe"]['autorizadot'] = $json["informe"]['autorizadot'] + $json["informe"]['id'][$row["id"]]['autorizado'];;
			$json["informe"]['disponiblet'] = $json["informe"]['disponiblet'] + $json["informe"]['id'][$row["id"]]['disponible'];;
			$json["informe"]['ejercidot'] = $json["informe"]['ejercidot'] + $json["informe"]['id'][$row["id"]]['ejercido'];;
			$json["informe"]['ingextt'] = $json["informe"]['ingextt'] + $json["informe"]['id'][$row["id"]]['ingext'];;
			$json["informe"]['gastosregt'] = $json["informe"]['gastosregt'] + $json["informe"]['id'][$row["id"]]['gastosreg'];;
			$json["informe"]['ingresosregt'] = $json["informe"]['ingresosregt'] + $json["informe"]['id'][$row["id"]]['ingresosreg'];
			$json["informe"]['disponiblerealt'] = $json["informe"]['disponiblerealt'] + $json["informe"]['id'][$row["id"]]['disponiblereal'];;

			/*if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'subprog'=> array(),
	
				);
		endif;

		$sql = "SELECT * from codigos_programaticos where partida=$row[partida] and subprog=$row[subprog]"; 
		$codigo = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
		$partida = Yii::app()->db->createCommand($sql)->queryRow();

		    if( !isset($json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]])): 
			$json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]] =  array(
		
              'codigo'=> $codigo["codigo"],
              'clave'=> $codigo["clave"],
              'programa'=> $codigo["descripcion"],
              'presupuestosubprog'=> $row["presupuesto"],
         
				);
		$json["informe"]['partida'][$row["partida"]]['presupuestopartida'] = $json["informe"]['partida'][$row["partida"]]['presupuestopartida'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];
		$json["informe"]['presupuestot'] = $json["informe"]['presupuestot'] + $json["informe"]['partida'][$row["partida"]]['subprog'][$row["subprog"]]['presupuestosubprog'];;
	  
		endif; */



		}   

header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

//}
//}
}

public function actionInfSubprog($id_subprog) 
{
$this->layout=false;







$q = "select subprog, sum(asignado) as asignado,
	   sum(autorizado) as autorizado,
	   sum(disponible) as disponible,
	   sum(ejercido) as ejercido,
	   sum(ingresos_extra) as ingresos_extra
	   from siau_p2 group by subprog order by subprog";

//echo $q;

$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();
$resultado = $cmd->query();

$json = array();
foreach ($resultado as $row) {

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  'id' => array(),
			  'asignadot'=> 0,
			  'autorizadot'=> 0,
			  'disponiblet'=> 0,
			  'ejercidot'=> 0,
			  'ingextt'=> 0,
			  'gastosregt'=> 0,
			  'ingresosregt'=> 0,
			  'disponiblerealt'=> 0,
             
			);
		endif;

		
		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=2 and subprog=$row[subprog] and bandera=1";

		$gastos = Yii::app()->db->createCommand($sql)->queryRow();
		

		$sql = "SELECT SUM(importe) as ingresos
				 	   from base_ing where id_periodo=2 and subprog=$row[subprog]"; 
		$ingresos = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(presupuesto) as presupuesto
				 	   from presupuesto where id_periodo=2 and id_trimestre=6  and subprog=$row[subprog]";

		$pto = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT area
				 	   from presupuesto where id_periodo=2 and id_trimestre=6  and subprog=$row[subprog]";

		$area = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT alias
				 	   from subprog where id=$row[subprog]";

		$alias = Yii::app()->db->createCommand($sql)->queryRow();

		$diferenciaaut = $row['autorizado'] - $pto["presupuesto"];
		$diferenciaej = $row['ejercido'] - $gastos['gastos'];
		$disponiblereal = $pto["presupuesto"] - $gastos['gastos'];



			if( !isset($json["informe"]['subprog'][$row["subprog"]]) ): 
			$json["informe"]['subprog'][$row["subprog"]] = array(
			//'partida'=> $row['partida'],
			'subprog'=> $alias['alias'],
			'asignado'=> $row['asignado'],
			'autorizado'=> $row['autorizado'],
			'checkaut'=> $diferenciaaut,
			'disponible'=> $row['disponible'],
			'ejercido'=> $row['ejercido'],
			'checkej'=> $diferenciaej,
			'checkarea'=> $area['area'],
			'ingext'=> $row['ingresos_extra'],
			'gastosreg'=> $gastos['gastos'],
			'ingresosreg'=> $ingresos['ingresos'],
			'disponiblereal'=> $disponiblereal,
             // 'totalejercido' => 0,
          
				);
			endif;

			$json["informe"]['asignadot'] = $json["informe"]['asignadot'] + $json["informe"]['subprog'][$row["subprog"]]['asignado'];
			$json["informe"]['autorizadot'] = $json["informe"]['autorizadot'] + $json["informe"]['subprog'][$row["subprog"]]['autorizado'];;
			$json["informe"]['disponiblet'] = $json["informe"]['disponiblet'] + $json["informe"]['subprog'][$row["subprog"]]['disponible'];;
			$json["informe"]['ejercidot'] = $json["informe"]['ejercidot'] + $json["informe"]['subprog'][$row["subprog"]]['ejercido'];;
			$json["informe"]['ingextt'] = $json["informe"]['ingextt'] + $json["informe"]['subprog'][$row["subprog"]]['ingext'];;
			$json["informe"]['gastosregt'] = $json["informe"]['gastosregt'] + $json["informe"]['subprog'][$row["subprog"]]['gastosreg'];;
			$json["informe"]['ingresosregt'] = $json["informe"]['ingresosregt'] + $json["informe"]['subprog'][$row["subprog"]]['ingresosreg'];
			$json["informe"]['disponiblerealt'] = $json["informe"]['disponiblerealt'] + $json["informe"]['subprog'][$row["subprog"]]['disponiblereal'];;

		
		}   

header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 


}

public function actionPtop($id_periodo,$id_trim,$id_subprog,$id_partida) 
{
	$this->layout=false;


//echo $fecha1;
$filtro ="id_periodo = $id_periodo and bandera=1 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtro .="subprog =$id_subprog AND ";
}

if($id_partida !=0){
	$filtro .="partida = $id_partida AND ";
}





if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT partida, subprog, importe FROM 
  		     base_cap ".$filtro2."
		     order by partida,subprog";



$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

$resultado = $cmd->query();


$json = array();
foreach ($resultado as $row) {

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  'partidas' => array(),
			  'originalt'=> 0,
			  'ejercidot'=> 0,
			  'disponiblet'=> 0,
		);
		endif;

		if( !isset($json['informe']['partidas'][$row["partida"]]) ): 
			$json['informe']['partidas'][$row["partida"]] = array(
			  'subprogramas' => array(),
			  'originalp'=> 0,
			  'ejercidop'=> 0,
			  'disponiblep'=> 0,
		);
		endif;

		$sql = "SELECT SUM(presupuesto) as presupuesto
				 	   from presupuesto where id_periodo=$id_periodo and id_trimestre=$id_trim  and subprog=$row[subprog] and partida=$row[partida]";

		$pto = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=$id_periodo and subprog=$row[subprog] and partida=$row[partida] and bandera=1";

		$gastos = Yii::app()->db->createCommand($sql)->queryRow();

		$disp = $pto['presupuesto'] - $gastos['gastos'];

		if( !isset($json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]) ): 
			$json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]] = array(
			  'original' => $pto['presupuesto'],
			  'ejercido' => $gastos['gastos'],
			  'disponible' => $disp,
		);
		$json['informe']['partidas'][$row["partida"]]['originalp'] = $json['informe']['partidas'][$row["partida"]]['originalp'] + $pto['presupuesto'];
		$json['informe']['partidas'][$row["partida"]]['ejercidop'] = $json['informe']['partidas'][$row["partida"]]['ejercidop'] + $gastos['gastos'];
		$json['informe']['partidas'][$row["partida"]]['disponiblep'] = $json['informe']['partidas'][$row["partida"]]['disponiblep'] + $disp;

	    $json['informe']['originalt'] = $json['informe']['originalt'] + $json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]['original'];
		$json['informe']['ejercidot'] = $json['informe']['ejercidot'] + $json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]['ejercido'];
		$json['informe']['disponiblet'] = $json['informe']['disponiblet'] + + $json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]['disponible'];

		endif;

	
	}

	header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 
}

public function actionPtop2($id_periodo,$id_trim,$id_subprog,$id_partida) 
{
	$this->layout=false;


//echo $fecha1;
$filtro ="id_periodo = $id_periodo and id_trimestre=$id_trim and area<>12 and partida<>211 and partida<>331 and partida<>612 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtro .="subprog =$id_subprog AND ";
}

if($id_partida !=0){
	$filtro .="partida = $id_partida AND ";
}





if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT partida, subprog, presupuesto FROM 
  		     presupuesto ".$filtro2."
		     order by partida,subprog";



$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

$resultado = $cmd->query();


$json = array();
foreach ($resultado as $row) {

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  'partidas' => array(),
			  'originalt'=> 0,
			  'ejercidot'=> 0,
			  'disponiblet'=> 0,
		);
		endif;

		if( !isset($json['informe']['partidas'][$row["partida"]]) ): 
			$json['informe']['partidas'][$row["partida"]] = array(
			  'subprogramas' => array(),
			  'originalp'=> 0,
			  'ejercidop'=> 0,
			  'disponiblep'=> 0,
		);
		endif;

		/*$sql = "SELECT SUM(presupuesto) as presupuesto
				 	   from presupuesto where id_periodo=$id_periodo and id_trimestre=$id_trim  and subprog=$row[subprog] and partida=$row[partida]";

		$pto = Yii::app()->db->createCommand($sql)->queryRow();
*/
		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=$id_periodo and subprog=$row[subprog] and partida=$row[partida] and bandera=1";

		$gastos = Yii::app()->db->createCommand($sql)->queryRow();

		$disp = $row['presupuesto'] - $gastos['gastos'];

		if( !isset($json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]) ): 
			$json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]] = array(
			  'original' => $row['presupuesto'],
			  'ejercido' => $gastos['gastos'],
			  'disponible' => $disp,
		);
		$json['informe']['partidas'][$row["partida"]]['originalp'] = $json['informe']['partidas'][$row["partida"]]['originalp'] + $row['presupuesto'];
		$json['informe']['partidas'][$row["partida"]]['ejercidop'] = $json['informe']['partidas'][$row["partida"]]['ejercidop'] + $gastos['gastos'];
		$json['informe']['partidas'][$row["partida"]]['disponiblep'] = $json['informe']['partidas'][$row["partida"]]['disponiblep'] + $disp;

	    $json['informe']['originalt'] = $json['informe']['originalt'] + $json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]['original'];
		$json['informe']['ejercidot'] = $json['informe']['ejercidot'] + $json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]['ejercido'];
		$json['informe']['disponiblet'] = $json['informe']['disponiblet'] + + $json['informe']['partidas'][$row["partida"]]['subprogramas'][$row["subprog"]]['disponible'];

		endif;

	
	}

	header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 
}


public function actionPdfptop($id_periodo,$id_trim,$id_subprog,$id_partida)
		{



//echo $url = "http://localhost/spdgm/index.php/api/ptop?id_subprog=$id_subprog&id_partida=$id_partida";
$url = "http://localhost/spdgm/index.php/api/ptop?id_periodo=$id_periodo&id_trim=$id_trim&id_subprog=$id_subprog&id_partida=$id_partida";

//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #000000;
    font-size: 14px;
    font-weight: normal;
    padding: 5px 4px; 
    }
    td {
        color: #000000;
        font-size: 12px;
    	padding:4px 8px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    .bpmTopicC td, .bpmTopicC td p { text-align: center; }

      @frame footer {
    -pdf-frame-content: footerContent;
    bottom: 2cm;
    margin-left: 1cm;
    margin-right: 1cm;
    height: 1cm;
  }
  table.page_footer {width: 100%; border: none; background-color: #ffffff; border-top: solid 1mm #AAAADD; padding: 2mm}
    </style>';
$html .='
<header></header>
<body>
 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>
<h3>Informe Presupuesto por partida</h3>

<table class="table table-striped  table-hover">
	<tr>
		<th>Partida</th>
		<th>Subprog</th>
		<th>Autorizado</th>
		<th>Ejercido</th>
		<th>Disponible</th>
	</tr>';


foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			//$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			



   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

			$html .="<tr>
	 	
	 		
	 		<td  align=\"right\">$indice3</td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		
	 		

	 	</tr>";

	 			if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
							

	

							if (is_array($valor4)){
								foreach ($valor4 as $indice5 => $valor5) {

 		$original =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['original'],2);
 		$ejercido =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['ejercido'],2);
 		$disponible =number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['disponible'],2);
	$html .="<tr>
	 	
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">$indice5</td>
	 		<td  align=\"right\">$original</td>
	 		<td  align=\"right\">$ejercido</td>
	 		<td  align=\"right\">$disponible</td>
	 		

	 	</tr>";

		
								}
							}



				}	

						}

	


	$presupuestop = number_format($model[$indice][$indice2][$indice3]['originalp'],2);
			$ejercidop = number_format($model[$indice][$indice2][$indice3]['ejercidop'],2);
			$disponiblep = number_format($model[$indice][$indice2][$indice3]['disponiblep'],2);

				if ($presupuestop==0) { $presupuestop =''; }
			  	if ($ejercidop==0) { $ejercidop =''; }
			  	if ($disponiblep==0) { $disponiblep =''; }
						
		$html .="<tr>
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Subtotal:</b></td>
	 		<td  align=\"right\"><b>$presupuestop</b></td>
	 		<td  align=\"right\"><b>$ejercidop</b></td>
	 		<td  align=\"right\"><b>$disponiblep</b></td>

	 	</tr>";	
			
				}
			}
	
	 	}

		$presupuestot = number_format($model[$indice]['originalt'],2);
			$ejercidot = number_format($model[$indice]['ejercidot'],2);
			$disponiblet = number_format($model[$indice]['disponiblet'],2);

				if ($presupuestot==0) { $presupuestot =''; }
			  	if ($ejercidot==0) { $ejercidot =''; }
			  	if ($disponiblet==0) { $disponiblet =''; }
						
						$html .="<tr>
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Total:</b></td>
	 		<td  align=\"right\"><b>$presupuestot</b></td>
	 		<td  align=\"right\"><b>$ejercidot</b></td>
	 		<td  align=\"right\"><b>$disponiblet</b></td>

	 	</tr>";
	}

		
}

$html .='</table>
  <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    Sistema Presupuestal
                </td>
                <td style="width: 34%; text-align: center">
                    
                </td>
                           </tr>
        </table>
    </page_footer>
</body>

	';



$mpdf=Yii::app()->ePdf->mpdf();
//$mpdf->AddPage('L','Legal','','','',5,5,5,5,5,5);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
//$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReportePresupuestoPartida-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}

public function actionPdfext()
		{

$anio=$_GET['anio'];
$id=$_GET['id'];

$titulo = "Informe de depositos y gastos por ingresos extraordinarios $anio";

//$url = "http://localhost/spdgm/index.php/api/ingext?fecha1=$fecha1&fecha2=$fecha2";
//$url = "http://localhost/spdgm/index.php/api/ingext";
$url = "http://localhost/spdgm/index.php/api/ingext?anio=$anio&id=$id";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);



$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #000000;
    font-size: 8px;
    font-weight: normal;
    padding: 5px 4px;
    
   text-align: center; 
    }
    td {
        color: #000000;
        font-size: 7px;
    	padding:6px 4px 0;
    }
    h3 {
        color: #000000;
        font-size: 12px;
    	padding:8px 2px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    .bpmTopicC td, .bpmTopicC td p { text-align: center; }

      @frame footer {
    -pdf-frame-content: footerContent;
    bottom: 2cm;
    margin-left: 1cm;
    margin-right: 1cm;
    height: 1cm;
  }
  table.page_footer {width: 100%; border: none; background-color: #ffffff; border-top: solid 1mm #AAAADD; padding: 2mm}
    </style>';
$html .='
<header></header>
<body>
 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>
<h3>'.$titulo .' </h3>
<table class="bpmTopic">
	<tr>
		<th>Cuenta   </th>
		<th>Saldo Inicial</th>
		<th colspan="2">Ene</th>
		<th colspan="2">Feb</th>
		<th colspan="2">Mar</th>
		<th colspan="2">Abr</th>
		<th colspan="2">May</th>
		<th colspan="2">Jun</th>
		<th colspan="2">Jul</th>
		<th colspan="2">Ago</th>
		<th colspan="2">Sep</th>
		<th colspan="2">Oct</th>
		<th colspan="2">Nov</th>
		<th colspan="2">Dic</th>
	
		<th colspan="2">Total</th>
		<th>Disponible</th>
	
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th >Dep.</th>
		<th >Gtos</th>
		<th ></th>
		

	</tr>';

foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
		//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
				if (is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
						//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					
							 
	 		//$saldo_inicial = number_format($model[$indice][$indice2][$indice3][$indice4]['saldoInicial'],2);
	 		$saldo_inicial = number_format($model[$indice][$indice2][$indice3]['SaldoInicial'],2);
	 		$depositoene = number_format($model[$indice][$indice2][$indice3]['depositoEne'],2);
	 		$enegas = number_format($model[$indice][$indice2][$indice3]['enegas'],2);
	 		$depositoFeb = number_format($model[$indice][$indice2][$indice3]['depositoFeb'],2);
	 		$febgas = number_format($model[$indice][$indice2][$indice3]['febgas'],2);
	 		$depositoMar = number_format($model[$indice][$indice2][$indice3]['depositoMar'],2);
	 		$margas = number_format($model[$indice][$indice2][$indice3]['margas'],2);
	 		$depositoAbr = number_format($model[$indice][$indice2][$indice3]['depositoAbr'],2);
	 		$abrgas = number_format($model[$indice][$indice2][$indice3]['abrgas'],2);
	 		$depositoMay = number_format($model[$indice][$indice2][$indice3]['depositoMay'],2);
	 		$maygas = number_format($model[$indice][$indice2][$indice3]['maygas'],2);

	 		$depositoJun = number_format($model[$indice][$indice2][$indice3]['depositoJun'],2);
	 		$jungas = number_format($model[$indice][$indice2][$indice3]['jungas'],2);

	 		$depositoJul = number_format($model[$indice][$indice2][$indice3]['depositoJul'],2);
	 		$julgas = number_format($model[$indice][$indice2][$indice3]['julgas'],2);

	 		$depositoAgo = number_format($model[$indice][$indice2][$indice3]['depositoAgo'],2);
	 		$agogas = number_format($model[$indice][$indice2][$indice3]['agogas'],2);

	 		$depositoSep = number_format($model[$indice][$indice2][$indice3]['depositoSep'],2);
	 		$sepgas = number_format($model[$indice][$indice2][$indice3]['sepgas'],2);

	 		$depositoOct = number_format($model[$indice][$indice2][$indice3]['depositoOct'],2);
	 		$octgas = number_format($model[$indice][$indice2][$indice3]['octgas'],2);

	 		$depositoNov = number_format($model[$indice][$indice2][$indice3]['depositoNov'],2);
	 		$novgas = number_format($model[$indice][$indice2][$indice3]['novgas'],2);

	 		$depositoDic = number_format($model[$indice][$indice2][$indice3]['depositoDic'],2);
	 		$dicgas = number_format($model[$indice][$indice2][$indice3]['dicgas'],2);

	 		// totales meses

	 		$depositosTotal=number_format($model[$indice][$indice2][$indice3]['depositosmes'],2);
	 		$gastosTotal= number_format($model[$indice][$indice2][$indice3]['gastossmes'],2);
	 		$disponible= number_format($model[$indice][$indice2][$indice3]['disponible'],2);
	 		

	 			if ($saldo_inicial==0) { $saldo_inicial =''; }
	 		if ($depositoene==0) { $depositoene =''; }
	 		if ($enegas==0) { $enegas =''; }
	 		if ($depositoFeb==0) { $depositoFeb =''; }
	 		if ($febgas==0) { $febgas =''; }
	 		if ($depositoMar==0) { $depositoMar =''; }
	 		if ($margas==0) { $margas =''; }
	 		if ($depositoAbr==0) { $depositoAbr =''; }
	 		if ($abrgas==0) { $abrgas =''; }
	 		if ($depositoMay==0) { $depositoMay =''; }
	 		if ($maygas==0) { $maygas =''; }

	 		if ($depositoJun==0) { $depositoJun =''; }
	 		if ($jungas==0) { $jungas =''; }
	 		if ($depositoJul==0) { $depositoJul =''; }
	 		if ($julgas==0) { $julgas =''; }
	 		if ($depositoAgo==0) { $depositoAgo =''; }
	 		if ($agogas==0) { $agogas =''; }
	 		if ($depositoSep==0) { $depositoSep =''; }
	 		if ($sepgas==0) { $sepgas =''; }
	 		if ($depositoOct==0) { $depositoOct =''; }
	 		if ($octgas==0) { $octgas =''; }

	 		if ($depositoNov==0) { $depositoNov =''; }
	 		if ($novgas==0) { $novgas =''; }
	 		if ($depositoDic==0) { $depositoDic =''; }
	 		if ($dicgas==0) { $dicgas =''; }

	 		if ($depositosTotal==0) { $depositosTotal =''; }
	 		if ($gastosTotal==0) { $gastosTotal =''; }
	 		if ($disponible==0) { $disponible =''; }

			$html .="<tr>
	 		<td align=\"right\">$indice3</td>
	 		<td  align=\"right\">$saldo_inicial</td>
	 		<td  align=\"right\">$depositoene</td>
	 		<td  align=\"right\">$enegas</td>
	 		<td  align=\"right\">$depositoFeb</td>
	 		<td  align=\"right\">$febgas</td>
	 		<td  align=\"right\">$depositoMar</td>
	 		<td  align=\"right\">$margas</td>
			<td  align=\"right\">$depositoAbr</td>
	 		<td  align=\"right\">$abrgas</td>
	 		<td  align=\"right\">$depositoMay</td>
	 		<td  align=\"right\">$maygas</td>
	 		<td  align=\"right\">$depositoJun</td>
	 		<td  align=\"right\">$jungas</td>
	 		<td  align=\"right\">$depositoJul</td>
	 		<td  align=\"right\">$julgas</td>
	 		<td  align=\"right\">$depositoAgo</td>
	 		<td  align=\"right\">$agogas</td>
	 		<td  align=\"right\">$depositoSep</td>
	 		<td  align=\"right\">$sepgas</td>
	 		<td  align=\"right\">$depositoOct</td>
	 		<td  align=\"right\">$octgas</td>
	 		<td  align=\"right\">$depositoNov</td>
	 		<td  align=\"right\">$novgas</td>
	 		<td  align=\"right\">$depositoDic</td>
	 		<td  align=\"right\">$dicgas</td>
			<td  align=\"right\">$depositosTotal</td>
	 		<td  align=\"right\">$gastosTotal</td>
	 		<td  align=\"right\">$disponible</td>

	 		</tr>";		
		}

					}

		

		
				}

		
	}

	$saldo_inicialTotal = number_format($model[$indice]['SaldoInicialTotal'],2);
	$depositoeneTotal = number_format($model[$indice]['ingenet'],2);
	$gastoenet = number_format($model[$indice]['gastoenet'],2);
	$depositofebTotal = number_format($model[$indice]['ingfebt'],2);
	$gastofebt = number_format($model[$indice]['gastofebt'],2);
	$depositomarTotal = number_format($model[$indice]['ingmart'],2);
	$gastomart = number_format($model[$indice]['gastomart'],2);
	$depositoabrTotal = number_format($model[$indice]['ingabrt'],2);
	$gastoabrt = number_format($model[$indice]['gastoabrt'],2);
	$depositomayTotal = number_format($model[$indice]['ingmayt'],2);
	$gastomayt = number_format($model[$indice]['gastomayt'],2);

	$depositojunTotal = number_format($model[$indice]['ingjunt'],2);
	$gastojunt = number_format($model[$indice]['gastojunt'],2);

	$depositojulTotal = number_format($model[$indice]['ingjult'],2);
	$gastojult = number_format($model[$indice]['gastojult'],2);

	$depositoagoTotal = number_format($model[$indice]['ingagot'],2);
	$gastoagot = number_format($model[$indice]['gastoagot'],2);

	$depositosepTotal = number_format($model[$indice]['ingsept'],2);
	$gastosept = number_format($model[$indice]['gastosept'],2);

	$depositooctTotal = number_format($model[$indice]['ingoctt'],2);
	$gastooctt = number_format($model[$indice]['gastooctt'],2);

	$depositonovTotal = number_format($model[$indice]['ingnovt'],2);
	$gastonovt = number_format($model[$indice]['gastonovt'],2);

	$depositodicTotal = number_format($model[$indice]['ingdict'],2);
	$gastodict = number_format($model[$indice]['gastodict'],2);


	$depositosTotal = number_format($model[$indice]['ingresotot'],2);
	$gastosTotal = number_format($model[$indice]['gastotot'],2);
	$disponiblet = number_format($model[$indice]['disponiblet'],2);

    if ($saldo_inicialTotal==0) { $saldo_inicialTotal =''; }
    if ($depositoeneTotal==0) { $depositoeneTotal =''; }
    if ($gastoenet==0) { $gastoenet =''; }

    if ($depositofebTotal==0) { $depositofebTotal =''; }
    if ($gastofebt==0) { $gastofebt =''; }
    if ($depositomarTotal==0) { $depositomarTotal =''; }
    if ($gastomart==0) { $gastomart =''; }
    if ($depositoabrTotal==0) { $depositoabrTotal =''; }
    if ($depositomayTotal==0) { $depositomayTotal =''; }
    if ($gastomayt==0) { $gastomayt =''; }
    if ($depositojunTotal==0) { $depositojunTotal =''; }
    if ($gastojunt==0) { $gastojunt =''; }
    if ($depositojulTotal==0) { $depositojulTotal =''; }
    if ($gastojult==0) { $gastojult =''; }
    if ($depositoagoTotal==0) { $depositoagoTotal =''; }
    if ($gastoagot==0) { $gastoagot =''; }
    if ($depositosepTotal==0) { $depositosepTotal =''; }
    if ($gastosept==0) { $gastosept =''; }

    if ($depositooctTotal==0) { $depositooctTotal =''; }
    if ($gastooctt==0) { $gastooctt =''; }

    if ($depositonovTotal==0) { $depositonovTotal =''; }
    if ($gastonovt==0) { $gastonovt =''; }

    if ($depositodicTotal==0) { $depositodicTotal =''; }
    if ($gastodict==0) { $gastodict =''; }

    if ($depositosTotal==0) { $depositosTotal =''; }
    if ($gastosTotal==0) { $gastosTotal =''; }
     if ($disponiblet==0) { $disponiblet =''; }



	$html .="<tr>
	 		<td></td>
	 		<td  align=\"right\"><b>$saldo_inicialTotal</b></td>
	 		<td  align=\"right\"><b>$depositoeneTotal</b></td>
	 		<td  align=\"right\"><b>$gastoenet</b></td>
	 		<td  align=\"right\"><b>$depositofebTotal</b></td>
	 		<td  align=\"right\"><b>$gastofebt</b></td>
	 		<td  align=\"right\"><b>$depositomarTotal</b></td>
	 		<td  align=\"right\"><b>$gastomart</b></td>
	 		<td  align=\"right\"><b>$depositoabrTotal</b></td>
	 		<td  align=\"right\"><b>$gastoabrt</b></td>
	 		<td  align=\"right\"><b>$depositomayTotal</b></td>
	 		<td  align=\"right\"><b>$gastomayt</b></td>
	 		<td  align=\"right\"><b>$depositojunTotal</b></td>
	 		<td  align=\"right\"><b>$gastojunt</b></td>
	 		<td  align=\"right\"><b>$depositojulTotal</b></td>
	 		<td  align=\"right\"><b>$gastojult</b></td>
	 		<td  align=\"right\"><b>$depositoagoTotal</b></td>
	 		<td  align=\"right\"><b>$gastoagot</b></td>
	 		<td  align=\"right\"><b>$depositosepTotal</b></td>
	 		<td  align=\"right\"><b>$gastosept</b></td>
	 		<td  align=\"right\"><b>$depositooctTotal</b></td>
	 		<td  align=\"right\"><b>$gastooctt</b></td>
	 		<td  align=\"right\"><b>$depositonovTotal</b></td>
	 		<td  align=\"right\"><b>$gastonovt</b></td>
	 		<td  align=\"right\"><b>$depositodicTotal</b></td>
	 		<td  align=\"right\"><b>$gastodict</b></td>
	 		

	 		<td  align=\"right\"><b>$depositosTotal</b></td>
	 		<td  align=\"right\"><b>$gastosTotal</b></td>
	 		<td  align=\"right\"><b>$disponiblet</b></td>
	 		</tr>";
		
}


$html .='</table>
  <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    Sistema Presupuestal
                </td>
                <td style="width: 34%; text-align: center">
                    
                </td>
                <td style="width: 33%; text-align: right">
                 page [[page_cu]]/[[page_nb]]   
                </td>
            </tr>
        </table>
    </page_footer>
</body>

	';



$mpdf=Yii::app()->ePdf->html2pdf();
$mpdf -> pdf->SetDisplayMode('fullpage');
//$mpdf->AddPage('L','Legal','','','',5,5,5,5,5,5);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
//$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGastosIngresosExtraordinario-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}


public function actionAllC($fecha1,$fecha2) {
	$this->layout=false;


//$arreglo = Yii::app()->getSession()->get('post');


/*$fecha1='2014-01-01';
$fecha2='2014-01-30';*/

$sql = "SELECT  * from criterios where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();
//echo $criterios->getText();



//$fecha1 = $criterios['fecha1'];
//$fecha2 = $criterios['fecha2'];
$id_partida = $citerios['partida'];
$id_area = $citerios['area'];
$id_subprog = $citerios['subprog'];
$id_bandera = $citerios['bandera'];
$proveedor = $citerios['proveedor'];
$observa = $citerios['observa'];

//$json = array();

if($id_subprog==0){
	$id_subprog="";
}

if($id_area==0){
	$id_area="";
}

//echo $fecha1;
$filtro ="id_periodo = 2 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";

if($fecha1 !="" && $fecha2 != ""){
	  //echo "entro al if";
		$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";
	}
if($id_partida !=""){
	$filtro .="partida =$id_partida AND ";
}

if($id_subprog !=""){
	$filtro .="subprog = $id_subprog AND ";
}

if($id_area !=""){
	$filtro .="area =$id_area AND ";
}




if($proveedor !=""){
	$filtro .="proveedor ='$proveedor' AND ";
}

//if($observa !=""){
//$observa = 'OFUNAM';
	$filtro .="detalle like '%$observa%' AND ";
//}


if($id_bandera !=""){
	$filtro .="bandera =$id_bandera AND ";
}



if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT id, area, folio, proveedor, concepto, detalle,
  		     fecha_contrarecibo, no_contrarecibo, subprog, bandera, partida, fecha_ingreso, importe, factura 
  		     FROM 
  		     base_cap ".$filtro2."
		     order by partida,fecha_ingreso";



$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

$json = array();
//if (is_array($resultado)){
foreach ($resultado as $row) {

if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			  'sumatotal' => 0,
			 );
		endif;
 
       if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'ids'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;

		if(!isset($json["informe"]['partida'][$row["partida"]]['id'][$row["id"]])): 
			$json["informe"]['partida'][$row["partida"]]['id'][$row["id"]] = array(
			  'fecha_ingreso'=> $row["fecha_ingreso"],
			  'folio'=> $row["folio"],
			  'area'=> $row["area"],
			  'subprog'=> $row["subprog"],
			  'bandera'=> $row["bandera"],
			  'factura'=> $row["factura"],
			  'proveedor'=> str_replace('"','',$row["proveedor"]),
			  'importe'=> $row["importe"],
			  'concepto'=> $row["concepto"],
			  'detalle'=> str_replace('"','',$row["detalle"]),
			  'fecha_contrarecibo'=> $row["fecha_contrarecibo"],
			  'no_contrarecibo'=> $row["no_contrarecibo"],
	
				);
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];
		endif;

		$json["informe"]['sumatotal'] = $json["informe"]['sumatotal'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];


		
	}
/*}else {

	$json = array();
}*/
	

    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

}

public function actionAllIng($fecha1,$fecha2) {
	$this->layout=false;


//$arreglo = Yii::app()->getSession()->get('post');


/*$fecha1='2014-01-01';
$fecha2='2014-01-30';*/

$sql = "SELECT  * from criterios where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();
//echo $criterios->getText();


$id_partida = $criterios['partida'];
$id_subprog = $criterios['subprog'];
$id_area = $criterios['area'];
$id_bandera = $criterios['bandera'];
$proveedor = $criterios['proveedor'];
$observa = $criterios['observa'];

//$fecha1 = $criterios['fecha1'];
//$fecha2 = $criterios['fecha2'];
/*$id_partida = $citerios['partida'];
$id_area = $citerios['area'];
$id_subprog = $citerios['subprog'];
$id_bandera = $citerios['bandera'];
$proveedor = $citerios['proveedor'];
$observa = $citerios['observa'];*/

//$json = array();



//echo $fecha1;
$filtro ="id_periodo = 2 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";

if($fecha1 !="" && $fecha2 != ""){
	  //echo "entro al if";
		$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";
	}
if($id_partida !=""){
	$filtro .="partida =$id_partida AND ";
}

if($id_subprog !=""){
	$filtro .="subprog = $id_subprog AND ";
}

if($id_area !=""){
	$filtro .="area =$id_area AND ";
}




if($proveedor !=""){
	$filtro .="proveedor ='$proveedor' AND ";
}

//if($observa !=""){
//$observa = 'OFUNAM';
	$filtro .="detalle like '%$observa%' AND ";
//}


if($id_bandera !=""){
	$filtro .="bandera =$id_bandera AND ";
}



if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT id, area, folio, proveedor, concepto, detalle,
  		     fecha_contrarecibo, no_contrarecibo, subprog, bandera, partida, fecha_ingreso, importe, factura 
  		     FROM 
  		     base_ing ".$filtro2."
		     order by partida,fecha_ingreso";



$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

$json = array();
//if (is_array($resultado)){
foreach ($resultado as $row) {

if( !isset( $json['informe'] )): 
			$json['informe'] = array(
			  'partida' => array(),
			  'sumatotal' => 0,
			 );
		endif;
 
       if( !isset($json["informe"]['partida'][$row["partida"]])): 
			$json["informe"]['partida'][$row["partida"]] = array(
			  'ids'=> array(),
			  'totalpartida' => 0,
	
				);
		endif;

		if(!isset($json["informe"]['partida'][$row["partida"]]['id'][$row["id"]])): 
			$json["informe"]['partida'][$row["partida"]]['id'][$row["id"]] = array(
			  'fecha_ingreso'=> $row["fecha_ingreso"],
			  'folio'=> $row["folio"],
			  'area'=> $row["area"],
			  'subprog'=> $row["subprog"],
			  'bandera'=> $row["bandera"],
			  'factura'=> $row["factura"],
			  'proveedor'=> str_replace('"','',$row["proveedor"]),
			  'importe'=> $row["importe"],
			  'concepto'=> $row["concepto"],
			  'detalle'=> str_replace('"','',$row["detalle"]),
			  'fecha_contrarecibo'=> $row["fecha_contrarecibo"],
			  'no_contrarecibo'=> $row["no_contrarecibo"],
	
				);
		$json["informe"]['partida'][$row["partida"]]['totalpartida'] = $json["informe"]['partida'][$row["partida"]]['totalpartida'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];
		endif;

		$json["informe"]['sumatotal'] = $json["informe"]['sumatotal'] + $json["informe"]['partida'][$row["partida"]]['id'][$row["id"]]['importe'];


		
	}
/*}else {

	$json = array();
}*/
	

    			header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 

}

public function actionPdfIng($fecha1,$fecha2,$titulo)
		{

set_time_limit(0);
if($fecha1!='' && $fecha2 !=''){
$html ="Del $fecha1 al $fecha2 ";
}else {
$fecha1 ='';
$fecha2 ='';
}

$url = "http://localhost/spdgm/index.php/api/allIng?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #003399;
    font-size: 14px;
    font-weight: normal;
    padding: 10px 8px; 
    }
    td {
        color: #666699;
        font-size: 12px;
    	padding: 9px 8px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    </style>';
$html .='
<header></header>
<body>

 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

<h3>'.$titulo.'</h3>
<table >
	<tr>
		<th>Partida</th>
		<th>Fecha</th>
		<th>Folio</th>
		<th>Factura</th>
		<th>Area</th>5
		<th>Subprog</th>
		<th>Referencia</th>
		<th>Importe</th>
		<th>Concepto</th>
		<th>Fecha C/R</th>
		<th>Contrarecibo</th>
		<th>Observaciones</th>
		
	</tr>';


foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			



   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

					$html .="<tr>
	 	
	 		
	 		<td  align=\"right\">$indice3</td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";

	 			if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
							if (is_array($valor4)){
								foreach ($valor4 as $indice5 => $valor5) {
									//	echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

	$fecha_ingreso = $model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_ingreso'];
	$folio = $model[$indice][$indice2][$indice3][$indice4][$indice5]['folio'];
	$importe =$model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'];
	$area =$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
	$subprog =$model[$indice][$indice2][$indice3][$indice4][$indice5]['subprog'];
	$bandera =$model[$indice][$indice2][$indice3][$indice4][$indice5]['bandera'];
	$factura =$model[$indice][$indice2][$indice3][$indice4][$indice5]['factura'];
	$concepto =$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
	$fecha_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
	$no_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
	$detalle =$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];
	$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];


	
	

	$html .="<tr>
	 	
	 		
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\" style=\"width:100px\">$fecha_ingreso</td>
	 		<td  align=\"center\">$folio</td>
	 	    <td  align=\"center\">$factura</td>
	 		<td  align=\"center\">$area</td>
	 		<td  align=\"center\">$subprog</td>
	 		<td  align=\"center\" style=\"width:300px\">$proveedor</td>
	 		<td  align=\"right\">$importe</td>
	 		<td  align=\"center\">$concepto</td>
	 		<td  align=\"center\" style=\"width:100px\">$fecha_contrarecibo</td>
	 		<td  align=\"center\">$no_contrarecibo</td>
	 		<td  align=\"center\" style=\"width:300px\">$detalle</td>
	 		

	 	</tr>";

								}
							}




					

						}

		//$totalpartida =0;
		$totalpartida = number_format($model[$indice][$indice2][$indice3]['totalpartida'],2);
			$html .="<tr>
	 	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Total</b></td>
	 		<td  align=\"right\"><b>$totalpartida</b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		</tr>";
					}
				}
			}


   		}
   			$html .="<tr>
	 	
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Suma Total</b></td>
	 		<td  align=\"right\"><b>$sumatotal</b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";
   	}

 }

$html .='</table>

</body>
	';



$mpdf=Yii::app()->ePdf->mPDF();
$mpdf->AddPage('L','','','','',5,5,10,10,10,10);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
$mpdf->SetFooter('Informe detalle de Ingresos|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGeneralIngresos-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}


public function actionPresupuesto2dopdf($id_periodo,$id_trim,$id_partida,$titulo){



$url = "http://localhost/spdgm/index.php/api/presupuesto2do?id_periodo=$id_periodo&id_trim=$id_trim&id_partida=$id_partida";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #000000;
    font-size: 14px;
    font-weight: normal;
    padding: 5px 4px; 
    }
    td {
        color: #000000;
        font-size: 10px;
    	padding:4px 8px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    .bpmTopicC td, .bpmTopicC td p { text-align: center; }

      @frame footer {
    -pdf-frame-content: footerContent;
    bottom: 2cm;
    margin-left: 1cm;
    margin-right: 1cm;
    height: 1cm;
  }
  table.page_footer {width: 100%; border: none; background-color: #ffffff; border-top: solid 1mm #AAAADD; padding: 2mm}
    </style>';
$html .='
<header></header>
<body>
 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>
<h3>'.$titulo.'</h3>

<table class="table table-striped  table-hover">
	<tr>
		<th>Partidad</th>
		<th>Codigo</th>
		<th>CV</th>
		<th>Programa</th>
		<th>Autorizado</th>
		
	<tr>';


foreach ($model as $indice => $valor) {
   //	echo ("El indice1 $indice tiene el valor: $valor<br>");
   	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
	//	echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
		if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

								$html .="<tr>
	 		<td><center><b>$indice3<b></center></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		
	 		
	 	</tr>";
	 
	 	if (is_array($valor3)){
				foreach ($valor3 as $indice4 => $valor4) {
					//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
					if (is_array($valor4)){
						foreach ($valor4 as $indice5 => $valor5) {
							//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");
					

					$codigo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['codigo'];
					$clave=$model[$indice][$indice2][$indice3][$indice4][$indice5]['clave'];
					$programa=$model[$indice][$indice2][$indice3][$indice4][$indice5]['programa'];
					$presupuestosubprog=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['presupuestosubprog'],2);
		/*$subprog=$model[$indice][$indice2][$indice3][$indice4][$indice5]['subprog'];
		$area=$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
		$proveedor=$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
		$importe=number_format($model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'],2);
		$concepto=$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
		$partida=$model[$indice][$indice2][$indice3][$indice4][$indice5]['partida'];
		$fecha_contrarecibo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
		$no_contrarecibo=$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
		$detalle=$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];*/
			$html .="<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\">$codigo</td>
	 		<td  align=\"center\">$clave</td>
	 		<td  align=\"center\">$programa</td>
	 		<td  align=\"right\">$presupuestosubprog</td>
	 	
	 		</tr>";

		
	 	}
	 }





				}
		}

$importef=number_format($valor4,2);
			 $html .="<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 	
	 		<td  align=\"right\"><b>Suma:<b></td>
	 		<td  align=\"right\"><b>$importef<b></td>
	 		
	 		</tr>";



				}
		}


	}
}

$importefinal=number_format($model[$indice]['presupuestot'],2);
			 $html .="<tr>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\"></td>
	 		
	 		<td  align=\"right\"><b>Suma Total:<b></td>
	 		<td  align=\"right\"><div class=\"label label-success\">$importefinal</div></td>
	 		
	 		
	 		</tr>";
		}


$html .='</table>
  <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    Sistema Presupuestal
                </td>
                <td style="width: 34%; text-align: center">
                    
                </td>
                           </tr>
        </table>
    </page_footer>
</body>

	';



$mpdf=Yii::app()->ePdf->mpdf();
//$mpdf->AddPage('L','Legal','','','',5,5,5,5,5,5);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
//$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReportePresupuestoPartida-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}


public function actionPdfPagos($id_periodo,$id_pago,$titulo)
		{

set_time_limit(0);
if($id_pago!=0){
$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
if($id_pago==1){
		$tipo ="Pagados";
	} else {
		$tipo ="Pendientes";
	}

}else{

	

$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

$html ='<style>
   body {
        font-family: sans-serif;
    }

#header {
width: 100%;
background: url(\'../img/unam.jpg\') no-repeat;
position: relative;
height: 658px;
background-position-x: 172px;
}
    a {
        color: #000066;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
    }
    thead {
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }
    tfoot {
        text-align: center;
        font-weight: bold;
    }
    th {
    border-bottom: 2px solid #6678B1;
    color: #000000;
    font-size: 14px;
    font-weight: normal;
    padding: 10px 8px; 
    }
    td {
        color: #000000;
        font-size: 12px;
    	padding: 9px 8px 0;
    }
    img {
        margin: 0.2em;
        vertical-align: middle;
    }
    </style>';
$html .='
<header></header>
<body>

 <table cellspacing="0" style="width: 100%; text-align: center; ">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 16px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

<h3>'.$titulo.'</h3>
<table >
	<tr>
		<th>Num.</th>
		<th>Nombre</th>
		<th>Concepto</th>
		
		<th>Cheque</th>
		<th>Contrarecibo</th>
		<th>Fecha Contrarecibo</th>
		<th width=60>Fecha cheque</th>
		<th>Importe</th>
		<th>Pagado</th>
		
	</tr>';


$num=1;
foreach ($model as $row) {

	if($row->pagado==1){
     // $pagado="SI";
      $imagen = Yii::app()->request->baseUrl ."/images/correcto.png";

	} else {
	  // $pagado="NO";
	   $imagen = Yii::app()->request->baseUrl ."/images/incorrecto.png";

	}
$html .="<tr>
        <td>$num</td>
		<td>$row->proveedor</td>
		<td>$row->detalle</td>
		
		<td>$row->cheque</td>
		<td>$row->no_contrarecibo</td>
		<td>$row->fecha_contrarecibo</td>
		<td width='60' >$row->fecha_cheque</td>
		<td>$row->importe</td>
		<td><center><img class=img-responsive tpad src=$imagen></center></td>
		
	<tr>";
  $num++;
}


$html .='</table>

</body>
	';



$mpdf=Yii::app()->ePdf->mPDF();
$mpdf->AddPage('L','','','','',5,5,10,10,10,10);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
$mpdf->SetFooter('Informe detalle de pagos|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGeneralPagos-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


}


}



?>
