<?php

class InformesgController extends Controller
{
	

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','info', 'infop'),
				'users'=>array('*'),
			),
			
		);
	}
	public function actionIndex()
	{

		$resultado = BaseCap::model()->findAll();
        $data = array();
       $data["Informes por Partida"] = array();
      // $data["Informes por Subprograma"] = array();
      // $data["Informes por Area"] = array();
       
       $data=array(
  'Informes por Partida'=>array(
    '1'=>'Informe general por partidas 2013',
   // '2'=>'181',
    //'3'=>'Tiga',
  ),
 /* 'Informes por Subprograma'=>array(
    '2'=>'Informe general por subprogramas 2013',
   // '5'=>'Loro',
    //'6'=>'Telu',
  ),
/*  'Informe por Area'=>array(
    '3'=>'Informe general por áreas 2013',
    '31'=>'Dirección General de Música',
    '32'=>'Dirección Administrativa',
    '33'=>'Subdirección de Promoción y relaciones públicas',
    '34'=>'Música de Cámara',
    '35'=>'OFUNAM',
    '36'=>'Eventos Especiales',
    '37'=>'Subdirección de Programación',
    '38'=>'Subdirección de Opera',
    '39'=>'Subdirección de Desarrollo',
    '40'=>'Patronato de la Ofunam A.C',
    '41'=>'Orguesta Juvenil "Eduardo Mata"',
   

    //'8'=>'Dua',
    //'9'=>'Tilu',
  ),*/
);
      
       /* foreach ($resultado as $key => $row) {


        }*/
		$this->render('index',array('data'=>$data));
	}



	public function actionInfo()
	{
	
		

	$id =$_GET['id'];

	if ($id==1){
$resultado = BaseCap::model()->findAll();
        $basecap = array();	
        foreach ($resultado as $key => $row) {
         
        $sql = "SELECT SUM(presupuesto) as suma from presupuesto where partida2=$row[partida]"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

		if( !isset( $json[$row["partida"]] ) ):

			
           //$presupuesto)); 
			$json[$row["partida"]] = array(
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
              'presupuesto'=> 0,
              'ejercido' => 0,
              'disponible'=> 0,
				);
		endif;
		$fecha =$row["fecha_ingreso"]; 
		$date = strtotime("$fecha");
		//echo date("Y", $date); // Year (2003)
		//echo date("m", $date); // Month (12)
		//echo date("d", $date); // day (14) 
		if( !isset($json[$row["partida"]]["ene"][$row["fecha_ingreso"]]) && date("m", $date) =='1'){ 
			$json[$row["partida"]]["ene"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			//	'criterios' => array(),
			//	'totalimporte' => 0
			);
		$json[$row["partida"]]["totalene"] = $json[$row["partida"]]["totalene"] + $json[$row["partida"]]["ene"][$row["fecha_ingreso"]]["importe"];

		}

		if( !isset($json[$row["partida"]]["feb"][$row["fecha_ingreso"]]) && date("m", $date) =='2'){ 
			$json[$row["partida"]]["feb"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			//	'criterios' => array(),
			//	'totalimporte' => 0
			);
		$json[$row["partida"]]["totalfeb"] = $json[$row["partida"]]["totalfeb"] + $json[$row["partida"]]["feb"][$row["fecha_ingreso"]]["importe"];

		}

        $json[$row["partida"]]["ejercido"] = $json[$row["partida"]]["totalene"] + $json[$row["partida"]]["totalfeb"];
        $json[$row["partida"]]["presupuesto"] = $presupuesto["suma"];
        $json[$row["partida"]]["disponible"] =   $json[$row["partida"]]["presupuesto"] - $json[$row["partida"]]["ejercido"] ;


		/*if( !isset($json[$row["partida"]]["fecha_ingreso"][$row["fecha_ingreso"]]) ): 
			$json[$row["partida"]]["fecha_ingreso"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			//	'criterios' => array(),
				'totalimporte' => 0
			); 

		$json[$row["partida"]]["totalimporte"] = $json[$row["partida"]]["totalimporte"] + $json[$row["partida"]]["fecha_ingreso"][$row["fecha_ingreso"]]["importe"];
		endif; */
	//	$json[$row["partida"]]["totalpartidas"]++; 
        }

     }

if ($id==31) {

  $criteria = new CDbCriteria;
  $criteria->addCondition('area=1', 'AND');
  $resultado = BaseCap::model()->findAll($criteria);

	 //   $resultado = BaseCap::model()->findBySql($sql);
      //  $basecap = array();	

//print_r($resultado);
        foreach ($resultado as $key => $row) {
         
        $sql = "SELECT SUM(presupuesto) as suma from presupuesto where area=1"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();
		
	

		if( !isset( $json['area'] ) ): 
			$json['area'][$row["area"]] = array(
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
			  'presupuestot'=> $presupuesto['suma'],
              'ejercidot' => 0,
              'disponiblet'=> 0,
			);
		endif; 



		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]) ): 
			$json["area"][$row["area"]]['partida'][$row["partida"]] = array(
				'subprog' => array(),
				); 
		endif;
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]) ): 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]] = array(
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
              'presupuesto'=> 0,
             // 'totalejercido' => 0,
              'disponible'=> 0,
				); 
		endif;
		$fecha =$row["fecha_ingreso"]; 
		$date = strtotime("$fecha");
 //Enero
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]) && date("m", $date) =='1'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}
 //Feb
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]) && date("m", $date) =='2'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["febt"] = $json['area'][$row["area"]]["febt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		}
//Mar
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]) && date("m", $date) =='3'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["mart"] = $json['area'][$row["area"]]["mart"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		
		}
