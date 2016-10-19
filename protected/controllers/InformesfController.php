<?php

class InformesfController extends Controller
{
	
	
public function actionIndex()
	{
		
		$criteria = new CDbCriteria();
		$criteria->order ="id desc";
        
		$model= CatEjercicio::model()->findAll($criteria);

		$this->render('index',array(
			'model'=>$model,
		));
	}

public function actionPartida()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{

 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];


$this->render('_params',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
 $fecha1 ='';
 $fecha2 ='';

$this->render('_params',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

}

}

public function actionIngext($id)
		{

$this->render('_ingext',array('id'=>$id));

}

public function actionIngext2()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{

 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];


$this->render('_ingext2',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
 $fecha1 ='';
 $fecha2 ='';

$this->render('_ingext2',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

}

}


public function actionCriterios(){


if(isset($_POST['fecha1'],$_POST['fecha2']))
{
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];
} else {
 $fecha1 ='';
 $fecha2 ='';
}

if(isset($_POST['id_partida']) && $_POST['id_partida'] !=""){
$id_partida =$_POST['id_partida'];
}else
{
$id_partida =0;
}

if(isset($_POST['id_subprog']) && $_POST['id_subprog'] !=""){
$id_subprog =$_POST['id_subprog'];
}else
{
$id_subprog =0;
}

if(isset($_POST['id_area']) && $_POST['id_area'] !=""){
$id_area =$_POST['id_area'];
}else
{
$id_area =0;
}

if(isset($_POST['id_bandera']) && $_POST['id_bandera'] !=""){
$id_bandera =$_POST['id_bandera'];
}else
{
$id_bandera =0;
}

if(isset($_POST['proveedor']) && $_POST['proveedor'] !=""){
$proveedor =$_POST['proveedor'];
}else
{
$proveedor ="";
}

if(isset($_POST['observa']) && $_POST['observa'] !=""){
$observa =$_POST['observa'];
}else
{
$observa ="";
}



$sql = "UPDATE  criterios set subprog='$id_subprog', partida='$id_partida' , area='$id_area', bandera='$id_bandera', proveedor='$proveedor', observa='$observa'  where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();


//echo $sql;

$this->render('_all',array('fecha1'=>$fecha1,
				           'fecha2'=>$fecha2
		));


//echo $cmd->getText();

//$this->render('_all');
/*if(isset($_POST['fecha1'],$_POST['fecha2']))
{*/
/*$this->render('_all',array('post'=>$_POST
		));
/*} else {
 $fecha1 ='';
 $fecha2 ='';w

$this->render('_all',array('fecha1'=>$fecha1,
				        	'fecha2'=>$fecha2
		));

}*/



}

public function actionCriteriosPdf(){


if(isset($_POST['fecha1'],$_POST['fecha2']))
{
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];
} else {
 $fecha1 ='';
 $fecha2 ='';
}

if(isset($_POST['id_partida']) && $_POST['id_partida'] !=""){
$id_partida =$_POST['id_partida'];
}else
{
$id_partida =0;
}

if(isset($_POST['id_subprog']) && $_POST['id_subprog'] !=""){
$id_subprog =$_POST['id_subprog'];
}else
{
$id_subprog =0;
}

if(isset($_POST['id_area']) && $_POST['id_area'] !=""){
$id_area =$_POST['id_area'];
}else
{
$id_area =0;
}

if(isset($_POST['id_bandera']) && $_POST['id_bandera'] !=""){
$id_bandera =$_POST['id_bandera'];
}else
{
$id_bandera =0;
}

if(isset($_POST['proveedor']) && $_POST['proveedor'] !=""){
$proveedor =$_POST['proveedor'];
}else
{
$proveedor ="";
}

if(isset($_POST['observa']) && $_POST['observa'] !=""){
$observa =$_POST['observa'];
}else
{
$observa ="";
}



$sql = "UPDATE  criterios set subprog='$id_subprog', partida='$id_partida' , area='$id_area', bandera='$id_bandera', proveedor='$proveedor', observa='$observa'  where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();


//echo $sql;

$this->render('_all',array('fecha1'=>$fecha1,
				           'fecha2'=>$fecha2
		));


//echo $cmd->getText();

