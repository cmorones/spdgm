<?php

class ApipdfController extends Controller
{

	public function encabezado()
	{
		
		$logo1 = Yii::app()->request->baseUrl . '/images/escudo_cd_mex_alta.png';
		$logo = Yii::app()->request->baseUrl . '/images/unam.jpg';
		$logocdmx = Yii::app()->request->baseUrl . '/images/logocdmx.png';
		//$html =file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.css');



        $html ="<div class=\"row headercontentRow\">
        <table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
        <tr>
            <td style=\"width: 10%;\">
            <img style=\"width:90px;higth:90px;\" src=\"$logo\" alt=\"DIRECCION GENERAL DE MÚSICA\" /> 
            </td>
            <td style=\"width: 60%;\">
           <div  class=\"coltituloHeader\"><h1 class=\"tituloHeader\">DIRECCION GENERAL DE MÚSICA</h1></div><br>
           <div  class=\"coltituloHeadertituloPresentacion\">PÓLIZA DE DIARIO</div>
            </td>

             <td style=\"width: 10%;\">
             <div class=\"col-md-5 text-center colcdmxHeader\"></div>
             </td>
            
        </tr>
    </table></div>";

        return $html;
	}


public function pie()
	{
		
		$logo1 = Yii::app()->request->baseUrl . '/images/escudo_cd_mex_alta.png';
		$logo = Yii::app()->request->baseUrl . '/images/logo_iems_alta_bn.png';
		$logocdmx = Yii::app()->request->baseUrl . '/images/escudo-pie.png';
		//$html =file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.css');
 $fecha_reg = date("Y-m-d H:i:s");


        $html ="<div class=\"row headercontentRow\">
          <center>
    <table style=\"width:100%; border-collapse: collapse; font-size: 12px;\" border=\"1\">
      <thead>
        <tr style=\"background-color: rgb(204, 204, 204)\;\">
          <td  style=\"text-align: center;\">ELABORÓ</td>
          <td style=\"text-align: center;\">REVISÓ</td>
          <td style=\"text-align: center;\">AUTORIZO</td>
          <td style=\"text-align: center;\">AUXILIARES</td>
          <td style=\"text-align: center;\">DIARI0</td>
         
        </tr>
      </thead>
      <tbody>
     <tr>
     <td>*VGR</td>
     <td></td>
     <td></td>
     <td></td>
     
     <td></td></tr>

       <tr style=\"background-color: rgb(204, 204, 204)\;\">
          <td  style=\"text-align: center;\" colspan=3></td>
          
          <td style=\"text-align: center;\">FECHA</td>
          <td style=\"text-align: center;\">POLIZA</td>
         
        </tr>

          <tr>
          <td  style=\"text-align: center;\" colspan=3 style=\"width=60; height=60;\"></td>
          
          <td style=\"text-align: center;\">".$fecha_reg."</td>
          <td style=\"text-align: center;\"></td>
         
        </tr>

       


      </tbody>
      
    </table>
  </center>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br></div>";

        return $html;
	}
		public function actionTurno($id,$tipo,$parcial,$parcial1)
	{
		
	
		$html=$this->encabezado();
    if($tipo==1){
    $html2=$this->tabla_turno($id,$tipo,$parcial,$parcial1); //Proveedores
    }else {
		$html2=$this->tabla_turno2($id,$tipo,$parcial);  //Acrredores
    }
		$html3=$this->pie();

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	//$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
        $mPDF1->SetHtmlFooter($html3);
 
        # Outputs ready PDF
        $report = "turno_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_BROWSER);


	}



