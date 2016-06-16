<?php
class Utilities {

	public static function infoArea($id_area){


	$sql_lid = "SELECT nombre
	  
	FROM 
	  cat_areas 
	WHERE 
	  id=$id_area";

		
		$area = Yii::app()->db->createCommand($sql_lid)->queryRow();		
	
			return $area['nombre']; 
	

	}
	
	/*public static function formatDate($date, $format = 'Y-m-d H:i:s') {
		return DateTime::createFromFormat($format, $date)->format('M. j, Y');

	}

	public static function cuentaNinos($carrera){


		$sql = "SELECT count(tipo.usuario) as cuenta from registros where tipo_usuario=3 and carrera=$carrera"
		$num = Yii::app()->db->createCommand($sql_lid)->queryRow();	
		$cuentaNinos = $num['cuenta'];

		return $cuentaNinos;



	}

	public static function verificaInscrito($empleado){


	}*/

	/*public static function edad($fecha){
    $fecha = str_replace("/","-",$fecha);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha;
    return $edad;
	}*/

	/*public static function ultimoFolioEmp($carrera){


	$sql_lid = "SELECT 
	  max(registros.dorsal) as dorsal 
	FROM 
	  registros 
	WHERE 
	  carrera=$carrera and tipo_usuario<>3";

		
		$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();		
					
		if( $lid['dorsal'] !=0 ){
			return $lid['dorsal']+1; 
		}else{
			return 0+1; 
		}

	}

	public static function verificaEmp($carrera,$id_empleado){


	$sql_lid = "SELECT 
	  count(registros.id) as reg 
	FROM 
	  registros 
	WHERE 
	  carrera=$carrera and id_empleado=$id_empleado and tipo_usuario=1";

		
		$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();		
					
		return $lid['reg']; 
	}

	public static function formatDorsal($num){
		$numf = printf("%03d",$num);
		return $numf; 
	}

	public static function formatDorsalN($num){
		$numf = "N" . printf("%03d",$num);
		return $numf; 
	}


public static function cache($activar, $horas=3, $if_modified_since=FALSE){
    // Obecedemos If-Modified-Since si queremos usar caché
    if( $activar && $if_modified_since && isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ){
        $fecha_cache = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);
        if( $fecha_cache!==FALSE && $fecha_cache>=getlastmod() ){
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', getlastmod()) . ' GMT', TRUE, 304);
            exit;
        }
    }

    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', getlastmod()) . ' GMT');

    if($activar){
        // Guardar en caché
        header('Expires: ' . gmdate('D, d M Y H:i:s', time()+60*60*$horas) . ' GMT');
        header('Cache-Control: max-age=' . 60*60*$horas . ', s-maxage=' . 60*60*$horas . ', must-revalidate, proxy-revalidate');

        session_cache_limiter(FALSE); // Deshabilitamos los encabezados de caché de session_start()
        if( session_id() ){
            // Una sesión ya iniciada ha generado un encabezado Pragma: no-cache
            if( function_exists('header_remove') ){
                header_remove('Pragma');
            }else{
                header('Pragma:');
            }
        }

    }else{
        // No guardar en caché
        header('Expires: ' . gmdate('D, d M Y H:i:s', time()-86400*365*10) . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
    }
}*/



}