//abr
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]) && date("m", $date) =='4'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["abrt"] = $json['area'][$row["area"]]["abrt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		
		}

//May
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]) && date("m", $date) =='5'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["mayt"] = $json['area'][$row["area"]]["mayt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		
		}
//Jun
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]) && date("m", $date) =='6'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["junt"] = $json['area'][$row["area"]]["junt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		
		}
//Jul
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]) && date("m", $date) =='7'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["jult"] = $json['area'][$row["area"]]["jult"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		
		}
//Ago
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]) && date("m", $date) =='8'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["agot"] = $json['area'][$row["area"]]["agot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		
		}
//Sep
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]) && date("m", $date) =='9'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["sept"] = $json['area'][$row["area"]]["sept"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		
		}
//Oct
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]) && date("m", $date) =='10'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["octt"] = $json['area'][$row["area"]]["octt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		
		}
//Nov
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]) && date("m", $date) =='11'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["novt"] = $json['area'][$row["area"]]["novt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		
		}
//Dic
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]) && date("m", $date) =='12'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["dict"] = $json['area'][$row["area"]]["dict"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		
		}




$sql2 = "SELECT SUM(presupuesto) as suma from presupuesto where partida2=$row[partida] and area=$row[area] and subprog=$row[subprog]";
//echo "$sql2";
		$presupuesto1 = Yii::app()->db->createCommand($sql2)->queryRow();

$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"];
$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["presupuesto"] = $presupuesto1['suma'];
$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["disponible"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["presupuesto"] - $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"];


$json['area'][$row["area"]]["disponiblet"] =$json['area'][$row["area"]]["presupuestot"] - $json['area'][$row["area"]]["ejercidot"];



        }

     }


