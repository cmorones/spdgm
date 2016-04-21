<?php

class InformesgController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionInfo()
	{
		
   // echo date('H:i:s');
    //Yii::app()->end();
       //$model=new BaseCap;
		// $data = array();

		/*
		array {
 $resultado[0] {
  $resultado[0]['usuarios'] {
   $resultado[0]['usuarios']['id'] => '1'
   $resultado[0]['usuarios']['usuario'] => 'miusuario'
   $resultado[0]['usuarios']['password'] => 'mipassword'
   $resultado[0]['usuarios']['email'] => 'miemail'
  }
  $resultado[0]['ciudades'] {
   $resultado[0]['ciudades']['id'] => '2'
   $resultado[0]['ciudades']['ciudad'] => 'Bogotá'
  }
 }
}*/
        $data = $_POST['informe'];
        $json = array(); 

if ($data ==1) {

	$resultado = BaseCap::model()->findAll();
        $basecap = array();
       
        foreach ($resultado as $key => $row) {
         

		if( !isset( $json[$row["partida"]] ) ): 
			$json[$row["partida"]] = array(
			  'fecha_ingreso' => array(),
              'totalpartidas' => 0,
              'totalimporte' => 0
				);
		endif; 


		if( !isset($json[$row["partida"]]["fecha_ingreso"][$row["fecha_ingreso"]]) ): 
			$json[$row["partida"]]["fecha_ingreso"][$row["fecha_ingreso"]] = array(
				'importe' => $row["importe"], 
			//	'criterios' => array(),
				'totalimporte' => 0
			); 

		$json[$row["partida"]]["totalimporte"] = $json[$row["partida"]]["totalimporte"] + $json[$row["partida"]]["fecha_ingreso"][$row["fecha_ingreso"]]["importe"];
		endif; 
		$json[$row["partida"]]["totalpartidas"]++; 
        }


}
if ($data ==2) {

	$model=2;
}
if ($data ==3) {

	$model=3;
}

 
        $this->renderPartial('_informe', array(
			'model'=>$json));
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