<?php

class InformesfaController extends Controller
{
	
public function actionIndex()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{
 
 $area   =$_POST['id'];
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];
 // $id_bandera  =$_POST['id_bandera'];

$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'area'=>$area));

} else {
 $area =0;
 $fecha1 ='';
 $fecha2 ='';
 //$id_bandera   =0;
$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'area'=>$area));

}

	}


public function actionIndex2()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{
 
 $area   =$_POST['id'];
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];
 // $id_bandera  =$_POST['id_bandera'];

$this->render('_criterios2',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'area'=>$area));

} else {
 $area =0;
 $fecha1 ='';
 $fecha2 ='';
 //$id_bandera   =0;
$this->render('_criterios2',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'area'=>$area));

}

	}
	public function actionIndex22()
	{




		$resultado = BaseCap::model()->findAll((array('order'=>'partida')));

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
		$this->render('index', array(
			'model'=>$json));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/




public function actionReqTest04() {
 //echo CHtml::encode(print_r($_POST, true));
 //die();
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
//$_POST['id'];
$id_subprog = $_POST['id_subprog'];
$id_periodo = $_POST['id_periodo'];
$id_trim = $_POST['id_trim'];
$id_area = $_POST['id_area'];
$id_trim = $_POST['id_trim'];
$id_partida = $_POST['id_partida'];



if(isset($id_subprog,$id_periodo,$id_trim,$id_area)){

//echo $fecha1;
//echo $fecha2;


if (($id_subprog != '') && ($id_periodo != '') && ($id_trim != '') && ($id_area != '')) {

$sql = "SELECT nombre  from subprog where id=$id_subprog"; 
$nomarea = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT nombre  from banderas where id=1"; 
$nombandera = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT nombre  from cat_areas where id=$id_area"; 
$nomarea1 = Yii::app()->db->createCommand($sql)->queryRow();


	$titulo = "$nombandera[nombre] <br>$nomarea[nombre]<br>$nomarea1[nombre]<br> ";


//$titulo = "Informe Presupuesto por Partida 2014";
//$titulo = "Informe por Presupuesto 2014";
//echo $url = "http://localhost/spdgm/index.php/api/subprog?fecha1=$fecha1&fecha2=$fecha2&id_partida=$id_partida&subprog=$id_subprog&id_periodo=$id_periodo&id_trim=$id_trim&id_area=$id_area";
//$url = "http://localhost/spdgm/index.php/api/ptop?id_periodo=$id_periodo&id_trim=$id_trim&id_subprog=$id_subprog&id_partida=$id_partida";
//$url = $baseUrl;
//$data = file_get_contents($url);
//$model= CJSON::decode($data);


$this->renderPartial('_rpt', array(
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_subprog'=>$id_subprog,
			'id_partida'=>$id_partida,
			'id_area'=>$id_area,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2
			));

//echo $model;
/*$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			//'fecha1'=>$fecha1,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_subprog'=>$id_subprog
			));*/

	//}


	}else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar todos los  criterios de busqueda.
</div>
<?php

}

}
}

public function actionReqTest05() {
 //echo CHtml::encode(print_r($_POST, true));
 //die();
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
//$_POST['id'];
$id_subprog = $_POST['id_subprog'];
$id_periodo = $_POST['id_periodo'];
$id_trim = $_POST['id_trim'];
$id_area = $_POST['id_area'];
$id_trim = $_POST['id_trim'];
$id_partida = $_POST['id_partida'];
$id_bandera = $_POST['id_bandera'];



if(isset($id_subprog,$id_periodo,$id_trim,$id_area,$id_bandera)){

//echo $fecha1;
//echo $fecha2;


if (($id_subprog != '') && ($id_periodo != '') && ($id_trim != '') && ($id_area != '')) {

$sql = "SELECT nombre  from subprog where id=$id_subprog"; 
$nomarea = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT nombre  from banderas where id=1"; 
$nombandera = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT nombre  from cat_areas where id=$id_area"; 
$nomarea1 = Yii::app()->db->createCommand($sql)->queryRow();


	$titulo = "$nombandera[nombre] <br>$nomarea[nombre]<br>$nomarea1[nombre]<br> ";


//$titulo = "Informe Presupuesto por Partida 2014";
//$titulo = "Informe por Presupuesto 2014";
//echo $url = "http://localhost/spdgm/index.php/api/subprog?fecha1=$fecha1&fecha2=$fecha2&id_partida=$id_partida&subprog=$id_subprog&id_periodo=$id_periodo&id_trim=$id_trim&id_area=$id_area";
//$url = "http://localhost/spdgm/index.php/api/ptop?id_periodo=$id_periodo&id_trim=$id_trim&id_subprog=$id_subprog&id_partida=$id_partida";
//$url = $baseUrl;
//$data = file_get_contents($url);
//$model= CJSON::decode($data);


$this->renderPartial('_rpt2', array(
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_subprog'=>$id_subprog,
			'id_partida'=>$id_partida,
			'id_bandera'=>$id_bandera,
			'id_area'=>$id_area,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2
			));

//echo $model;
/*$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			//'fecha1'=>$fecha1,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_subprog'=>$id_subprog
			));*/

	//}


	}else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar todos los  criterios de busqueda.
</div>
<?php

}

}
}
}