<?php

class InformesCpController extends Controller
{
	public function actionIndex()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{

 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];


$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
 $fecha1 ='';
 $fecha2 ='';

$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

}

}

public function actionReqPto() {
// echo CHtml::encode(print_r($_POST, true));
$id_subprog = $_POST['id_subprog'];
//$id_tipo = $_POST['id_tipo'];

//if(isset($id_tipo,$id_subprog)){

if(isset($id_subprog)){
//echo $fecha2;


//if (($id_subprog != '') && ($id_tipo != '')) {


if ($id_subprog != '' && $id_subprog != 0) {

//echo $id_tipo;
$titulo = "Informe presupuestal 2014";

$url = "http://localhost/spdgm/index.php/api/infpto?id_subprog=$id_subprog";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog));
//$titulo = "Informe por Presupuesto 2014";

/*if($id_tipo==1){
//$url = "http://localhost/spdgm/index.php/api/infpto?id_subprog=$id_subprog&id_tipo=$id_tipo";
$url = "http://localhost/spdgm/index.php/api/infpto?id_subprog=$id_subprog";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog));
}*/

/*$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog,
			'id_tipo'=>$id_tipo));
}*/

/*if($id_tipo==2){
$url = "http://localhost/spdgm/index.php/api/infpto2?id_subprog=$id_subprog&id_tipo=$id_tipo";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rpt2', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog,
			'id_tipo'=>$id_tipo));
}*/

	//}


	}elseif ($id_subprog == 0) {

		$titulo = "Informe presupuestal por Subprogramas 2014";

$url = "http://localhost/spdgm/index.php/api/infSubprog?id_subprog=$id_subprog";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rptsubprog', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog));
		# code...
	} else {

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


	
public function actionDetalle($subprog,$partida){

$titulo = "Informe detalle";
$url = "http://localhost/spdgm/index.php/api/detalle?subprog=$subprog&partida=$partida";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->render('_detalle',array(
				           'model'=>$model,
				           'titulo'=>$titulo
		));




}

public function actionFancybox($subprog,$partida)
{
    if(Yii::app()->request->isAjaxRequest)
    {
        //do stuff here
        // ............
        //$this->layout = '//path/to/fancybox/layout';
        $this->render("myfancyboxview");
    }
}


public function actionEjercido()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{

 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];


$this->render('_criterios2',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
 $fecha1 ='';
 $fecha2 ='';

$this->render('_criterios2',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

}

}

public function actionEjercido2() {
// echo CHtml::encode(print_r($_POST, true));
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

if(isset($fecha1,$fecha2)){

//echo $fecha1;
//echo $fecha2;


if (($fecha1 != '') && ($fecha1 != '')) {


$titulo = "Informe ejercido del $fecha1 al $fecha2";
//$titulo = "Informe por Presupuesto 2014";

$url = "http://localhost/spdgm/index.php/api/infptoEj?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rptej', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2));

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