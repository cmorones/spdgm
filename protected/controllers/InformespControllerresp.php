<?php

class InformespController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}


public function actionReqPagos() {
// echo CHtml::encodid_periodoe(print_r($_POST, true));
$id_periodo = $_POST['id_periodo'];
$id_pago = $_POST['id_pago'];

if(isset($id_periodo,$id_pago)){

//echo $fecha1;
//echo $fecha2;


if (($id_periodo != '') && ($id_pago != '') ) {

$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();




//$titulo = "Informe por Presupuesto 2014";

/*$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);*/
if($id_pago!=0){
$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
if($id_pago==1){
		$tipo ="Pagados";
	} else {
		$tipo ="Pendientes";
	}

}else{

$tipo='';	

$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

$titulo = "Pagos $ejercicio[nombre] $tipo";

//echo $model;
$this->renderPartial('_pagos', array(
			'titulo'=>$titulo,
			'model'=>$model,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_pago'=>$id_pago
			));

	//}*/


	}else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio.
</div>
<?php

}

	}
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