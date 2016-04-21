
<?php  
//print_r(json_encode($model));
//die();
/*



$this->renderPartial('_rpt', array(
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_subprog'=>$id_subprog,
			'id_partida'=>$id_partida,
			'id_area'=>$id_area
			));

*/
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
echo '<hr>';
$filtro ="";
//echo $fecha1;
$filtro .="id_periodo = $id_periodo and bandera=1 and area<>12 and partida<>211 and partida<>331 and partida<>612  AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($id_subprog !=0){
	$filtro .="subprog =$id_subprog AND ";
}

if($id_partida !=0){
	$filtro .="partida =$id_partida AND ";
}

if($id_area !=0){
	$filtro .="area =$id_area AND ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}

/*if($subprog !=0){
	$filtro2 .="and subprog=subprog";
}else{
	$filtro2="";
}*/




$q = "SELECT DISTINCT partida  FROM 
  		     base_cap ".$filtro2."
		     order by partida";

echo "<div class='span12'>
<table class='table table-striped table-hover'>
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


/*if($id_area !=0){
	$filtroint .="area =$id_area AND ";
}*/


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

 echo "<tr>
	 		<td><center>$row[partida]</center></td>
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

	echo "<tr>
			
	 		<td  align=\"right\"><b>Total:<b></td>
	 		<td  align=\"right\"><b>$enet</td>
	 		<td  align=\"right\"><b>$febt</td>
	 		<td  align=\"right\"><b>$mart</td>
	 		<td  align=\"right\"><b>$abrt</td>
	 		<td  align=\"right\"><b>$mayt</td>
	 		<td  align=\"right\"><b>$junt</td>
	 		<td  align=\"right\"><b>$jult</td>
	 		<td  align=\"right\"><b>$agot</td>
	 		<td  align=\"right\"><b>$sept</td>
	 		<td  align=\"right\"><b>$octt</td>
	 		<td  align=\"right\"><b>$novt</td>
	 		<td  align=\"right\"><b>$dict</td>
	 		<td  align=\"right\"><b>$presupuesto_final<b></td>
	 		<td  align=\"right\"><b>$gastadot<b></td>
	 		<td  align=\"right\"><b>$disponiblef<b></td>

	 	</tr>";

?>
</table>
<br>
<br>
<br>
<br>
<br>

