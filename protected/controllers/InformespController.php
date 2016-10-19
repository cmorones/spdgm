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






if($id_periodo==0){

echo $titulo = "No existe Informacion para mostrar";

//echo $model;
$this->renderPartial('_pagos2', array(
      'titulo'=>$titulo
     
      ));


} else {

$id_periodo = $_POST['id_periodo'];
$id_pago = $_POST['id_pago'];
$id_area = $_POST['id_area'];
$prov = $_POST['prov'];


  $prefil = "id_periodo=$id_periodo ";
  $pagado ="";
  $nomarea ="";
  $nomprov ="";

  if( !empty( $_POST["id_pago"] ) ){
      $prefil .=" and pagado=".$_POST["id_pago"];
      if ($_POST['id_pago']==1) {
        $pagado ="Pagados";
      }elseif ($_POST['id_pago']==2) {
        $pagado ="No Pagados";
      }
    }

  if( !empty( $_POST["id_area"] ) ){
      $prefil .=" and clasificacion=".$_POST["id_area"];
      if($id_area==1){
        $nomarea=" de DGMU";
      }
      if($id_area==2){
        $nomarea=" de OFUNAM";
      }
      if($id_area==3){
        $nomarea=" de OJUEM";
      }
    }

    if( !empty( $_POST["prov"] ) ){
      $prefil .=" and proveedor='".$_POST["prov"]."'";
      $nomprov = "de " .$_POST["prov"];
    }

  //$filtro = " ".substr( $prefil ,4,-1 );

  $model = Pagos::model()->findAll((array(
    'condition'=>"$prefil",
    //'order'=>'proveedor',
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'proveedor'
  )));

$titulo ="Informe de Pagos $pagado $nomarea $nomprov";

$this->renderPartial('_pagos', array(
      'titulo'=>$titulo,
      'model'=>$model,
      //'fecha2'=>$fecha2,
      'id_periodo'=>$id_periodo,
      'id_pago'=>$id_pago,
      'id_area'=>$id_area,
      'prov'=>$prov
      ));


}
















/*$id_periodo = $_POST['id_periodo'];
$id_pago = $_POST['id_pago'];
$id_area = $_POST['id_area'];
$prov = $_POST['proveedor'];




echo $id_periodo . "<br>";
echo $id_pago . "<br>";
echo $id_area . "<br>";
echo $prov . "<br>";

$titulo='';
$model= array();

if($id_periodo==0  && $id_pago==0 && $id_area==0 && $id_area==0 ){

echo $titulo = "No existe Informacion para mostrar";

//echo $model;
$this->renderPartial('_pagos2', array(
      'titulo'=>$titulo
     
      ));


} else {



if ($id_periodo!=0  && $id_pago==0 && $id_area==0 && $prov==0) {
  # code...
echo $titulo = "1-Caso 1";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}


if ($id_periodo!=0  && $id_pago!=0 && $id_area==0 &&  $prov==0) {
  # code...
echo $titulo = "2-Caso 2";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago ==0 && $id_area!=0 &&  $prov==0) {
  # code...
echo $titulo = "2-Caso 2";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and clasificacion=$id_area",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago !=0 && $id_area!=0 &&  $prov==0) {
  # code...
echo $titulo = "2-Caso 2";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago==0 && $id_area==0 && $prov!="") {
  # code...
echo $titulo = "";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}






/*

if ($id_periodo!=0  && $id_pago!=0 && $id_area==0 &&  $prov==0) {
  # code...
echo $titulo = "2-Caso 2";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago!=0 && $id_area!=0 &&  $prov==0) {
  # code...
echo $titulo = "3-Caso 3";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago!=0 && $id_area!=0 &&  $prov!="") {
  # code...
echo $titulo = "4-Caso 4";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago==0 && $id_area==0 &&  $prov!="") {
  # code...
echo $titulo = "4-Caso 4";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}




$this->renderPartial('_pagos', array(
      'titulo'=>$titulo,
      'model'=>$model,
      //'fecha2'=>$fecha2,
      'id_periodo'=>$id_periodo,
      'id_pago'=>$id_pago,
      'id_area'=>$id_area,
      'prov'=>$prov
      ));

}


/*
if ($id_periodo!=0  && $id_pago==0 && $id_area!=0 && ($prov=="" || $prov==0)) {
  # code...
echo $titulo = "2-$id_periodo!=0  && $id_pago==0 && $id_area!=0 && $prov==0";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and clasificacion=$id_area",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago!=0 && $id_area!=0 && ($prov=="" || $prov==0)) {
  # code...
echo $titulo = "3-$id_periodo!=0  && $id_pago!=0 && $id_area!=0 && $prov==0";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}


if ($id_periodo!=0  && $id_pago!=0 && $id_area==0 && ($prov=="" || $prov==0)) {
  # code...
echo $titulo = "4-$id_periodo!=0  && $id_pago!=0 && $id_area==0 && $prov==0";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}




if ($id_periodo!=0  && $id_pago!=0 && $id_area!=0 && $prov !="") {
  # code...
echo $titulo = "5-$id_periodo!=0  && $id_pago!=0 && $id_area!=0 && $prov !=''";
$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
     'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}


if ($id_periodo!=0  && $id_pago==0 && $id_area==0 && $prov !="") {
  # code...
echo $titulo = "6-$id_periodo!=0  && $id_pago==0 && $id_area==0 && $prov !=''";

$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
     'condition'=>"id_periodo=$id_periodo and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago!=0 && $id_area==0 && $prov !="") {
  # code...
echo $titulo = "7-$id_periodo!=0  && $id_pago==0 && $id_area==0 && $prov !=''";

$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
     'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}

if ($id_periodo!=0  && $id_pago == 0 && $id_area!=0 && $prov !="") {
  # code...
echo $titulo = "8-$id_periodo!=0  && $id_pago ==0 && $id_area!=0 && $prov !=''";

$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";

  $model = Pagos::model()->findAll((array(
     'condition'=>"id_periodo=$id_periodo and clasificacion=$id_area and proveedor ='$prov'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
  )));

}






$this->renderPartial('_pagos', array(
      'titulo'=>$titulo,
      'model'=>$model,
      //'fecha2'=>$fecha2,
      'id_periodo'=>$id_periodo,
      'id_pago'=>$id_pago,
      'id_area'=>$id_area,
      'prov'=>$prov
      ));*/


