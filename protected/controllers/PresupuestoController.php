<?php

class PresupuestoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','trimestre'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','grupos', 'subprog','area','partida','partidas','reqMostrar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','admin2','admin3','admin4','delete','generar', 'eliminar','borrar','consulta','registro','registro2'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

		public function actionBorrar($id)
	{
		$model= Presupuesto::borrar($id);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('eliminar'));
	}
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function actionConsulta()
		{
if(isset($_POST['trim']))
{
 
 $trim   =$_POST['trim'];
 /*$fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];*/

$this->render('_addcons',array('trim'=>$trim));

} else {
 $trim =0;
// $fecha1 ='';
// $fecha2 ='';
$this->render('_addcons',array('trim'=>$trim));

}

	}

	public function actionGenerar()
		{

if(isset($_POST['id_periodo'],$_POST['id_trim']))
{
 
 $id_periodo   =$_POST['id_periodo'];
 $id_trim   =$_POST['id_trim'];

} else {
 $id_periodo =0;
 $id_trim =0;
}
// $fecha1 ='';
// $fecha2 ='';
$this->render('_addpresupuesto',array('id_periodo'=>$id_periodo,'id_trim'=>$id_trim));



	}

public function actionEliminar()
		{

$model= Presupuesto::listadoTrimestres();

$this->render('_deltrim',array('model'=>$model));



	}

	public function actionCreate($id)
	{
		$sql = "SELECT 
 
  id_periodo 
  
FROM 
  trimestres
WHERE 
  id =$id limit 1"; 
$periodo = Yii::app()->db->createCommand($sql)->queryRow();


		$model=new Presupuesto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$resultado = CatGrupos::model()->findAll();
        $grupos = array();
        $grupos['falso'] = 'Selecciona grupo';
        foreach ($resultado as $key => $value) {
            $grupos[$value->id] = $value->codigo;
        }

		$resultado = Subprogramas::model()->findAll('status=1',array('order'=>'id ASC'));
        $subprog = array();
        $subprog['falso'] = 'Selecciona subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->alias;
        }

         $resultadoarea = CatAreas::model()->findAll();
        $areas = array();
        $areas['falso'] = 'Selecciona un area';
        foreach ($resultadoarea as $key => $value) {
            $areas[$value->id] = $value->id;
        }

        $resulpartida = Partidas::model()->findAll();
        $partidas = array();
        $partidas['falso'] = 'Selecciona clave de Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo";
        }

        $resultEjercicio = CatEjercicio::model()->findAll('id=20');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        $resultEjercicio = Trimestres::model()->findAll('id_periodo=20');
        $trimestre = array();
        $trimestre['falso'] = 'Selecciona un trimestre';
        foreach ($resultEjercicio as $key => $value) {
            $trimestre[$value->id] = $value->nombre;
        }

          $resTipo = Tipo::model()->findAll();
        $tipo = array();
        $tipo['falso'] = 'Selecciona un tipo';
        foreach ($resTipo as $key => $value) {
            $tipo[$value->id] = $value->nombre;
        }

		if(isset($_POST['Presupuesto']))
		{
			$model->attributes=$_POST['Presupuesto'];
			$model->id_periodo=$periodo['id_periodo'];
			$model->id_trimestre=$id;
			$model->fecha_reg=date("Y-m-d H:i:s");

			if($model->save())
				$this->redirect(array('admin','id'=>$id));
		}

		$this->render('create',array(
			'model'=>$model,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'grupos'=>$grupos,
			'partidas'=>$partidas,
			'ejercicio'=>$ejercicio,
			'tipo'=>$tipo,
			'trimestre'=>$trimestre,
			'id_periodo'=>$periodo['id_periodo'],
			'id'=>$id,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$sql = "SELECT id_trimestre from presupuesto where id=$id"; 
	    
	    $trim = Yii::app()->db->createCommand($sql)->queryRow();


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$resultado = CatGrupos::model()->findAll();
        $grupos = array();
        $grupos['falso'] = 'Selecciona grupo';
        foreach ($resultado as $key => $value) {
            $grupos[$value->id] = $value->codigo;
        }

		$resultado = Subprogramas::model()->findAll('status=1');
        $subprog = array();
        $subprog['falso'] = 'Selecciona subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->alias;
        }

         $resultadoarea = CatAreas::model()->findAll();
        $areas = array();
        $areas['falso'] = 'Selecciona area';
        foreach ($resultadoarea as $key => $value) {
            $areas[$value->id] = $value->id;
        }

        $resulpartida = Partidas::model()->findAll();
        $partidas = array();
        $partidas['falso'] = 'Selecciona Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo";
        }

        $resultEjercicio = CatEjercicio::model()->findAll();
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

         $resultEjercicio = Trimestres::model()->findAll('id_periodo=2');
        $trimestre = array();
        $trimestre['falso'] = 'Selecciona un trimestre';
        foreach ($resultEjercicio as $key => $value) {
            $trimestre[$value->id] = $value->nombre;
        }

          $resTipo = Tipo::model()->findAll();
        $tipo = array();
        $tipo['falso'] = 'Selecciona un tipo';
        foreach ($resTipo as $key => $value) {
            $tipo[$value->id] = $value->nombre;
        }

		if(isset($_POST['Presupuesto']))
		{
			$model->attributes=$_POST['Presupuesto'];
			if($model->save())
				$this->redirect(array('admin','id'=>$trim['id_trimestre']));
		}

		$this->render('update',array(
			'model'=>$model,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'grupos'=>$grupos,
			'partidas'=>$partidas,
			'ejercicio'=>$ejercicio,
			'tipo'=>$tipo,
			'trimestre'=>$trimestre,
			'id'=>$id,
			'trim'=>$trim['id_trimestre'],
			));
			
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
public function actionIndex()
	{
		
		$criteria = new CDbCriteria();
		$criteria->order ="id desc";
        
		$model= CatEjercicio::model()->findAll($criteria);

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$model=new Presupuesto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presupuesto']))
			$model->attributes=$_GET['Presupuesto'];

		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	

	public function actionAdmin2()

	{

if(isset($_POST['id_periodo'],$_POST['id_trim']))
{
 
 $id_periodo   =$_POST['id_periodo'];
 $id_trim   =$_POST['id_trim'];

} else {
 $id_periodo =0;
 $id_trim =0;
}
		$model=new Presupuesto('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presupuesto']))
			$model->attributes=$_GET['Presupuesto'];

		$this->render('admin2',array(
			'model'=>$model,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
		));
	}

	public function actionAdmin3()

	{

if(isset($_POST['id_periodo'],$_POST['id_trim']))
{
 
 $id_periodo   =$_POST['id_periodo'];
 $id_trim   =$_POST['id_trim'];

} else {
 $id_periodo =0;
 $id_trim =0;
}
		$model=new Presupuesto();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presupuesto']))
			$model->attributes=$_GET['Presupuesto'];

		$this->render('admin3',array(
			'model'=>$model,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
		));
	}

		public function actionAdmin4()

	{

if(isset($_POST['id_periodo'],$_POST['id_trim']))
{
 
 $id_periodo   =$_POST['id_periodo'];
 $id_trim   =$_POST['id_trim'];

} else {
 $id_periodo =0;
 $id_trim =0;
}
		$model=new Presupuesto();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Presupuesto']))
			$model->attributes=$_GET['Presupuesto'];

		$this->render('admin4',array(
			'model'=>$model,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
		));
	}



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Presupuesto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Presupuesto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Presupuesto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='presupuesto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGrupos(){


  $val = $_POST['Presupuesto'];

  $agent = CatGrupos::model()->findByPK($val['grupo']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->codigo - </strong>
						$agent->nombre	
					</div>";
		
	}

	public function actionSubprog(){


  $val = $_POST['Presupuesto'];

  $agent = Subprogramas::model()->findByPK($val['subprog']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre  </strong>
							
					</div>";
		
	}

	public function actionArea(){


  $val = $_POST['Presupuesto'];

  $agent = CatAreas::model()->findByPK($val['area']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre  </strong>
							
					</div>";
		
	}

		public function actionPartida(){


  $val = $_POST['Presupuesto'];

  $agent = Partidas::model()->findByPK($val['partida']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->codigo - </strong>
						$agent->descripcion	
					</div>";
		
	}

	public function actionTrimestre2(){


  $val = $_POST['form']['id'];

  //$agent = Trimestres::model()->findByPK($val['id']);


  $lista= Trimestres::model()->findAll((array(
    'condition'=>"id_periodo=$val",
    'order'=>'nombre'
	)));
	//echo $agent-> university_name;

$lista = CHtml::listData($lista,'id','nombre');
foreach ($lista as $valor => $nombre) {
	# code...
	echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($nombre),true);
}
	 
		
	}


public function actionTrimestrex($id_periodo){

$resp = Trimestres::model()->findAllByAttributes(array('id_periodo'=>$id_periodo));
header("Content-type: application/json");
echo CJSON::encode($resp);
}

public function actionTrimestre()
{
  /* $data=Trimestres::model()->findAll('id_periodo=:id_periodo',array('order'=>'id desc'), 
                 array(':id_periodo'=>(int) $_POST['id_periodo']));*/
    $data =Trimestres::model()->findAll((array(
    'condition'=>"id_periodo=$_POST[id_periodo]",
    'order'=>'id'
	)));
 
    $data=CHtml::listData($data,'id','nombre');
    foreach($data as $value=>$nombre)
    {
        echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($nombre),true);
    }
}



public function actionPartidas()
{
   /* $data=BaseCap::model()->findAll('subprog=:id_subprog and id_periodo=:id_periodo and bandera=:bandera  group by partida', 
                  array(':id_subprog'=>(int) $_POST['id_subprog'],':id_periodo'=>2,':bandera'=>1));
 */
    
  /*$data=BaseCap::model()->findAll(
                              array(
                              'select'=>'partida',
                              'condition'=>"id_subprog=$_POST[id_subprog]",
                              'condition'=>'id_periodo=2',
                              'condition'=>'bandera=1',
                              'group'=>'partida'
                             )); 

    $data=CHtml::listData($data,'partida','partida');*/

/*
$q = "SELECT distinct partida
  		     FROM 
  		     base_cap 
  		     where 
  		     subprog=$_POST[id_subprog] and 
  		     bandera=1 and 
  		     id_periodo=2
		     order by partida";*/

//echo $fecha1;
$filtro ="id_periodo = $_POST[id_periodo] and bandera=1 AND ";
//$filtro .="fecha_ingreso between '$fecha1' and '$fecha2'  AND ";


if($_POST['id_subprog'] !=0){
	$filtro .="subprog =$_POST[id_subprog] AND ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}


$q = "SELECT distinct partida FROM 
  		     base_cap ".$filtro2."
		     order by partida";


$cmd = Yii::app()->db->createCommand($q);
$resultado = $cmd->query();

    

    echo CHtml::tag('option',
                   array('value'=>0),'Todos',true);
foreach ($resultado as $row) 
    {
        echo CHtml::tag('option',
                   array('value'=>$row['partida']),CHtml::encode($row['partida']),true);
    }
}


	
public function actionRegistro()
		{

$valores =0;
$this->render('_captura',array(
     'valores'=>$valores
	));

}

public function actionRegistro2()
		{
//echo print_r($_POST);
$valores =0;
$totalf2 =0;
$valores =$_POST['valores'];
$totalf2 =$_POST['totalf2'];
$this->render('_captura',array(
     'valores'=>$valores,
     'totalf2'=>$totalf2,
	));

}

public function actionReqMostrar() {
// echo CHtml::encodid_periodoe(print_r($_POST, true));
$id_periodo = $_POST['id_periodo'];
$id_trim = $_POST['id_trim'];
$id_partida = $_POST['id_partida'];

if(isset($id_periodo,$id_trim,$id_partida)){

//echo $fecha1;
//echo $fecha2;


if (($id_periodo != '') && ($id_trim != '') && ($id_partida != '')) {


$sql = "SELECT sum(presupuesto) as suma from presupuesto where id_trimestre=$id_trim and partida=$id_partida and id_periodo=$id_periodo"; 
$presupuesto = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT sum(presupuesto) as suma from presupuesto where id_trimestre=$id_trim and id_periodo=$id_periodo"; 
$presupuestototal = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT sum(presupuesto) as suma from presupuesto where id_trimestre=$id_trim and partida<>$id_partida and id_periodo=$id_periodo"; 
$presupuestoparical = Yii::app()->db->createCommand($sql)->queryRow();



$model = Presupuesto::model()->findAll((array(
    'condition'=>"id_trimestre=$id_trim and partida=$id_partida  and id_periodo=$id_periodo",
    'order'=>'subprog'
	)));

echo $id_trim;

echo $id_periodo;

echo $id_partida;

//die();

$titulo = "Registro de Presupuesto por partida";
//$titulo = "Informe por Presupuesto 2014";

/*$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);*/

//echo $model;
$this->renderPartial('_formpto', array(
			'model'=>$model,
			'titulo'=>$titulo,
			//'fecha1'=>$fecha1,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			'id_trim'=>$id_trim,
			'id_partida'=>$id_partida,
			'subtotal'=>$presupuesto['suma'],
			'total'=>$presupuestototal['suma'],
			'parcial'=>$presupuestoparical['suma']));

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

}
