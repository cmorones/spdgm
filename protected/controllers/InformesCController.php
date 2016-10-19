<?php

class InformesCController extends Controller
{
	public function actionIndex()
	{

		$this->render('index');

	}

	public function actionIng()
	{

		$this->render('_ing');

	}
	


public function actionReqPto() {

if(isset($_POST['fecha1'],$_POST['fecha2']) && $_POST['fecha1'] !=''  && $_POST['fecha2'])
{
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];

 $tit1 = "del $fecha1 al $fecha2<br>";
} else {
 $fecha1 ='';
 $fecha2 ='';
 $tit1 ='';
}

if(isset($_POST['id_partida']) && $_POST['id_partida'] !="" && $_POST['id_partida'] !=0){
$id_partida =$_POST['id_partida'];
$tit3 = "por partida:$id_partida<br>";
}else
{
$id_partida =0;
$tit3 = "";
}

if(isset($_POST['id_subprog']) && $_POST['id_subprog'] !="" && $_POST['id_subprog'] !=0){
$id_subprog =$_POST['id_subprog'];
$tit2 = "por subprograma:$id_subprog<br>";
}else
{
$id_subprog =0;
$tit2 = '';
}

if(isset($_POST['id_area']) && $_POST['id_area'] !="" && $_POST['id_area'] !=0){
$id_area =$_POST['id_area'];
$tit4 = "por area:$id_area<br>";
}else
{
$id_area =0;
$tit4 = "";
}

if(isset($_POST['id_bandera']) && $_POST['id_bandera'] !="" && $_POST['id_bandera'] !=0){
$id_bandera =$_POST['id_bandera'];
$nomBAndera = Utilities::infoBandera($id_bandera);
$tit6 = " de $nomBAndera ";
}else
{
$id_bandera =0;
$tit6 = "";
}

if(isset($_POST['proveedor']) && ($_POST['proveedor'] !="" && $_POST['proveedor'] !='0')){
$proveedor =$_POST['proveedor'];
$tit5 = "por proveedor:$proveedor<br>";

}else
{
$proveedor ="";
$tit5 = "";

}

if(isset($_POST['observa']) && $_POST['observa'] !=""){
$observa =$_POST['observa'];
$tit7 = "por observaciones:$observa<br>";

}else
{
$observa ="";
$tit7 = "";

}

if(isset($_POST['importe']) && $_POST['importe'] !=""){
$importe =$_POST['importe'];
$tit8 = "por importe mayor o igual a $$importe<br>";

}else
{
$importe =0;
$tit8 = "";

}



$sql = "UPDATE  criterios set subprog='$id_subprog', partida='$id_partida' , area='$id_area', bandera='$id_bandera', proveedor='$proveedor', observa='$observa', importe='$importe'  where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();


$titulo = "Informe de Gastos $tit5$tit6$tit7$tit8 $tit1";

/*$fecha1 = $post['fecha1'];
$fecha2 = $post['fecha2'];*/


$url = "http://localhost/spdgm/index.php/api/all?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->renderPartial('_rptall', array(
			'model'=>$model,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'titulo'=>$titulo));

//echo CHtml::encode(print_r($_POST, true));
//$fecha1 = $_REQUEST['fecha1'];
/*$fecha2 = $_REQUEST['fecha2'];



echo $id_subprog;
echo $fecha2;



//$id_tipo = $_POST['id_tipo'];

//if(isset($id_tipo,$id_subprog)){

/*if(isset($id_subprog)){


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

	}*/
}

public function actionReqIng() {

if(isset($_POST['fecha1'],$_POST['fecha2']) && $_POST['fecha1'] !=''  && $_POST['fecha2'])
{
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];

 $tit1 = "del $fecha1 al $fecha2<br>";
} else {
 $fecha1 ='';
 $fecha2 ='';
 $tit1 ='';
}

if(isset($_POST['id_partida']) && $_POST['id_partida'] !="" && $_POST['id_partida'] !=0){
$id_partida =$_POST['id_partida'];
$tit3 = "por partida:$id_partida<br>";
}else
{
$id_partida =0;
$tit3 = "";
}

if(isset($_POST['id_subprog']) && $_POST['id_subprog'] !="" && $_POST['id_subprog'] !=0){
$id_subprog =$_POST['id_subprog'];
$tit2 = "por subprograma:$id_subprog<br>";
}else
{
$id_subprog =0;
$tit2 = '';
}

if(isset($_POST['id_area']) && $_POST['id_area'] !="" && $_POST['id_area'] !=0){
$id_area =$_POST['id_area'];
$tit4 = "por area:$id_area<br>";
}else
{
$id_area =0;
$tit4 = "";
}

if(isset($_POST['id_bandera']) && $_POST['id_bandera'] !="" && $_POST['id_bandera'] !=0){
$id_bandera =$_POST['id_bandera'];
$tit6 = "por bandera:$id_bandera<br>";
}else
{
$id_bandera =0;
$tit6 = "";
}

if(isset($_POST['proveedor']) && ($_POST['proveedor'] !="" && $_POST['proveedor'] !='0')){
$proveedor =$_POST['proveedor'];
$tit5 = "por proveedor:$proveedor<br>";

}else
{
$proveedor ="";
$tit5 = "";

}

if(isset($_POST['observa']) && $_POST['observa'] !=""){
$observa =$_POST['observa'];
$tit7 = "por observaciones:$observa<br>";

}else
{
$observa ="";
$tit7 = "";

}



$sql = "UPDATE  criterios set subprog='$id_subprog', partida='$id_partida' , area='$id_area', bandera='$id_bandera', proveedor='$proveedor', observa='$observa'  where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();


$titulo = "Informe de Ingresos por criterios $tit1$tit5$tit7";

/*$fecha1 = $post['fecha1'];
$fecha2 = $post['fecha2'];*/


$url = "http://localhost/spdgm/index.php/api/allIng?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->renderPartial('_rptIng', array(
			'model'=>$model,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'titulo'=>$titulo));

//echo CHtml::encode(print_r($_POST, true));
//$fecha1 = $_REQUEST['fecha1'];
/*$fecha2 = $_REQUEST['fecha2'];



echo $id_subprog;
echo $fecha2;



//$id_tipo = $_POST['id_tipo'];

//if(isset($id_tipo,$id_subprog)){

/*if(isset($id_subprog)){


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

	}*/
}

}