//$this->render('_all');
/*if(isset($_POST['fecha1'],$_POST['fecha2']))
{*/
/*$this->render('_all',array('post'=>$_POST
		));
/*} else {
 $fecha1 ='';
 $fecha2 ='';w

$this->render('_all',array('fecha1'=>$fecha1,
				        	'fecha2'=>$fecha2
		));

}*/



}



public function actionPdf()
		{

if(isset($_POST['fecha1'],$_POST['fecha2'])){
 
 		




$model =json_decode($_POST['json']);
$fecha1 =$_POST['fecha1'];
$fecha2 =$_POST['fecha2'];
//print_r($model);
//die();











$baseUrl = Yii::app()->theme->baseUrl;

$url = "http://localhost/spdgm/index.php/api/json?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
  
$title ="<center><h2>Del $fecha1 al $fecha2 </h2></center>";
//$title ="<h2>$data_json</h2>";

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
</style>';

$html .= "
<div class='span10'>
<table class='table table-striped  table-hover'>
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
	</tr>";

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
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
						$presupuestop = number_format($model[$indice][$indice2][$indice3]['presupuesto'],2);
						$enet = number_format($model[$indice][$indice2][$indice3]['totalene'],2);
						$febt = number_format($model[$indice][$indice2][$indice3]['totalfeb'],2);
						$mart = number_format($model[$indice][$indice2][$indice3]['totalmar'],2);
						$abrt = number_format($model[$indice][$indice2][$indice3]['totalabr'],2);
						$mayt = number_format($model[$indice][$indice2][$indice3]['totalmay'],2);
						$junt = number_format($model[$indice][$indice2][$indice3]['totaljun'],2);
						$jult = number_format($model[$indice][$indice2][$indice3]['totaljul'],2);
						$agot = number_format($model[$indice][$indice2][$indice3]['totalago'],2);
						$sept = number_format($model[$indice][$indice2][$indice3]['totalsep'],2);
						$octt = number_format($model[$indice][$indice2][$indice3]['totaloct'],2);
						$novt = number_format($model[$indice][$indice2][$indice3]['totalnov'],2);
						$dict = number_format($model[$indice][$indice2][$indice3]['totaldic'],2);
						$totalejercido = number_format($model[$indice][$indice2][$indice3]['totalejercido'],2);
						$disponible = number_format($model[$indice][$indice2][$indice3]['disponible'],2);


				if ($enet==0) { $enet =''; }
			  	if ($febt==0) { $febt =''; }
			  	if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	if ($jult==0) { $jult =''; }
			  	if ($agot==0) { $agot =''; }
			  	if ($sept==0) { $sept =''; }
			  	if ($octt==0) { $octt =''; }
			  	if ($novt==0) { $novt =''; }
			  	if ($dict==0) { $dict =''; }
			  	if ($presupuestop==0) { $presupuestop =''; } 
			  	if ($totalejercido==0) { $totalejercido =''; } 
			  	if ($disponible==0) { $disponible =''; }
						}
				}
							$html .="<tr>
	 		<td><center>$indice3</center></td>
	 		
	 		<td  align=\"right\">$enet</td>
	 		<td  align=\"right\">$febt</td>
	 		<td  align=\"right\">$mart</td>
	 		<td  align=\"right\">$abrt</td>
	 		<td  align=\"right\">$mayt</td>
	 		<td  align=\"right\">$junt</td>
	 		<td  align=\"right\">$jult</td>
	 		<td  align=\"right\">$agot</td>
	 		<td  align=\"right\">$sept</td>
	 		<td  align=\"right\">$octt</td>
	 		<td  align=\"right\">$novt</td>
	 		<td  align=\"right\">$dict</td>
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
				$jult = number_format($model[$indice]['jult'],2);
				$agot = number_format($model[$indice]['agot'],2);
				$sept = number_format($model[$indice]['sept'],2);
				$octt = number_format($model[$indice]['octt'],2);
				$novt = number_format($model[$indice]['novt'],2);
				$dict = number_format($model[$indice]['dict'],2);
				$prept = number_format($model[$indice]['presupuestot'],2);
				$ejercidot = number_format($model[$indice]['ejercidot'],2);
				$disponiblet = number_format($model[$indice]['disponiblet'],2);


				if ($enet==0) { $enet =''; }
			  	if ($febt==0) { $febt =''; }
			  	if ($mart==0) { $mart =''; }
			  	if ($abrt==0) { $abrt =''; }
			  	if ($mayt==0) { $mayt =''; }
			  	if ($junt==0) { $junt =''; }
			  	if ($jult==0) { $jult =''; }
			  	if ($agot==0) { $agot =''; }
			  	if ($sept==0) { $sept =''; }
			  	if ($octt==0) { $octt =''; }
			  	if ($novt==0) { $novt =''; }
			  	if ($dict==0) { $dict =''; }
			  	if ($prept==0) { $prept =''; } 
			  	if ($ejercidot==0) { $ejercidot =''; } 
			  	if ($disponiblet==0) { $disponiblet =''; } 
	$html .="<tr>
	 		<td  align=\"right\"><b>Total:<b></td>
	 		<td  align=\"right\"><b>$enet<b></td>
	 		<td  align=\"right\"><b>$febt<b></td>
	 		<td  align=\"right\"><b>$mart<b></td>
	 		<td  align=\"right\"><b>$abrt<b></td>
	 		<td  align=\"right\"><b>$mayt<b></td>
	 		<td  align=\"right\"><b>$junt<b></td>
	 		<td  align=\"right\"><b>$jult<b></td>
	 		<td  align=\"right\"><b>$agot<b></td>
	 		<td  align=\"right\"><b>$sept<b></td>
	 		<td  align=\"right\"><b>$octt<b></td>
	 		<td  align=\"right\"><b>$novt<b></td>
	 		<td  align=\"right\"><b>$dict<b></td>
	 		<td  align=\"right\"><b>$prept<b></td>
	 		<td  align=\"right\"><b>$ejercidot<b></td>
	 		<td  align=\"right\"><b>$disponiblet<b></td>

	 	</tr>";
}