/*if($id_periodo!="falso"){

$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
$titulo = "Pagos $ejercicio[nombre]";





if($id_periodo!="falso" && $id_pago!=0 && $id_area==0 && $prov ==0 ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago!=0 && $id_area!=0 && $prov ==0 ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}


if($id_periodo!="falso" && $id_pago!=0 && $id_area!=0 && $prov !="" ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and clasificacion=$id_area and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}


if($id_periodo!="falso" && $id_pago==0 && $id_area!=0 && $prov ==0 ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and clasificacion=$id_area ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago==0 && $id_area!=0 && $prov !="" ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and clasificacion=$id_area and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago!=0 && $id_area==0 && $prov ==0 ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}



if($id_periodo!="falso" && $id_pago==0 && $id_area==0 && $prov !="" ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago=="" && $id_area=="" && $prov !="" ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago!=0 && $id_area=="" && $prov !="" ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago!=0 && $id_area==0 && $prov !="" ){

  $model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}

if($id_periodo!="falso" && $id_pago==0 && $id_area==0 && $prov ==0 ){


$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));

}


$this->renderPartial('_pagos', array(
			'titulo'=>$titulo,
			'model'=>$model,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_pago'=>$id_pago,
			'id_area'=>$id_area,
			'prov'=>$prov
			));

}else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un ejercicio y/o criterios.
</div>
<?php

}
}
//echo $fecha1;
//echo $fecha2;


/*if (($id_periodo != '')) {

$sql = "SELECT nombre from cat_ejercicio where id=$id_periodo"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();




//$titulo = "Informe por Presupuesto 2014";

/*$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
if($id_pago==0 && $id_area==0 && $prov==0){


$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo ",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
}


if($id_pago!=0 && $id_area!=0 && $prov!=""){


$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago  and clasificacion=$id_area and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
}

if($id_pago==0 && $id_area==0 && $prov!=""){


$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
}

if($id_pago!=0 && $id_area==0 && $prov!=""){


$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
}

if($id_pago==0 && $id_area!=0 && $prov!=""){


$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and depto=$id_area and proveedor like '%$prov%'",
   // 'condition'=>"id_periodo=$id_periodo",
   // 'condition'=>"id_trimestre=$id_trim",
    'order'=>'id'
	)));
}



/*$model = Pagos::model()->findAll((array(
    'condition'=>"id_periodo=$id_periodo and pagado=$id_pago  and depto=$id_area and proveedor like '%$prov%'",
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



$titulo = "Pagos $ejercicio[nombre]";

//echo $model;
$this->renderPartial('_pagos', array(
			'titulo'=>$titulo,
			'model'=>$model,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_pago'=>$id_pago,
			'id_area'=>$id_area,
			'prov'=>$prov
			));

	//}


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

	}*/
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