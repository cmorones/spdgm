<?php

class InformesprovController extends Controller
{
	public function actionIndex()
		{
if(isset($_POST['fecha1'],$_POST['fecha2'],$_POST['id']))
{
 
 $id   =$_POST['id'];
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];

$this->render('_criteriosps',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'id'=>$id));

} else {
 $id ='';
 $fecha1 ='';
 $fecha2 ='';
$this->render('_criteriosps',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'id'=>$id));

}

	}


	public function actionFechas()
	{

		$resultado = BaseCap::model()->findAll();
        $data = array();
       $data["Informes por Partida"] = array();
      // $data["Informes por Subprograma"] = array();
      // $data["Informes por Area"] = array();
       
       $data=array(
  'Informes por fechas'=>array(
    '1'=>'Informe por proveedor',
   // '2'=>'181',
    //'3'=>'Tiga',
  ),

);
     
		$this->render('_rango',array('data'=>$data));
	}

	public function actionProveedor()
	{
	if(isset($_POST['fecha1'],$_POST['fecha2'],$_POST['id']))
{
 
 $id   =$_POST['id'];
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];

$this->render('_criteriosp',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'id'=>$id));

} else {
 $id ='';
 $fecha1 ='';
 $fecha2 ='';
$this->render('_criteriosp',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'id'=>$id));

}

	}


}