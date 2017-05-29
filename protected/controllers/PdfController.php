<?php

class PdfController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionPdfCriterios()
		{
/*
'id_periodo'=>$id_periodo,
												'id_trim'=>$id_trim,
												'id_subprog'=>$id_subprog,
												'id_partida'=>$id_partida,
												'id_area'=>$id_area,
												'fecha1'=>$fecha1,
												'fecha2'=>$fecha2*/
//$anio=$_GET['anio'];
$id_periodo=$_GET['id_periodo'];
$id_trim=$_GET['id_trim'];
$id_subprog=$_GET['id_subprog'];
$id_partida=$_GET['id_partida'];
$id_area=$_GET['id_area'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];


$titulo = "Nuevo reporte";

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
    	
    	font-size: 12px;      padding: 20px 65px 65px 65px;     width: 800px; text-align: center;
        border-collapse: collapse;
        margin:0;

    }
    tr:nth-child(even) {background-color: #f2f2f2}

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
    padding: 0;
    
   text-align: center; 
    }
    td {
        color: #000000;
        font-size: 11px;
    	padding:2px 4px 0;
    }
    h1 {
        color: #000000;
        text-align: center;
        font-size: 12px;
    	padding: 0;
    	margin:0;
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


th {     font-size: 14px;     font-weight: normal;     padding: 8px;    ;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 2px 4px;         border-bottom: 1px solid #fff;
    color: #000000;    border-top: 1px solid transparent; }


    </style>';


   $enet =0;
$febt =0;
$mart =0;
$abrt =0;
$mayt =0;
$junt =0;
$jult =0;
$agot =0;
$sept =0;
$octt =0;
$novt =0;
$dict =0;

$gastadot = 0;
$disponiblef = 0;
$presupuesto_final = 0;

/*echo 'Perido:'.$id_periodo . '<bR>';
echo 'Trimestre:'.$id_trim . '<bR>';
echo 'Subprog:'.$id_subprog . '<bR>';
echo 'Partida:'.$id_partida . '<bR>';
echo 'area:'.$id_area . '<bR>';
echo 'fecha1:'.$fecha1 . '<bR>';
echo 'fecha2:'.$fecha2 . '<bR>';


*/
//echo '<hr>';
$filtro ="";
$tit ="";
//echo $fecha1;
$filtro .="id_periodo = $id_periodo and bandera=1 and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtro .="subprog =$id_subprog AND ";
	$tit ="Subprogramas:$id_subprog ";
}

if($id_partida !=0){
	$filtro .="partida =$id_partida AND ";
	$tit .="partida:$id_partida ";
}

if($id_area !=0){
	$filtro .="area =$id_area AND ";
	$tit .="area:$id_area ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}

/*if($subprog !=0){
	$filtro2 .="and subprog=subprog";
}else{
	$filtro2="";
}*/

///	REPORTE POR AREAS

if($id_area !=0){

	//echo "Mostrar información por area";

	 $q = "SELECT DISTINCT partida  FROM 
  		     base_cap ".$filtro2."
		     order by partida";

	$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

	$resulArea = $cmd->query();

	$arreglo = array();
	foreach ($resulArea as $rowarea) {
      array_push($arreglo, $rowarea['partida']);
	}

	$filtroint ="";
	$tit ="";
//echo $fecha1;
$filtroint .="id_periodo = $id_periodo and id_trimestre=$id_trim  and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";

if($id_subprog !=0){
	$filtroint .="subprog =$id_subprog AND ";
	$tit ="Subprogramas:$id_subprog ";

}


if($id_area !=0){
	$filtroint .="area =$id_area AND ";
	$tit .="area:$id_area ";

}


if( !empty( $filtroint ) ){
		$filtrof= " where ".substr( $filtroint, 0,-4);
	}






	 $q2 = "SELECT DISTINCT partida  FROM 
  		     presupuesto ".$filtrof."
		     order by partida";

	$cmd2 = Yii::app()->db->createCommand($q2);
//$cmd->getText();

	$resulAreaPres = $cmd2->query();

	foreach ($resulAreaPres as $rowareap) {
      array_push($arreglo, $rowareap['partida']);
	}


	
	//$arreglof =asort($arreglo,1);

$arreglof = array_unique($arreglo);

sort($arreglof);

$nomArea = Utilities::infoArea($id_area);

//$titulo ="Informe General $tit del $fecha1 al $fecha2";

$titulo ="<h1 aling='center'>Informe General Presupuestal $nomArea del $fecha1 al $fecha2 </h1>";
$html .='

 <table cellspacing="0" style="width: 100%; text-align: center; padding:0;">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 15px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

    <h1>'.$titulo.'</h1>
';

$html .="

<table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
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
	</tr>
		"; 
 
foreach($arreglof as $numero)
    {

$filtroint ="";
//echo $fecha1;
$filtroint .="id_periodo = $id_periodo and id_trimestre=$id_trim and partida=$numero and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";

if($id_subprog !=0){
	$filtroint .="subprog =$id_subprog AND ";
}


if($id_area !=0){
	$filtroint .="area =$id_area AND ";
}


if( !empty( $filtroint ) ){
		$filtrof= " where ".substr( $filtroint, 0,-4);
	}

$sql = "SELECT SUM(presupuesto) as suma from presupuesto ".$filtrof." ";
// "<br>";
$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();


$presupuestof = $presupuesto['suma'];






////*************************SACAR MESES DEL PRESUPUESTO *************************************

$filtroa ="";

//echo $fecha1;
$filtroa .="id_periodo = $id_periodo and bandera=1 and area<>12 and partida<>211 and partida<>331  and partida<>612  AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtroa .="subprog =$id_subprog AND ";
}

if($numero !=0){
	$filtroa .="partida =$numero AND ";
}

if($id_area !=0){
	$filtroa .="area =$id_area AND ";
}


if( !empty( $filtroa ) ){
		$filtrof2a= " where ".substr( $filtroa, 0,-4);
	}


 $res = "SELECT * FROM base_cap ".$filtrof2a." order by partida";
  		  //   base_cap where id_periodo = $id_periodo and bandera=1 and partida=$row[partida]  and fecha_ingreso BETWEEN '$fecha1' and '$fecha2' order by fecha_ingreso";


$cmd = Yii::app()->db->createCommand($res);

$resultado2a= $cmd->query();




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

foreach ($resultado2a as $row2) {

		$fecha =$row2["fecha_ingreso"]; 
		$date = strtotime("$fecha");


 if(date("m",$date) =='1'){
$ene = $ene + $row2['importe'];
 }

  if(date("m",$date) =='2'){
$feb = $feb + $row2['importe'];
 }

  if(date("m",$date) =='3'){
$mar = $mar + $row2['importe'];
 }
   if(date("m",$date) =='4'){
$abr = $abr + $row2['importe'];
 }

  if(date("m",$date) =='5'){
$may = $may + $row2['importe'];
 }

  if(date("m",$date) =='6'){
$jun = $jun + $row2['importe'];
 }

 if(date("m",$date) =='7'){
$jul = $jul + $row2['importe'];
 }

 if(date("m",$date) =='8'){
$ago = $ago + $row2['importe'];
 }

 if(date("m",$date) =='9'){
$sep = $sep + $row2['importe'];
 }

 if(date("m",$date) =='10'){
$oct = $oct + $row2['importe'];
 }

 if(date("m",$date) =='11'){
$nov = $nov + $row2['importe'];
 }

 if(date("m",$date) =='12'){
$dic = $dic + $row2['importe'];
 }


}






$enep = number_format($ene,2);
$febp = number_format($feb,2);
$marp = number_format($mar,2);
$abrp = number_format($abr,2);
$mayp = number_format($may,2);
$junp = number_format($jun,2);
$julp = number_format($jul,2);
$agop = number_format($ago,2);
$sepp = number_format($sep,2);
$octp = number_format($oct,2);
$novp = number_format($nov,2);
$dicp = number_format($dic,2);


				if ($enep==0) { $enep =''; }
			  	if ($febp==0) { $febp =''; }
			  	if ($marp==0) { $marp =''; }
			  	if ($abrp==0) { $abrp =''; }
			  	if ($mayp==0) { $mayp =''; }
			  	if ($junp==0) { $junp =''; }
			  	if ($julp==0) { $julp =''; }
			  	if ($agop==0) { $agop =''; }
			  	if ($sepp==0) { $sepp =''; }
			  	if ($octp==0) { $octp =''; }
			  	if ($novp==0) { $novp =''; }
			  	if ($dicp==0) { $dicp =''; }

$ejercidot = $ene + $feb + $mar + $abr +  $may + $jun + $jul + $ago + $sep + $oct + $nov + $dic;

$disponiblet = $presupuestof - $ejercidot;

$muestradisponible = number_format($disponiblet,2);
$muestrapresupuesto = number_format($presupuestof,2);
$muestraejercido = number_format($ejercidot,2);


////fin de sacar mese por




     $html .="<tr>
	 		<td>$numero</td>
	 		<td  align=\"right\">$enep</td>
	 		<td  align=\"right\">$febp</td>
	 		<td  align=\"right\">$marp</td>
	 		<td  align=\"right\">$abrp</td>
	 		<td  align=\"right\">$mayp</td>
	 		<td  align=\"right\">$junp</td>
	 		<td  align=\"right\">$julp</td>
	 		<td  align=\"right\">$agop</td>
	 		<td  align=\"right\">$sepp</td>
	 		<td  align=\"right\">$octp</td>
	 		<td  align=\"right\">$novp</td>
	 		<td  align=\"right\">$dicp</td>
	 		<td  align=\"right\">$muestrapresupuesto</td>
	 		<td  align=\"right\">$muestraejercido </td>
	 		<td  align=\"right\">$muestradisponible</td>
	 	</tr>";
    

    $presupuesto_final = $presupuesto_final + $presupuesto['suma'] ;

$enet = $enet + $ene;
$febt = $febt + $feb;
$mart = $mart + $mar;
$abrt = $abrt + $abr;
$mayt = $mayt + $may;
$junt = $junt + $jun;
$jult = $jult + $jul;
$agot = $agot + $ago;
$sept = $sept + $sep;
$octt = $octt + $oct;
$novt = $novt + $nov;
$dict = $dict + $dic;

$gastadot = $gastadot + $ejercidot;
$disponiblef = $disponiblef + $disponiblet;

}



$presupuesto_final = number_format($presupuesto_final,2);

$enet =number_format($enet,2);
$febt =number_format($febt,2);
$mart =number_format($mart,2);
$abrt =number_format($abrt,2);
$mayt =number_format($mayt,2);
$junt =number_format($junt,2);
$jult =number_format($jult,2);
$agot =number_format($agot,2);
$sept =number_format($sept,2);
$octt =number_format($octt,2);
$novt =number_format($novt,2);
$dict =number_format($dict,2);


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

$gastadot =number_format($gastadot,2);
$disponiblef =number_format($disponiblef,2);

	$html .="<tr>
			
	 		<td  align=\"right\"><strong>Total</strong>:</td>
	 		<td  align=\"right\"><strong>$enet</strong></td>
	 		<td  align=\"right\"><strong>$febt</strong></td>
	 		<td  align=\"right\"><strong>$mart</strong></td>
	 		<td  align=\"right\"><strong>$abrt</strong></td>
	 		<td  align=\"right\"><strong>$mayt</strong></td>
	 		<td  align=\"right\"><strong>$junt</strong></td>
	 		<td  align=\"right\"><strong>$jult</strong></td>
	 		<td  align=\"right\"><strong>$agot</strong></td>
	 		<td  align=\"right\"><strong>$sept</strong></td>
	 		<td  align=\"right\"><strong>$octt</strong></td>
	 		<td  align=\"right\"><strong>$novt</strong></td>
	 		<td  align=\"right\"><strong>$dict</strong></td>
	 		<td  align=\"right\"><strong>$presupuesto_final</strong></td>
	 		<td  align=\"right\"><strong>$gastadot</strong></td>
	 		<td  align=\"right\"><strong>$disponiblef</strong></td>

	 	</tr>
		
		
	 	";



	//print_r($arreglo);

$html .="</table>";
} else {

$titulo ="Informe General Presupuestal $tit del $fecha1 al $fecha2";
$q = "SELECT DISTINCT partida  FROM 
  		     base_cap ".$filtro2."
		     order by partida";

$html .='

 <table cellspacing="0" style="width: 100%; text-align: center; padding:0;">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 15px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

    <h1>'.$titulo.'</h1>
';

$html .="<div align=center>
<table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
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
	</tr>
		";

$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

$resultado = $cmd->query();



foreach ($resultado as $row) {


$filtroint ="";
//echo $fecha1;
$filtroint .="id_periodo = $id_periodo and id_trimestre=$id_trim and partida=$row[partida] and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";

if($id_subprog !=0){
	$filtroint .="subprog =$id_subprog AND ";
}


if($id_area !=0){
	$filtroint .="area =$id_area AND ";
}


if( !empty( $filtroint ) ){
		$filtrof= " where ".substr( $filtroint, 0,-4);
	}


$sql = "SELECT SUM(presupuesto) as suma from presupuesto ".$filtrof." ";
// "<br>";
$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();


$presupuestof = $presupuesto['suma'];




$filtroint2 ="";
//echo $fecha1;
$filtroint2 .="bandera=1 and id_periodo = $id_periodo  and area<>12 and partida=$row[partida] and partida<>211 and partida<>331 and partida<>612 and (fecha_ingreso BETWEEN '$fecha1' and '$fecha2') AND ";

if($id_subprog !=0){
	$filtroint2 .="subprog =$id_subprog AND ";
}


if($id_area !=0){
	$filtroint2 .="area =$id_area AND ";
}


if( !empty( $filtroint2 ) ){
		$filtrof2= " where ".substr( $filtroint2, 0,-4);
	}

$res = "SELECT * FROM base_cap ".$filtrof2." order by partida";
  		  //   base_cap where id_periodo = $id_periodo and bandera=1 and partida=$row[partida]  and fecha_ingreso BETWEEN '$fecha1' and '$fecha2' order by fecha_ingreso";


$cmd = Yii::app()->db->createCommand($res);

$resultado2= $cmd->query();




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

foreach ($resultado2 as $row2) {

		$fecha =$row2["fecha_ingreso"]; 
		$date = strtotime("$fecha");


 if(date("m",$date) =='1'){
$ene = $ene + $row2['importe'];
 }

  if(date("m",$date) =='2'){
$feb = $feb + $row2['importe'];
 }

  if(date("m",$date) =='3'){
$mar = $mar + $row2['importe'];
 }
   if(date("m",$date) =='4'){
$abr = $abr + $row2['importe'];
 }

  if(date("m",$date) =='5'){
$may = $may + $row2['importe'];
 }

  if(date("m",$date) =='6'){
$jun = $jun + $row2['importe'];
 }

 if(date("m",$date) =='7'){
$jul = $jul + $row2['importe'];
 }

 if(date("m",$date) =='8'){
$ago = $ago + $row2['importe'];
 }

 if(date("m",$date) =='9'){
$sep = $sep + $row2['importe'];
 }

 if(date("m",$date) =='10'){
$oct = $oct + $row2['importe'];
 }

 if(date("m",$date) =='11'){
$nov = $nov + $row2['importe'];
 }

 if(date("m",$date) =='12'){
$dic = $dic + $row2['importe'];
 }


}






$enep = number_format($ene,2);
$febp = number_format($feb,2);
$marp = number_format($mar,2);
$abrp = number_format($abr,2);
$mayp = number_format($may,2);
$junp = number_format($jun,2);
$julp = number_format($jul,2);
$agop = number_format($ago,2);
$sepp = number_format($sep,2);
$octp = number_format($oct,2);
$novp = number_format($nov,2);
$dicp = number_format($dic,2);


				if ($enep==0) { $enep =''; }
			  	if ($febp==0) { $febp =''; }
			  	if ($marp==0) { $marp =''; }
			  	if ($abrp==0) { $abrp =''; }
			  	if ($mayp==0) { $mayp =''; }
			  	if ($junp==0) { $junp =''; }
			  	if ($julp==0) { $julp =''; }
			  	if ($agop==0) { $agop =''; }
			  	if ($sepp==0) { $sepp =''; }
			  	if ($octp==0) { $octp =''; }
			  	if ($novp==0) { $novp =''; }
			  	if ($dicp==0) { $dicp =''; }

$ejercidot = $ene + $feb + $mar + $abr +  $may + $jun + $jul + $ago + $sep + $oct + $nov + $dic;

$disponiblet = $presupuestof - $ejercidot;

$muestradisponible = number_format($disponiblet,2);
$muestrapresupuesto = number_format($presupuestof,2);
$muestraejercido = number_format($ejercidot,2);

				/*if ($muestradisponible==0) { $muestradisponible =''; }
			  	if ($muestrapresupuesto==0) { $muestrapresupuesto =''; }
			  	if ($muestraejercido==0) { $muestraejercido =''; }+*/

 $html .="<tr>
	 		<td>$row[partida]</td>
	 		<td  align=\"right\">$enep</td>
	 		<td  align=\"right\">$febp</td>
	 		<td  align=\"right\">$marp</td>
	 		<td  align=\"right\">$abrp</td>
	 		<td  align=\"right\">$mayp</td>
	 		<td  align=\"right\">$junp</td>
	 		<td  align=\"right\">$julp</td>
	 		<td  align=\"right\">$agop</td>
	 		<td  align=\"right\">$sepp</td>
	 		<td  align=\"right\">$octp</td>
	 		<td  align=\"right\">$novp</td>
	 		<td  align=\"right\">$dicp</td>
	 		<td  align=\"right\">$muestrapresupuesto</td>
	 		<td  align=\"right\">$muestraejercido</td>
	 		<td  align=\"right\">$muestradisponible</td>
	 	</tr>";

	$presupuesto_final = $presupuesto_final + $presupuesto['suma'] ;

$enet = $enet + $ene;
$febt = $febt + $feb;
$mart = $mart + $mar;
$abrt = $abrt + $abr;
$mayt = $mayt + $may;
$junt = $junt + $jun;
$jult = $jult + $jul;
$agot = $agot + $ago;
$sept = $sept + $sep;
$octt = $octt + $oct;
$novt = $novt + $nov;
$dict = $dict + $dic;

$gastadot = $gastadot + $ejercidot;
$disponiblef = $disponiblef + $disponiblet;
}



$presupuesto_final = number_format($presupuesto_final,2);

$enet =number_format($enet,2);
$febt =number_format($febt,2);
$mart =number_format($mart,2);
$abrt =number_format($abrt,2);
$mayt =number_format($mayt,2);
$junt =number_format($junt,2);
$jult =number_format($jult,2);
$agot =number_format($agot,2);
$sept =number_format($sept,2);
$octt =number_format($octt,2);
$novt =number_format($novt,2);
$dict =number_format($dict,2);


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

$gastadot =number_format($gastadot,2);
$disponiblef =number_format($disponiblef,2);

$html .="<tr>
			
	 		<td  align=\"right\"><strong>Total:</strong></td>
	 		<td  align=\"right\"><strong>$enet</strong></td>
	 		<td  align=\"right\"><strong>$febt</strong></td>
	 		<td  align=\"right\"><strong>$mart</strong></td>
	 		<td  align=\"right\"><strong>$abrt</strong></td>
	 		<td  align=\"right\"><strong>$mayt</strong></td>
	 		<td  align=\"right\"><strong>$junt</strong></td>
	 		<td  align=\"right\"><strong>$jult</strong></td>
	 		<td  align=\"right\"><strong>$agot</strong></td>
	 		<td  align=\"right\"><strong>$sept</strong></td>
	 		<td  align=\"right\"><strong>$octt</strong></td>
	 		<td  align=\"right\"><strong>$novt</strong></td>
	 		<td  align=\"right\"><strong>$dict</strong></td>
	 		<td  align=\"right\"><strong>$presupuesto_final</strong></td>
	 		<td  align=\"right\"><strong>$gastadot</strong></td>
	 		<td  align=\"right\"><strong>$disponiblef</strong></td>

	 	</tr>";

      $html .="</table></div>";




	/*$html .='</table></body>'; /*
  
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
        </table>*/


	//';


}



	$mpdf=Yii::app()->ePdf->html2pdf();
$mpdf -> pdf->SetDisplayMode('fullpage');
//$mpdf->AddPage('L','Legal','','','',5,5,5,5,5,5);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
//$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReportePorCriterios-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);





		}


