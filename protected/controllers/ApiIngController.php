<?php


class ApiIngController extends Controller {


public function actionIng($id_ejercicio,$id_trim,$id_tipo,$fecha1,$fecha2) 
{
	$this->layout=false;


//echo $fecha1;
$filtro ="";//id_periodo = 2 and bandera=1 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";
//if($fecha1 !="" && $fecha2 !=""){
	
//}

if($id_tipo !=0){
	$filtro .="cladgam =$id_tipo AND ";
}
if($id_ejercicio !=0){
	$filtro .="id_periodo =$id_ejercicio AND ";
}

if($id_trim !=0){
	$filtro .="bandera = $id_trim AND ";
}

if($fecha1 !="" && $fecha2!=""){
	$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";
}







if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}





$q = "SELECT * FROM 
  		     base_ing ".$filtro2."
		     order by fecha_ingreso";





$cmd = Yii::app()->db->createCommand($q);
$cmd->getText();

$resultado = $cmd->query();


$json = array();
foreach ($resultado as $row) {
	$sql = "SELECT nombre from banderas where id=$row[bandera]"; 
	$band = Yii::app()->db->createCommand($sql)->queryRow();
	$nomband =$band['nombre'];

	$sql = "SELECT nombre from clave_doctos where id=$row[cladgam]"; 
	$docs = Yii::app()->db->createCommand($sql)->queryRow();
	$doc =$docs['nombre'];

		if( !isset($json['informe']) ): 
			$json['informe'] = array(
			  $nomband => array(),
			  /*'originalt'=> 0,
			  'ejercidot'=> 0,
			  'disponiblet'=> 0,*/
		);
		endif;

		
		if( !isset($json['informe'][$nomband][$row["bandera"]]) ): 
			$json['informe'][$nomband][$row["fecha_ingreso"].$row['id']] = array(
			  'fecha'=> $row['fecha_ingreso'],
			  'folio'=> $row['folio'],
			  'docto'=> $doc,
			  'detalle'=> $row['detalle'],
			  'importe'=> $row['importe'],
		);
		endif;

		/*$sql = "SELECT SUM(presupuesto) as presupuesto
				 	   from presupuesto where id_periodo=2 and id_trimestre=6  and subprog=$row[subprog] and partida=$row[partida]";

		$pto = Yii::app()->db->createCommand($sql)->queryRow();

		$sql = "SELECT SUM(importe) as gastos
				 	   from base_cap where id_periodo=2 and subprog=$row[subprog] and partida=$row[partida] and bandera=1";

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
	*/
	
	}

	header('Content-type: application/json');  
    			echo json_encode($json);  
   				Yii::app()->end(); 
}


public function actionPdfIng($id_ejercicio,$id_trim,$id_tipo,$fecha1,$fecha2)
		{



//$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo";
//$url = $baseUrl;
			$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo&fecha1=$fecha1&fecha2=$fecha2";
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
<h3>Informe de Ingresos Extraordinarios</h3>

<table class="table table-striped  table-hover">
	<tr>
		<th>Cuenta</th>
		<th>Fecha</th>
		<th>Folio</th>
		<th>Docto</th>
		<th>Detalle</th>
		<th>Importe</th>
	</tr>';



foreach ($model as $indice => $valor) {





  //	echo ("El indice1 $indice tiene el valor: $valor<br>");
  	if (is_array($valor)){ 

  		$importef  =0;

   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   			//$sumatotal = number_format($model[$indice]['sumatotal'],2);

   			
					$html .="<tr>
	 	
	 		
	 		<td  align=\"left\" colspan=\"2\">$indice2</td>
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		
	 		

	 	</tr>";



   			if (is_array($valor2)){
   				$importet  =0;
				foreach ($valor2 as $indice3 => $valor3) {
				//	echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

		

		
 $fecha =$model[$indice][$indice2][$indice3]['fecha'];
  $folio =$model[$indice][$indice2][$indice3]['folio'];
   $docto =$model[$indice][$indice2][$indice3]['docto'];
    $detalle =$model[$indice][$indice2][$indice3]['detalle'];
     $importe =number_format($model[$indice][$indice2][$indice3]['importe'],2);
     $importe2 =$model[$indice][$indice2][$indice3]['importe'];
							
	$html .="<tr>
	 	
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">$fecha</td>
	 		<td  align=\"right\">$folio</td>
	 		<td  align=\"right\">$docto</td>
	 		<td  align=\"left\">$detalle</td>
	 		<td  align=\"right\">$importe</td>
	 		
	 		

	 	</tr>";
	

  $importet = $importet + $importe2;
  $importet2 = number_format($importet,2);



	/*$presupuestop = number_format($model[$indice][$indice2][$indice3]['originalp'],2);
			$ejercidop = number_format($model[$indice][$indice2][$indice3]['ejercidop'],2);
			$disponiblep = number_format($model[$indice][$indice2][$indice3]['disponiblep'],2);

				if ($presupuestop==0) { $presupuestop =''; }
			  	if ($ejercidop==0) { $ejercidop =''; }
			  	if ($disponiblep==0) { $disponiblep =''; }
						
						echo "<tr>
	 		
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><b>Subtotal:</b></td>
	 		<td  align=\"right\"><b>$presupuestop</b></td>
	 		<td  align=\"right\"><b>$ejercidop</b></td>
	 		<td  align=\"right\"><b>$disponiblep</b></td>

	 	</tr>";	*/
			
				}


				$html .="<tr>
	 	
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\">Subtotal</td>
	 		<td  align=\"right\"><strong>$importet2</strong></td>
	 		
	 		

	 	</tr>";
			}
	 $importef = $importef + $importet;	
	 	}
$importetfin = number_format($importef,2);
	
				$html .="<tr>
	 	
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"></td>
	 		<td  align=\"right\"><strong>Gran total</strong></td>
	 		<td  align=\"right\"><strong>$importetfin</strong></td>
	 		
	 		

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

}



?>
