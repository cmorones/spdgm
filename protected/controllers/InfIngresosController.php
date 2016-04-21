<?php

class InfIngresosController extends Controller
{
	public function actionIndex()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{

 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];


$this->render('_params',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
 $fecha1 ='';
 $fecha2 ='';

$this->render('_params',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2));

}

}




public function actionCuentas()
{

$filtro ="";//id_periodo = 2 and bandera=1 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($_POST['id_ejercicio'] !=0){
	$filtro .="id_periodo =$_POST[id_ejercicio] AND ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}


$q = "SELECT distinct bandera FROM 
  		     base_ing ".$filtro2."
		     order by bandera";


$cmd = Yii::app()->db->createCommand($q);
$resultado = $cmd->query();

    

    echo CHtml::tag('option',
                   array('value'=>0),'Todos',true);
foreach ($resultado as $row) 
    {


	$sql = "SELECT nombre from banderas where id=$row[bandera]"; 
	$band = Yii::app()->db->createCommand($sql)->queryRow();
        echo CHtml::tag('option',
                   array('value'=>$row['bandera']),CHtml::encode($band['nombre']),true);
    }
}



public function actionReqTest04() {
// echo CHtml::encode(print_r($_POST, true));
//$fecha1 = $_POST['fecha1'];
//$fecha2 = $_POST['fecha2'];
$id_ejercicio = $_POST['id_ejercicio'];
$id_trim = $_POST['id_trim'];
$id_tipo = $_POST['id_tipo'];
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

if(isset($id_ejercicio,$id_trim,$id_tipo,$fecha1,$fecha2)){

//echo $fecha1;
//echo $fecha2;


if (($id_ejercicio != '') && ($id_trim != '') && ($id_tipo != '') && ($fecha1 != '') && ($fecha2 != '')) {


$titulo = "Informe Presupuesto por Cuentas de Ingresos del $fecha1 al $fecha2";
//$titulo = "Informe por Presupuesto 2014";

$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo&fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'id_ejercicio'=>$id_ejercicio,
			'id_trim'=>$id_trim,
			'id_tipo'=>$id_tipo));

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