public function actionPdfCriterios2()
		{
/*
'id_periodo'=>$id_periodo,
												'id_trim'=>$id_trim,
												'id_subprog'=>$id_subprog,
												'id_partida'=>$id_partida,
												'id_area'=>$id_area,
												'fecha1'=>$fecha1,
												'fecha2'=>$fecha2*/
//$anio=$_GET['anio'];
$id_periodo=$_GET['id_periodo'];
$id_trim=$_GET['id_trim'];
$id_subprog=$_GET['id_subprog'];
$id_partida=$_GET['id_partida'];
$id_area=$_GET['id_area'];
$id_bandera=$_GET['id_bandera'];
$fecha1=$_GET['fecha1'];
$fecha2=$_GET['fecha2'];


$titulo = "Nuevo reporte";

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
    	
    	font-size: 12px;      padding: 20px 65px 65px 65px;     width: 800px; text-align: center;
        border-collapse: collapse;
        margin:0;

    }
    tr:nth-child(even) {background-color: #f2f2f2}

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
    padding: 0;
    
   text-align: center; 
    }
    td {
        color: #000000;
        font-size: 11px;
    	padding:2px 4px 0;
    }
    h1 {
        color: #000000;
        text-align: center;
        font-size: 12px;
    	padding: 0;
    	margin:0;
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


th {     font-size: 14px;     font-weight: normal;     padding: 8px;    ;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 2px 4px;         border-bottom: 1px solid #fff;
    color: #000000;    border-top: 1px solid transparent; }


    </style>';


   $enet =0;
$febt =0;
$mart =0;
$abrt =0;
$mayt =0;
$junt =0;
$jult =0;
$agot =0;
$sept =0;
$octt =0;
$novt =0;
$dict =0;

$gastadot = 0;
$disponiblef = 0;
$presupuesto_final = 0;

/*echo 'Perido:'.$id_periodo . '<bR>';
echo 'Trimestre:'.$id_trim . '<bR>';
echo 'Subprog:'.$id_subprog . '<bR>';
echo 'Partida:'.$id_partida . '<bR>';
echo 'area:'.$id_area . '<bR>';
echo 'fecha1:'.$fecha1 . '<bR>';
echo 'fecha2:'.$fecha2 . '<bR>';


*/
//echo '<hr>';
$filtro ="";
$tit ="";

if($id_bandera ==-1){
	$filtrob =" ";
}else{
	$filtrob =" and bandera=$id_bandera ";
}

//echo $fecha1;
$filtro .="id_periodo = $id_periodo $filtrob and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtro .="subprog =$id_subprog AND ";
	$tit ="Subprogramas:$id_subprog ";
}

if($id_partida !=0){
	$filtro .="partida =$id_partida AND ";
	$tit .="partida:$id_partida ";
}

if($id_area !=0){
	$filtro .="area =$id_area AND ";
	$tit .="area:$id_area ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}

/*if($subprog !=0){
	$filtro2 .="and subprog=subprog";
}else{
	$filtro2="";
}*/

///	REPORTE POR AREAS

if($id_area !=0){

	//echo "Mostrar información por area";

	 $q = "SELECT DISTINCT partida  FROM 
  		     base_cap ".$filtro2."
		     order by partida";

	$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

	$resulArea = $cmd->query();

	$arreglo = array();
	foreach ($resulArea as $rowarea) {
      array_push($arreglo, $rowarea['partida']);
	}

	$filtroint ="";
	$tit ="";
//echo $fecha1;
$filtroint .="id_periodo = $id_periodo and id_trimestre=$id_trim  and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";

if($id_subprog !=0){
	$filtroint .="subprog =$id_subprog AND ";
	$tit ="Subprogramas:$id_subprog ";

}


if($id_area !=0){
	$filtroint .="area =$id_area AND ";
	$tit .="area:$id_area ";

}


if( !empty( $filtroint ) ){
		$filtrof= " where ".substr( $filtroint, 0,-4);
	}






	 $q2 = "SELECT DISTINCT partida  FROM 
  		     presupuesto ".$filtrof."
		     order by partida";

	$cmd2 = Yii::app()->db->createCommand($q2);
//$cmd->getText();

	$resulAreaPres = $cmd2->query();

	foreach ($resulAreaPres as $rowareap) {
      array_push($arreglo, $rowareap['partida']);
	}


	
	//$arreglof =asort($arreglo,1);

$arreglof = array_unique($arreglo);

sort($arreglof);

$nomArea = Utilities::infoArea($id_area);

//$titulo ="Informe General $tit del $fecha1 al $fecha2";

$titulo ="<h1 aling='center'>Informe General Presupuestal $nomArea del $fecha1 al $fecha2 </h1>";
$html .='

 <table cellspacing="0" style="width: 100%; text-align: center; padding:0;">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 15px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

    <h1>'.$titulo.'</h1>
';

$html .="

<table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
	<tr>
		<th>Partida</th>
		<th>Nombre</th>
		<th>Presupuesto</th>
		<th>Ejercido</th>
		<th>Disponible</th>
	</tr>
		"; 
 
foreach($arreglof as $numero)
    {

$filtroint ="";
//echo $fecha1;
$filtroint .="id_periodo = $id_periodo and id_trimestre=$id_trim and partida=$numero and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";

if($id_subprog !=0){
	$filtroint .="subprog =$id_subprog AND ";
}


if($id_area !=0){
	$filtroint .="area =$id_area AND ";
}


if( !empty( $filtroint ) ){
		$filtrof= " where ".substr( $filtroint, 0,-4);
	}

$sql = "SELECT SUM(presupuesto) as suma from presupuesto ".$filtrof." ";
// "<br>";
$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();


$presupuestof = $presupuesto['suma'];






////*************************SACAR MESES DEL PRESUPUESTO *************************************

$filtroa ="";

//echo $fecha1;
$filtroa .="id_periodo = $id_periodo $filtrob and area<>12 and partida<>211 and partida<>331  and partida<>612  AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtroa .="subprog =$id_subprog AND ";
}

if($numero !=0){
	$filtroa .="partida =$numero AND ";
}

if($id_area !=0){
	$filtroa .="area =$id_area AND ";
}


if( !empty( $filtroa ) ){
		$filtrof2a= " where ".substr( $filtroa, 0,-4);
	}


 $res = "SELECT * FROM base_cap ".$filtrof2a." order by partida";
  		  //   base_cap where id_periodo = $id_periodo and bandera=1 and partida=$row[partida]  and fecha_ingreso BETWEEN '$fecha1' and '$fecha2' order by fecha_ingreso";


$cmd = Yii::app()->db->createCommand($res);

$resultado2a= $cmd->query();




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

foreach ($resultado2a as $row2) {

		$fecha =$row2["fecha_ingreso"]; 
		$date = strtotime("$fecha");


 if(date("m",$date) =='1'){
$ene = $ene + $row2['importe'];
 }

  if(date("m",$date) =='2'){
$feb = $feb + $row2['importe'];
 }

  if(date("m",$date) =='3'){
$mar = $mar + $row2['importe'];
 }
   if(date("m",$date) =='4'){
$abr = $abr + $row2['importe'];
 }

  if(date("m",$date) =='5'){
$may = $may + $row2['importe'];
 }

  if(date("m",$date) =='6'){
$jun = $jun + $row2['importe'];
 }

 if(date("m",$date) =='7'){
$jul = $jul + $row2['importe'];
 }

 if(date("m",$date) =='8'){
$ago = $ago + $row2['importe'];
 }

 if(date("m",$date) =='9'){
$sep = $sep + $row2['importe'];
 }

 if(date("m",$date) =='10'){
$oct = $oct + $row2['importe'];
 }

 if(date("m",$date) =='11'){
$nov = $nov + $row2['importe'];
 }

 if(date("m",$date) =='12'){
$dic = $dic + $row2['importe'];
 }


}






$enep = number_format($ene,2);
$febp = number_format($feb,2);
$marp = number_format($mar,2);
$abrp = number_format($abr,2);
$mayp = number_format($may,2);
$junp = number_format($jun,2);
$julp = number_format($jul,2);
$agop = number_format($ago,2);
$sepp = number_format($sep,2);
$octp = number_format($oct,2);
$novp = number_format($nov,2);
$dicp = number_format($dic,2);


				if ($enep==0) { $enep =''; }
			  	if ($febp==0) { $febp =''; }
			  	if ($marp==0) { $marp =''; }
			  	if ($abrp==0) { $abrp =''; }
			  	if ($mayp==0) { $mayp =''; }
			  	if ($junp==0) { $junp =''; }
			  	if ($julp==0) { $julp =''; }
			  	if ($agop==0) { $agop =''; }
			  	if ($sepp==0) { $sepp =''; }
			  	if ($octp==0) { $octp =''; }
			  	if ($novp==0) { $novp =''; }
			  	if ($dicp==0) { $dicp =''; }

$ejercidot = $ene + $feb + $mar + $abr +  $may + $jun + $jul + $ago + $sep + $oct + $nov + $dic;

$disponiblet = $presupuestof - $ejercidot;

$muestradisponible = number_format($disponiblet,2);
$muestrapresupuesto = number_format($presupuestof,2);
$muestraejercido = number_format($ejercidot,2);


////fin de sacar mese por

$sql = "SELECT descripcion from partidas where codigo=$numero"; 
	$presupuestoces = Yii::app()->db->createCommand($sql)->queryRow();



     $html .="<tr>
	 		<td>$numero</td>
	 		<td>$presupuestoces[descripcion]</td>
	 		<td  align=\"right\">$muestrapresupuesto</td>
	 		<td  align=\"right\">$muestraejercido </td>
	 		<td  align=\"right\">$muestradisponible</td>
	 	</tr>";
    

    $presupuesto_final = $presupuesto_final + $presupuesto['suma'] ;

$enet = $enet + $ene;
$febt = $febt + $feb;
$mart = $mart + $mar;
$abrt = $abrt + $abr;
$mayt = $mayt + $may;
$junt = $junt + $jun;
$jult = $jult + $jul;
$agot = $agot + $ago;
$sept = $sept + $sep;
$octt = $octt + $oct;
$novt = $novt + $nov;
$dict = $dict + $dic;

$gastadot = $gastadot + $ejercidot;
$disponiblef = $disponiblef + $disponiblet;

}



$presupuesto_final = number_format($presupuesto_final,2);

$enet =number_format($enet,2);
$febt =number_format($febt,2);
$mart =number_format($mart,2);
$abrt =number_format($abrt,2);
$mayt =number_format($mayt,2);
$junt =number_format($junt,2);
$jult =number_format($jult,2);
$agot =number_format($agot,2);
$sept =number_format($sept,2);
$octt =number_format($octt,2);
$novt =number_format($novt,2);
$dict =number_format($dict,2);


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

$gastadot =number_format($gastadot,2);
$disponiblef =number_format($disponiblef,2);

	$html .="<tr>
			<td></td>
	 		<td  align=\"right\"><strong>Total</strong>:</td>
	 		<td  align=\"right\"><strong>$presupuesto_final</strong></td>
	 		<td  align=\"right\"><strong>$gastadot</strong></td>
	 		<td  align=\"right\"><strong>$disponiblef</strong></td>

	 	</tr>
		
		
	 	";



	//print_r($arreglo);

$html .="</table>";
} else {

$titulo ="Informe General Presupuestal $tit del $fecha1 al $fecha2";
$q = "SELECT DISTINCT partida  FROM 
  		     base_cap ".$filtro2."
		     order by partida";

$html .='

 <table cellspacing="0" style="width: 100%; text-align: center; padding:0;">
        <tr>
            <td style="width: 10%;">
            <img style="width:80;" src="http://localhost/spdgm/images/unam.jpg" alt="Logo"><br>
             
            </td>
            <td style="width: 70%; color: #444444; text-align: left;font-size: 15px">
              Coordinación de Difusión Cultural<br>
              Dirección General de Música  
            </td>
            <td style="width: 10%; color: #444444;">
            <img style="width:150;" src="http://localhost/spdgm/images/musicaunam.jpg" alt="Logo"><br>
             </td>
        </tr>
    </table>

    <h1>'.$titulo.'</h1>
';

$html .="<div align=center>
<table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
	<tr>
		<th>Partida</th>
		<th>Nombre</th>
		<th>Presupuesto</th>
		<th>Ejercido</th>
		<th>Disponible</th>
	</tr>
		";

$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

$resultado = $cmd->query();



foreach ($resultado as $row) {


$filtroint ="";
//echo $fecha1;
$filtroint .="id_periodo = $id_periodo and id_trimestre=$id_trim and partida=$row[partida] and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";

if($id_subprog !=0){
	$filtroint .="subprog =$id_subprog AND ";
}


if($id_area !=0){
	$filtroint .="area =$id_area AND ";
}


if( !empty( $filtroint ) ){
		$filtrof= " where ".substr( $filtroint, 0,-4);
	}


$sql = "SELECT SUM(presupuesto) as suma from presupuesto ".$filtrof." ";
// "<br>";
$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();


$presupuestof = $presupuesto['suma'];




$filtroint2 ="";
//echo $fecha1;
$filtroint2 .="id_periodo = $id_periodo $filtrob   and area<>12 and partida=$row[partida] and partida<>211 and partida<>331 and partida<>612 and (fecha_ingreso BETWEEN '$fecha1' and '$fecha2') AND ";

if($id_subprog !=0){
	$filtroint2 .="subprog =$id_subprog AND ";
}


if($id_area !=0){
	$filtroint2 .="area =$id_area AND ";
}


if( !empty( $filtroint2 ) ){
		$filtrof2= " where ".substr( $filtroint2, 0,-4);
	}

$res = "SELECT * FROM base_cap ".$filtrof2." order by partida";
  		  //   base_cap where id_periodo = $id_periodo and bandera=1 and partida=$row[partida]  and fecha_ingreso BETWEEN '$fecha1' and '$fecha2' order by fecha_ingreso";


$cmd = Yii::app()->db->createCommand($res);

$resultado2= $cmd->query();




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

foreach ($resultado2 as $row2) {

		$fecha =$row2["fecha_ingreso"]; 
		$date = strtotime("$fecha");


 if(date("m",$date) =='1'){
$ene = $ene + $row2['importe'];
 }

  if(date("m",$date) =='2'){
$feb = $feb + $row2['importe'];
 }

  if(date("m",$date) =='3'){
$mar = $mar + $row2['importe'];
 }
   if(date("m",$date) =='4'){
$abr = $abr + $row2['importe'];
 }

  if(date("m",$date) =='5'){
$may = $may + $row2['importe'];
 }

  if(date("m",$date) =='6'){
$jun = $jun + $row2['importe'];
 }

 if(date("m",$date) =='7'){
$jul = $jul + $row2['importe'];
 }

 if(date("m",$date) =='8'){
$ago = $ago + $row2['importe'];
 }

 if(date("m",$date) =='9'){
$sep = $sep + $row2['importe'];
 }

 if(date("m",$date) =='10'){
$oct = $oct + $row2['importe'];
 }

 if(date("m",$date) =='11'){
$nov = $nov + $row2['importe'];
 }

 if(date("m",$date) =='12'){
$dic = $dic + $row2['importe'];
 }


}






$enep = number_format($ene,2);
$febp = number_format($feb,2);
$marp = number_format($mar,2);
$abrp = number_format($abr,2);
$mayp = number_format($may,2);
$junp = number_format($jun,2);
$julp = number_format($jul,2);
$agop = number_format($ago,2);
$sepp = number_format($sep,2);
$octp = number_format($oct,2);
$novp = number_format($nov,2);
$dicp = number_format($dic,2);


				if ($enep==0) { $enep =''; }
			  	if ($febp==0) { $febp =''; }
			  	if ($marp==0) { $marp =''; }
			  	if ($abrp==0) { $abrp =''; }
			  	if ($mayp==0) { $mayp =''; }
			  	if ($junp==0) { $junp =''; }
			  	if ($julp==0) { $julp =''; }
			  	if ($agop==0) { $agop =''; }
			  	if ($sepp==0) { $sepp =''; }
			  	if ($octp==0) { $octp =''; }
			  	if ($novp==0) { $novp =''; }
			  	if ($dicp==0) { $dicp =''; }

$ejercidot = $ene + $feb + $mar + $abr +  $may + $jun + $jul + $ago + $sep + $oct + $nov + $dic;

$disponiblet = $presupuestof - $ejercidot;

$muestradisponible = number_format($disponiblet,2);
$muestrapresupuesto = number_format($presupuestof,2);
$muestraejercido = number_format($ejercidot,2);

				/*if ($muestradisponible==0) { $muestradisponible =''; }
			  	if ($muestrapresupuesto==0) { $muestrapresupuesto =''; }
			  	if ($muestraejercido==0) { $muestraejercido =''; }+*/
$sql = "SELECT descripcion from partidas where codigo=$row[partida]"; 
	$presupuestoces = Yii::app()->db->createCommand($sql)->queryRow();




 $html .="<tr>
	 		<td>$row[partida]</td>
	 		<td align=\"left\">$presupuestoces[descripcion]</td>
	 		<td  align=\"right\">$muestrapresupuesto</td>
	 		<td  align=\"right\">$muestraejercido</td>
	 		<td  align=\"right\">$muestradisponible</td>
	 	</tr>";

	$presupuesto_final = $presupuesto_final + $presupuesto['suma'] ;

$enet = $enet + $ene;
$febt = $febt + $feb;
$mart = $mart + $mar;
$abrt = $abrt + $abr;
$mayt = $mayt + $may;
$junt = $junt + $jun;
$jult = $jult + $jul;
$agot = $agot + $ago;
$sept = $sept + $sep;
$octt = $octt + $oct;
$novt = $novt + $nov;
$dict = $dict + $dic;

$gastadot = $gastadot + $ejercidot;
$disponiblef = $disponiblef + $disponiblet;
}



$presupuesto_final = number_format($presupuesto_final,2);

$enet =number_format($enet,2);
$febt =number_format($febt,2);
$mart =number_format($mart,2);
$abrt =number_format($abrt,2);
$mayt =number_format($mayt,2);
$junt =number_format($junt,2);
$jult =number_format($jult,2);
$agot =number_format($agot,2);
$sept =number_format($sept,2);
$octt =number_format($octt,2);
$novt =number_format($novt,2);
$dict =number_format($dict,2);


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

$gastadot =number_format($gastadot,2);
$disponiblef =number_format($disponiblef,2);

$html .="<tr>
			<td></td>
	 		<td  align=\"right\"><strong>Total:</strong></td>
	 	
	 		<td  align=\"right\"><strong>$presupuesto_final</strong></td>
	 		<td  align=\"right\"><strong>$gastadot</strong></td>
	 		<td  align=\"right\"><strong>$disponiblef</strong></td>

	 	</tr>";

      $html .="</table></div>";




	/*$html .='</table></body>'; /*
  
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
        </table>*/


	//';


}



	$mpdf=Yii::app()->ePdf->html2pdf();
$mpdf -> pdf->SetDisplayMode('fullpage');
//$mpdf->AddPage('L','Legal','','','',5,5,5,5,5,5);
//$mpdf->SetHeader('<img style="vertical-align: top" src="'.Yii::app()->baseurl .'/images/unam.jpg" width="80" />|Dirección General de Música|{PAGENO}');
//$mpdf->SetFooter('Informe detalle de Presupuesto|{PAGENO}');
$mpdf->WriteHTML($html);
//$mPDF1->WriteHTML($html2);//$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2)),true);
$report = "ReportePorCriteriosTotalizado-". date("d/m/y H:i:s").".pdf";
$mpdf->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);





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