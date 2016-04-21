<?php

class Informesf2Controller extends Controller
{
	
	
public function actionIndex()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{

 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];


$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
 $fecha1 ='';
 $fecha2 ='';

$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

}

	}


public function actionPdf()
		{

		if(isset($_POST['json'])){
 
 		
$model =json_decode($_POST['json']);
//print_r($model);
//die();
		

$baseUrl = Yii::app()->theme->baseUrl;
  

$html = '
<style>
table {
    background-color: rgba(0, 0, 0, 0);
    border-collapse: collapse;
    border-spacing: 0;
    max-width: 100%;
}
.table {
    margin-bottom: 20px;
    width: 100%;
}
.table th, .table td {
    border-top: 1px solid #DDDDDD;
    line-height: 10px;
    padding: 6px;
    vertical-align: top;
}
.table th {
    font-weight: bold;
}
.table thead th {
    vertical-align: bottom;
}
.table caption + thead tr:first-child th, .table caption + thead tr:first-child td, .table colgroup + thead tr:first-child th, .table colgroup + thead tr:first-child td, .table thead:first-child tr:first-child th, .table thead:first-child tr:first-child td {
    border-top: 0 none;
}
.table tbody + tbody {
    border-top: 2px solid #DDDDDD;
}
.table-condensed th, .table-condensed td {
    padding: 4px 5px;
}
.table-bordered {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-collapse: separate;
    border-color: #DDDDDD #DDDDDD #DDDDDD -moz-use-text-color;
    border-image: none;
    border-radius: 4px;
    border-style: solid solid solid none;
    border-width: 1px 1px 1px 0;
}
.table-bordered th, .table-bordered td {
    border-left: 1px solid #DDDDDD;
}
.table-bordered caption + thead tr:first-child th, .table-bordered caption + tbody tr:first-child th, .table-bordered caption + tbody tr:first-child td, .table-bordered colgroup + thead tr:first-child th, .table-bordered colgroup + tbody tr:first-child th, .table-bordered colgroup + tbody tr:first-child td, .table-bordered thead:first-child tr:first-child th, .table-bordered tbody:first-child tr:first-child th, .table-bordered tbody:first-child tr:first-child td {
    border-top: 0 none;
}
.table-bordered thead:first-child tr:first-child th:first-child, .table-bordered tbody:first-child tr:first-child td:first-child {
    border-top-left-radius: 4px;
}
.table-bordered thead:first-child tr:first-child th:last-child, .table-bordered tbody:first-child tr:first-child td:last-child {
    border-top-right-radius: 4px;
}
.table-bordered thead:last-child tr:last-child th:first-child, .table-bordered tbody:last-child tr:last-child td:first-child, .table-bordered tfoot:last-child tr:last-child td:first-child {
    border-radius: 0 0 0 4px;
}
.table-bordered thead:last-child tr:last-child th:last-child, .table-bordered tbody:last-child tr:last-child td:last-child, .table-bordered tfoot:last-child tr:last-child td:last-child {
    border-bottom-right-radius: 4px;
}
.table-bordered caption + thead tr:first-child th:first-child, .table-bordered caption + tbody tr:first-child td:first-child, .table-bordered colgroup + thead tr:first-child th:first-child, .table-bordered colgroup + tbody tr:first-child td:first-child {
    border-top-left-radius: 4px;
}
.table-bordered caption + thead tr:first-child th:last-child, .table-bordered caption + tbody tr:first-child td:last-child, .table-bordered colgroup + thead tr:first-child th:last-child, .table-bordered colgroup + tbody tr:first-child td:last-child {
    border-top-right-radius: 4px;
}
.table-striped tbody tr:nth-child(2n+1) td, .table-striped tbody tr:nth-child(2n+1) th {
    background-color: #F9F9F9;
}
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
    background-color: #D2B48C;
}
table [class*="span"], .row-fluid table [class*="span"] {
    display: table-cell;
    float: none;
    margin-left: 0;
}
.table .span1 {
    float: none;
    margin-left: 0;
    width: 44px;
}
.table .span2 {
    float: none;
    margin-left: 0;
    width: 124px;
}
.table .span3 {
    float: none;
    margin-left: 0;
    width: 204px;
}
.table .span4 {
    float: none;
    margin-left: 0;
    width: 284px;
}
.table .span5 {
    float: none;
    margin-left: 0;
    width: 364px;
}
.table .span6 {
    float: none;
    margin-left: 0;
    width: 444px;
}
.table .span7 {
    float: none;
    margin-left: 0;
    width: 524px;
}
.table .span8 {
    float: none;
    margin-left: 0;
    width: 604px;
}
.table .span9 {
    float: none;
    margin-left: 0;
    width: 684px;
}
.table .span10 {
    float: none;
    margin-left: 0;
    width: 764px;
}
.table .span11 {
    float: none;
    margin-left: 0;
    width: 844px;
}
.table .span12 {
    float: none;
    margin-left: 0;
    width: 924px;
}
.table .span13 {
    float: none;
    margin-left: 0;
    width: 1004px;
}
.table .span14 {
    float: none;
    margin-left: 0;
    width: 1084px;
}
.table .span15 {
    float: none;
    margin-left: 0;
    width: 1164px;
}
.table .span16 {
    float: none;
    margin-left: 0;
    width: 1244px;
}
.table .span17 {
    float: none;
    margin-left: 0;
    width: 1324px;
}
.table .span18 {
    float: none;
    margin-left: 0;
    width: 1404px;
}
.table .span19 {
    float: none;
    margin-left: 0;
    width: 1484px;
}
.table .span20 {
    float: none;
    margin-left: 0;
    width: 1564px;
}
.table .span21 {
    float: none;
    margin-left: 0;
    width: 1644px;
}
.table .span22 {
    float: none;
    margin-left: 0;
    width: 1724px;
}
.table .span23 {
    float: none;
    margin-left: 0;
    width: 1804px;
}
.table .span24 {
    float: none;
    margin-left: 0;
    width: 1884px;
}
.table tbody tr.success td {
    background-color: #DFF0D8;
}
.table tbody tr.error td {
    background-color: #F2DEDE;
}
.table tbody tr.warning td {
    background-color: #FCF8E3;
}
.table tbody tr.info td {
    background-color: #D9EDF7;
}
.table-hover tbody tr.success:hover td {
    background-color: #D0E9C6;
}
.table-hover tbody tr.error:hover td {
    background-color: #EBCCCC;
}
.table-hover tbody tr.warning:hover td {
    background-color: #FAF2CC;
}
.table-hover tbody tr.info:hover td {
    background-color: #C4E3F3;
}
</style>
<table class="table table-striped  table-hover">
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
		<th>Presupuesto</th>
		<th>Ejercido</th>
		<th>Disponible</th>
	</tr>';

	foreach ($model as $indice => $valor) {
  	$html2 = 'El indice1 '. $indice . 'tiene el valor: ';
	}
 /*foreach ($model as $indice => $valor) {
  	//$html .= "El indice1 $indice tiene el valor: $valor<br>";
  	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			



   			if (is_array($valor2)){
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

					$html2 ="<tr>
	 	
	 		
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
	 		

	 	</tr>";

	 			if (is_array($valor3)){
						foreach ($valor3 as $indice4 => $valor4) {
						//	echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
							if (is_array($valor4)){
								foreach ($valor4 as $indice5 => $valor5) {
									//	echo ("El indice5 $indice5 tiene el valor: $valor5<br>");


	$folio = $model[$indice][$indice2][$indice3][$indice4][$indice5]['folio'];
	$importe =$model[$indice][$indice2][$indice3][$indice4][$indice5]['importe'];
	$area =$model[$indice][$indice2][$indice3][$indice4][$indice5]['area'];
	$concepto =$model[$indice][$indice2][$indice3][$indice4][$indice5]['concepto'];
	$fecha_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['fecha_contrarecibo'];
	$no_contrarecibo =$model[$indice][$indice2][$indice3][$indice4][$indice5]['no_contrarecibo'];
	$detalle =$model[$indice][$indice2][$indice3][$indice4][$indice5]['detalle'];
	$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];
	//$proveedor =$model[$indice][$indice2][$indice3][$indice4][$indice5]['proveedor'];


	
	

	$html .="<tr>
	 	
	 		
	 		<td  align=\"center\"></td>
	 		<td  align=\"center\">$indice5</td>
	 		<td  align=\"center\">$folio</td>
	 		<td  align=\"center\">$area</td>
	 		<td  align=\"center\">$proveedor</td>
	 		<td  align=\"center\">$importe</td>
	 		<td  align=\"center\">$concepto</td>
	 		<td  align=\"center\">$fecha_contrarecibo</td>
	 		<td  align=\"center\">$no_contrarecibo</td>
	 		<td  align=\"center\">$detalle</td>
	 		

	 	</tr>";


								}
							}




					

						}
		$html .="<tr>
	 	
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Total<b></td>
	 		<td  align=\"right\"><b>$valor4<b></td>
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
	 		<td  align=\"right\"><b>Suma Total</b></td>
	 		<td  align=\"right\"><b>$sumatotal</b></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		

	 	</tr>";
   	}

 }*/


$html .='</table>';


//$html = $_GET['base'];
$mPDF1=Yii::app()->ePdf->mPDF();
$mPDF1->AddPage('L');
$mPDF1->WriteHTML($html);
$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGeneral-". date("d/m/y H:i:s").".pdf";
$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);
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
}