$html .="</table></div>";

//$html = $_GET['base'];
$mPDF1=Yii::app()->ePdf->mPDF();
$mPDF1->AddPage('L');
$mPDF1->WriteHTML($title);
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
public function actionInformePdf(){

  ob_end_clean();
        Yii::import('application.extensions.fpdf.*');
        require('class.fpdf_table.php');

     $pdf = new pdf_usage('L','mm','Legal');		
	$pdf->Open();
	//$pdf->SetAutoPageBreak(true, 85);
        //$pdf->SetMargins(5, 0, 0);
	$pdf->SetAutoPageBreak(TRUE, 15);
    $pdf->AddPage();
	$pdf->AliasNbPages(); 
		
//	$pdf->SetStyle("s1","arial","",8,"118,0,3");
	//$pdf->SetStyle("s2","arial","",6,"0,49,159");
	//default text color
	//$pdf->SetTextColor(118, 0, 3);


		$table_default_header_type = array(
				'WIDTH' => 6,				    	//cell width
				'T_COLOR' => array(255,255,240),	//text color
				'T_SIZE' => 7,						//font size
				'T_FONT' => 'Arial',				//font family
				'T_ALIGN' => 'C',					//horizontal alignment, possible values: LRC (left, right, center)
				'V_ALIGN' => 'M',					//vertical alignment, possible values: TMB(top, middle, bottom)
				'T_TYPE' => 'B',					//font type
				'LN_SIZE' => 4,						//line size for one row
		     	'BG_COLOR' => array(66, 66, 66),	//background color
				'BRD_COLOR' => array(255,255,255),		//border color
				'BRD_SIZE' => 0,					//border size
				'BRD_TYPE' => '0',					//border type, can be: 0, 1 or a combination of: "LRTB"
				'TEXT' => 'hi',						//text
						);

		$table_default_data_type = array(
				'T_COLOR' => array(0,0,0),			//text color
				'T_SIZE' => 6,						//font size
				'T_FONT' => 'Arial',				//font family
				'T_ALIGN' => 'C',					//horizontal alignment, possible values: LRC (left, right, center)
				'V_ALIGN' => 'M',					//vertical alignment, possible values: TMB(top, middle, bottom)
				'T_TYPE' => '',						//font type
				'LN_SIZE' => 4,						//line size for one row
				'BG_COLOR' => array(255,255,255),	//background color
				'BRD_COLOR' => array(255,255,255),		//border color
				'BRD_SIZE' => 0,					//border size
				'BRD_TYPE' => '0',					//border type, can be: 0, 1 or a combination of: "LRTB"
						);

		$table_default_table_type = array(
				'TB_ALIGN' => 'L',					//table align on page
				'L_MARGIN' => 0,					//space to the left margin
				'BRD_COLOR' => array(0,0,0),		//border color
				'BRD_SIZE' => 0,				//border size
						);

	$columns = 16; //number of Columns


  //Initialize the table class
  $pdf->tbInitialize($columns, true, true);

  //set the Table Type
  $pdf->tbSetTableType($table_default_table_type);


  $aSimpleHeader = array();

  //Table Header

    $aSimpleHeader[0] = $table_default_header_type;
    $aSimpleHeader[0]['TEXT'] = "Partida";
    $aSimpleHeader[0]['WIDTH'] = 11;

    $aSimpleHeader[1] = $table_default_header_type;
    $aSimpleHeader[1]['TEXT'] = "Ene";
    $aSimpleHeader[1]['WIDTH'] = 20;

    $aSimpleHeader[2] = $table_default_header_type;
    $aSimpleHeader[2]['TEXT'] = "Feb";
    $aSimpleHeader[2]['WIDTH'] = 20;

    $aSimpleHeader[3] = $table_default_header_type;
    $aSimpleHeader[3]['TEXT'] = "Mar";
    $aSimpleHeader[3]['WIDTH'] = 20;

    $aSimpleHeader[4] = $table_default_header_type;
    $aSimpleHeader[4]['TEXT'] = "Abr";
    $aSimpleHeader[4]['WIDTH'] = 20;

    $aSimpleHeader[5] = $table_default_header_type;
    $aSimpleHeader[5]['TEXT'] = "May";
    $aSimpleHeader[5]['WIDTH'] = 20;

    $aSimpleHeader[6] = $table_default_header_type;
    $aSimpleHeader[6]['TEXT'] = "Jun";
    $aSimpleHeader[6]['WIDTH'] = 20;

    $aSimpleHeader[7] = $table_default_header_type;
    $aSimpleHeader[7]['TEXT'] = "Jul";
    $aSimpleHeader[7]['WIDTH'] = 20;

    $aSimpleHeader[8] = $table_default_header_type;
    $aSimpleHeader[8]['TEXT'] = "Ago";
    $aSimpleHeader[8]['WIDTH'] = 20;

    $aSimpleHeader[9] = $table_default_header_type;
    $aSimpleHeader[9]['TEXT'] = "Sep";
    $aSimpleHeader[9]['WIDTH'] = 20;

    $aSimpleHeader[10] = $table_default_header_type;
    $aSimpleHeader[10]['TEXT'] = "Oct";
    $aSimpleHeader[10]['WIDTH'] = 20;

    $aSimpleHeader[11] = $table_default_header_type;
    $aSimpleHeader[11]['TEXT'] = "Nov";
    $aSimpleHeader[11]['WIDTH'] = 20;

    $aSimpleHeader[12] = $table_default_header_type;
    $aSimpleHeader[12]['TEXT'] = "Dic";
    $aSimpleHeader[12]['WIDTH'] = 20;


    $aSimpleHeader[13] = $table_default_header_type;
    $aSimpleHeader[13]['TEXT'] = "Presupuesto";
    $aSimpleHeader[13]['WIDTH'] = 20;

    $aSimpleHeader[14] = $table_default_header_type;
    $aSimpleHeader[14]['TEXT'] = "Ejercido";
    $aSimpleHeader[14]['WIDTH'] = 22;

    $aSimpleHeader[15] = $table_default_header_type;
    $aSimpleHeader[15]['TEXT'] = "Disponible";
    $aSimpleHeader[15]['WIDTH'] = 25;







  //set the Table Header
  $pdf->tbSetHeaderType($aSimpleHeader);

  //Draw the Header
  $pdf->tbDrawHeader();

	$aDataType = Array();
	for ($i=0; $i<$columns; $i++) $aDataType[$i] = $table_default_data_type;

	$pdf->tbSetDataType($aDataType);


  

      $data = Array();
		$data[0]['TEXT'] = "Hola";
		$data[1]['TEXT'] = "Hola";
		$data[2]['TEXT'] = "Hola";
		$data[3]['TEXT'] = "Hola";
		$data[4]['TEXT'] = "Hola";
		$data[5]['TEXT'] = "Hola";
		$data[6]['TEXT'] = "Hola";
		$data[7]['TEXT'] = "Hola";
		$data[8]['TEXT'] = "Hola";
		$data[9]['TEXT'] = "Hola";
		$data[10]['TEXT'] = "Hola";
		$data[11]['TEXT'] = "Hola";
		$data[12]['TEXT'] = "Hola";
		$data[13]['TEXT'] = "Hola";
		$data[14]['TEXT'] = "Hola";
		$data[15]['TEXT'] = "Hola";
		$data[16]['TEXT'] = "Hola";
		
		
		

          $pdf->tbDrawData($data);

          //$pdf->tbOuputData();
$pdf->Line(52, 85.5, 120, 85.5);

        $data = Array();
		$data[0]['TEXT'] = "";
		$data[1]['TEXT'] = "Hola2";
		$data[2]['TEXT'] = "Hola2";
		$data[3]['TEXT'] = "Hola2";
		$data[4]['TEXT'] = "Hola2";
		$data[5]['TEXT'] = "Hola2";
		$data[6]['TEXT'] = "Hola2";
		$data[7]['TEXT'] = "Hola2";
		$data[8]['TEXT'] = "Hola2";
		$data[9]['TEXT'] = "Hola2";
		$data[10]['TEXT'] = "Hola2";
		$data[11]['TEXT'] = "Hola2";
		$data[12]['TEXT'] = "Hola2";
		$data[13]['TEXT'] = "Hola2";
		$data[14]['TEXT'] = "Hola2";
		$data[15]['TEXT'] = "Hola2";
		$data[16]['TEXT'] = "Hola2";
		
		
		

          $pdf->tbDrawData($data);

          $pdf->tbOuputData();

  //draw the Table Border
  $pdf->tbDrawBorder();

	$pdf->Output();

}
		