if ($id==32) {

  $criteria = new CDbCriteria;
  $criteria->addCondition('area=2', 'AND');
  $resultado = BaseCap::model()->findAll($criteria);

	 //   $resultado = BaseCap::model()->findBySql($sql);
      //  $basecap = array();	

//print_r($resultado);
        foreach ($resultado as $key => $row) {
         
        $sql = "SELECT SUM(presupuesto) as suma from presupuesto where area=2"; 
		$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();
		
	

		if( !isset( $json['area'] ) ): 
			$json['area'][$row["area"]] = array(
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
			  'presupuestot'=> $presupuesto['suma'],
              'ejercidot' => 0,
              'disponiblet'=> 0,
			);
		endif; 



		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]) ): 
			$json["area"][$row["area"]]['partida'][$row["partida"]] = array(
				'subprog' => array(),
				); 
		endif;
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]) ): 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]] = array(
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
              'presupuesto'=> 0,
             // 'totalejercido' => 0,
              'disponible'=> 0,
				); 
		endif;
		$fecha =$row["fecha_ingreso"]; 
		$date = strtotime("$fecha");
 //Enero
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]) && date("m", $date) =='1'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["enet"] = $json['area'][$row["area"]]["enet"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ene"][$row["fecha_ingreso"]]['importe'];
		}
 //Feb
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]) && date("m", $date) =='2'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["febt"] = $json['area'][$row["area"]]["febt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["feb"][$row["fecha_ingreso"]]['importe'];
		}
//Mar
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]) && date("m", $date) =='3'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["mart"] = $json['area'][$row["area"]]["mart"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["mar"][$row["fecha_ingreso"]]['importe'];
		
		}
//abr
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]) && date("m", $date) =='4'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["abrt"] = $json['area'][$row["area"]]["abrt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["abr"][$row["fecha_ingreso"]]['importe'];
		
		}

//May
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]) && date("m", $date) =='5'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["mayt"] = $json['area'][$row["area"]]["mayt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["may"][$row["fecha_ingreso"]]['importe'];
		
		}
//Jun
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]) && date("m", $date) =='6'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["junt"] = $json['area'][$row["area"]]["junt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jun"][$row["fecha_ingreso"]]['importe'];
		
		}
//Jul
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]) && date("m", $date) =='7'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["jult"] = $json['area'][$row["area"]]["jult"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["jul"][$row["fecha_ingreso"]]['importe'];
		
		}
//Ago
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]) && date("m", $date) =='8'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["agot"] = $json['area'][$row["area"]]["agot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["ago"][$row["fecha_ingreso"]]['importe'];
		
		}
//Sep
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]) && date("m", $date) =='9'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["sept"] = $json['area'][$row["area"]]["sept"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["sep"][$row["fecha_ingreso"]]['importe'];
		
		}
//Oct
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]) && date("m", $date) =='10'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["octt"] = $json['area'][$row["area"]]["octt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["oct"][$row["fecha_ingreso"]]['importe'];
		
		}
//Nov
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]) && date("m", $date) =='11'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["novt"] = $json['area'][$row["area"]]["novt"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["nov"][$row["fecha_ingreso"]]['importe'];
		
		}
//Dic
		if( !isset($json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]) && date("m", $date) =='12'){ 
			$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			);
		
		$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"]  + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["dict"] = $json['area'][$row["area"]]["dict"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		$json['area'][$row["area"]]["ejercidot"] = $json['area'][$row["area"]]["ejercidot"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["dic"][$row["fecha_ingreso"]]['importe'];
		
		}




$sql2 = "SELECT SUM(presupuesto) as suma from presupuesto where partida=$row[partida] and area=$row[area] and subprog=$row[subprog]";
//echo "$sql2";
		$presupuesto1 = Yii::app()->db->createCommand($sql2)->queryRow();

$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalene"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalfeb"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmar"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalabr"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalmay"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljun"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaljul"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalago"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalsep"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaloct"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalnov"] + $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totaldic"];
$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["presupuesto"] = $presupuesto1['suma'];
$json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["disponible"] = $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["presupuesto"] - $json["area"][$row["area"]]['partida'][$row["partida"]]['subprog'][$row["subprog"]]["totalejercido"];


$json['area'][$row["area"]]["disponiblet"] =$json['area'][$row["area"]]["presupuestot"] - $json['area'][$row["area"]]["ejercidot"];



        }

     }

   $this->renderPartial('_informe', array(
			'model'=>$json));
      
	}



}