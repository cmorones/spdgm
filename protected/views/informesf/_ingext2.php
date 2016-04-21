<?php 



$titulo = "Informe de depositos y gastos por ingresos extraordinarios 2015";

//$url = "http://localhost/spdgm/index.php/api/ingext?fecha1=$fecha1&fecha2=$fecha2";
$url = "http://localhost/spdgm/index.php/api/ingext2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->renderPartial('_rptext', array(
			'model'=>$model,
			'titulo'=>$titulo));



?>