public function actionReqTest03() {
// echo CHtml::encode(print_r($_POST, true));
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
$id_periodo = $_POST['id_periodo'];
$id_trim = $_POST['id_trim'];
if(isset($fecha1,$fecha2,$id_periodo,$id_trim)){

//echo $fecha1;
//echo $fecha2;


if (($fecha1 != '') && ($fecha1 != '') && ($id_periodo != '') && ($id_trim != '')) {


$titulo = "Informe por Presupuesto del $fecha1 al $fecha2";
//$titulo = "Informe por Presupuesto 2014";

$url = "http://localhost/spdgm/index.php/api/pto?fecha1=$fecha1&fecha2=$fecha2&id_periodo=$id_periodo&id_trim=$id_trim";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim));

	//}


	}else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php

}

	}
}

public function actionReqTestPdf() {

$title ="hola mundo";
$html = "hola";

$mPDF1=Yii::app()->ePdf->mPDF();
$mPDF1->AddPage('L');
$mPDF1->WriteHTML($title);
$mPDF1->WriteHTML($html);
$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReporteGeneral-". date("d/m/y H:i:s").".pdf";
$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);

}



public function actionReqTest04() {
// echo CHtml::encode(print_r($_POST, true));
//$fecha1 = $_POST['fecha1'];
//$fecha2 = $_POST['fecha2'];
$id_subprog = $_POST['id_subprog'];
$id_partida = $_POST['id_partida'];
$id_periodo = $_POST['id_periodo'];
$id_trim = $_POST['id_trim'];
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
if(isset($id_subprog,$id_partida,$id_periodo,$id_trim,$fecha1,$fecha2)){

//echo $fecha1;
//echo $fecha2;


if (($id_subprog != '') && ($id_partida != '') && ($id_periodo != '') && ($id_trim != '') && ($fecha1 != '')  && ($fecha2 != '') ) {


$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];

$titulo = "Informe Presupuesto por Partida $anio del $fecha1 al $fecha2";
//$titulo = "Informe por Presupuesto 2014";

$url = "http://localhost/spdgm/index.php/api/ptop2?id_periodo=$id_periodo&id_trim=$id_trim&id_subprog=$id_subprog&id_partida=$id_partida&fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rptp', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_subprog'=>$id_subprog,
			'id_partida'=>$id_partida));

	//}


	}else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php

}

	}
}

}