	public function tabla_turno($id,$tipo,$parcial,$parcial1)
	{
	error_reporting(0);

   $sql = "Select * from base_cap where id=$id";
  $info = Yii::app()->db->createCommand($sql)->queryRow();

  $sql2 = "Select * from clasif where id=$info[clasificacion]";
  $info2 = Yii::app()->db->createCommand($sql2)->queryRow();


  if($tipo==1){

    $tip = "ACREEDORES DIVERSOS";
    $tip2 = "RETENCION DE IMPUESTOS";

  }elseif ($tipo==2) {
    # code...
    $tip = "<u>PROVEEDORES</u>";
    $tip2 = "<u>DOCUMENTACIÓN EN TRAMITE</u>";
  }

  $suma = $parcial + $parcial1;

  $parcial = number_format($parcial,2);

  $parcial1 = number_format($parcial1,2);

   $suma = number_format($suma,2);

    
    /*$model = Pagos::model()->findbypk($id);

    $fechadoc =$model->corresp->docto->fecha;
    $idrem =$model->corresp->docto->remitente;
    $iddest =$model->corresp->destinatario;

    $sql2 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$idrem"; 
$info = Yii::app()->db->createCommand($sql2)->queryRow();


    $sql3 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$iddest"; 
$info2 = Yii::app()->db->createCommand($sql3)->queryRow();*/
$proveedor ="<u>PROVEEDORES</u>";
$nombreprov =$info['proveedor'];
	$html ="



	<center>
 <hr>
		<table style=\"width:100%; font-size: 12px;\"  >
			<thead>
				<tr style=\"background-color: rgb(204, 204, 204)\;\" >
					<td  style=\"text-align: center;\" style=\"width:30px;higth:30px;\">CUENTA</td>
					<td style=\"text-align: center;\" style=\"width:30px;higth:30px;\">SUB-CUENTA</td>
					<td align=center style=\"text-align: center;\" style=\"width:30px;higth:200px;\">NOMBRE</td>
					<td align=center style=\"text-align: center;\" style=\"width:30px;higth:30px;\">PARCIAL</td>
					<td align=center style=\"text-align: center;\" style=\"width:30px;higth:30px;\">DEBE</td>
					<td align=center style=\"text-align: center;\" style=\"width:30px;higth:30px;\">HABER</td>
				</tr>
			</thead>
      <tbody>
     <tr>
     <td align=center> <br>
     <br>
     <br>20</td>
     <td></td>
     <td> <br>
     <br>
     <br>$tip</td>
     <td></td>
     <td align=right> <br>
     <br>
     <br>$parcial</td>
     <td></td></tr>

       <tr>
     <td></td>
     <td align=center>$info[folio]<br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
    <bR>
    <bR>
    <br>
     </td>
     <td>$info[proveedor]
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
    <bR>
    <bR>
    <br> 
     <br>
   
     
     <br></td>
     <td align=right>$parcial
     <br>
     <br>
     <br>
    
     
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     </td>
     <td></td>
     <td></td></tr>


     <tr>
     <td align=center>24</td>
     <td></td>
     <td>$tip2</td>
     <td></td>
    
     <td align=right>$parcial1</td></tr>
     <td></td>
      <tr>
     <td></td>
     <td align=center>$info[folio]</td>
     <td>$info[proveedor]</td>
     <td align=right>$parcial1</td>
     <td></td>
     <td></td></tr>
    
       <tr>
     <td align=center>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>4</td>
     <td ></td>
     <td></td>
     <td></td>
     <td></td>
     <td ></td>
     </tr>

      <tr>
     <td></td>
     <td align=center>$info2[id]</td>
     <td>$info2[nombre]</td>
     <td></td>
     <td></td>
     <td align=right>$suma</td>
     </tr>

       <tr>
     <td></td>
     <td></td>
     <td>C/R $info[no_contrarecibo] DEL $info[fecha_contrarecibo]</td>
     <td></td>
     <td></td>
     <td></td></tr>

     <tr>
     <td></td>
     <td></td>
     <td><br>
     <br>
     <br>
     <br>
     <br>_________________________<BR>RECIBI <br>
     <br>
     <br>
     <br>
     <br>
     <br></td>
     <td></td>
     <td></td>
     <td></td></tr>

      <tr>
      <td colspan=4 align=right>SUMAS<BR>IGUALES</td>
      <td align=right >$suma</td>
      <td align=right>$suma</td>
      </tr>


      </tbody>
			
		</table>
    <hr>
    <br>
    <br>
   

    <table style=\"width:100%; font-size: 12px;\" >
    <tr>
    <td>CONCEPTO</td>
    <td>FACTURA No. $info[factura]</td>
    <td></td>
    </tr>
    </table>
    
	</center>

  <br>
  <br>
  <br>
  <br>
  <br>


	
";

 //<td  style=\"text-align: left; \" colspan=2><div style=\"width=30px; height=30;\">".$model->solucion."</div></td>
		
        return $html;
	}


public function tabla_turno2($id,$tipo,$parcial)
  {
  error_reporting(0);

  $sql = "Select * from base_cap where id=$id";
  $info = Yii::app()->db->createCommand($sql)->queryRow();

  $sql2 = "Select * from clasif where id=$info[clasificacion]";
  $info2 = Yii::app()->db->createCommand($sql2)->queryRow();

 /* if($info[depto]!=""){

  $sql2 = "Select * from cat_areas where id=$info[depto]";
  $info2 = Yii::app()->db->createCommand($sql2)->queryRow();
  }else{
    $info2['proveedor'] ="No esta completo el pago";
  }*/

  if($tipo==1){

    $tip = "ACREEDORES DIVERSOS";
    $tip2 = "RETENCION DE IMPUESTOS";

  }elseif ($tipo==2) {
    # code...
     $tip = "<u>PROVEEDORES</u>";
    $tip2 = "<u>DOCUMENTACIÓN EN TRAMITE</u>";
  }

$parcial = number_format($parcial,2);
    
    /*$model = Pagos::model()->findbypk($id);

    $fechadoc =$model->corresp->docto->fecha;
    $idrem =$model->corresp->docto->remitente;
    $iddest =$model->corresp->destinatario;

    $sql2 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$idrem"; 
$info = Yii::app()->db->createCommand($sql2)->queryRow();


    $sql3 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$iddest"; 
$info2 = Yii::app()->db->createCommand($sql3)->queryRow();*/
$proveedor ="PROVEEDORES";
$nombreprov ="RAMIREZ PADRO JOSEFINA";
  $html ="



  <center>
 <hr>
    <table style=\"width:100%; font-size: 12px;\"  >
      <thead>
        <tr style=\"background-color: rgb(204, 204, 204)\;\" >
          <td  style=\"text-align: center;\" style=\"width:30px;higth:30px;\">CUENTA</td>
          <td style=\"text-align: center;\" style=\"width:30px;higth:30px;\">SUB-CUENTA</td>
          <td align=center style=\"text-align: center;\" style=\"width:30px;higth:200px;\">NOMBRE</td>
          <td align=center style=\"text-align: center;\" style=\"width:30px;higth:30px;\">PARCIAL</td>
          <td align=center style=\"text-align: center;\" style=\"width:30px;higth:30px;\">DEBE</td>
          <td align=center style=\"text-align: center;\" style=\"width:30px;higth:30px;\">HABER</td>
        </tr>
      </thead>
      <tbody>
     <tr>
     <td align=center><br>
     <br><br>
     21<bR>
     </td>
     <td></td>
     <td> <br>
     <br>
     <br>$tip</td>
     <td></td>
     <td align=right> <br>
     <br>
     <br>$parcial</td>
     <td></td></tr>

       <tr>
     <td></td>
     <td align=center>$info[folio]<br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
    <bR>
    <bR>
    <br>
     </td>
     <td>$info[proveedor]
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
    <bR>
    <bR>
    <br> 
     <br>
   
     
     <br></td>
     <td align=right>$parcial 
     <br>
     <br>
     <br>
    
     
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     </td>
     <td></td>
     <td></td></tr>


     <tr>
     <td align=center>4</td>
     <td></td>
     <td>$tip2</td>
     <td></td>
     <td></td>
     <td align=right>$parcial</td></tr>

      <tr>
     <td></td>
     <td align=center>$info2[id]</td>
     <td>$info2[nombre]</td>
     <td align=right>$parcial</td>
     <td></td>
     <td></td></tr>

       <tr>
     <td></td>
     <td></td>
     <td>C/R $info[no_contrarecibo] DEL $info[fecha_contrarecibo]</td>
     <td></td>
     <td></td>
     <td></td></tr>

     <tr>
     <td></td>
     <td></td>
     <td><br>
     <br>
     <br>
     <br>
     <br>_________________________<BR>RECIBI <br>
     <br>
     <br>
     <br>
     <br>
     <br></td>
     <td></td>
     <td></td>
     <td></td></tr>

      <tr>
      <td colspan=4 align=right>SUMAS<BR>IGUALES</td>
      <td align=right >$parcial</td>
      <td align=right>$parcial</td>
      </tr>


      </tbody>
      
    </table>
    <hr>
    <br>
    <br>
   

    <table style=\"width:100%; font-size: 12px;\" >
    <tr>
    <td>CONCEPTO</td>
    <td>FACTURA No. $info[factura]</td>
    <td></td>
    </tr>
    </table>
    
  </center>

  <br>
  <br>
  <br>
  <br>
  <br>


  
";

 //<td  style=\"text-align: left; \" colspan=2><div style=\"width=30px; height=30;\">".$model->solucion."</div></td>
    
        return $html;
  }
 

}