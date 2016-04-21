<?php 
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];


 $titulo = "Informe de depositos y gastos por ingresos extraordinarios $anio";

//$url = "http://localhost/spdgm/index.php/api/ingext?fecha1=$fecha1&fecha2=$fecha2";
$url = "http://localhost/spdgm/index.php/api/ingext?anio=$anio&id=$id";

//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->renderPartial('_rptext', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'anio'=>$anio,
			'id'=>$id));



?>