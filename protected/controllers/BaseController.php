<?php

class BaseController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','infdiot','reqTest04','cons'),
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
	public function actionInfdiot()
		{
if(isset($_POST['fecha1'],$_POST['fecha2']))
{
 
 $area   =$_POST['id'];
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];
 // $id_bandera  =$_POST['id_bandera'];

$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'area'=>$area));

} else {
 $area =0;
 $fecha1 ='';
 $fecha2 ='';
 //$id_bandera   =0;
$this->render('_criterios',array('fecha1'=>$fecha1, 'fecha2'=>$fecha2, 'area'=>$area));

}

	}
	public function actionCreate()
	{
		$model=new base;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['base']))
		{
			$model->attributes=$_POST['base'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		$resultprov = CatProv::model()->findAll();
        $prov = array();
        $prov['falso'] = 'Selecciona';
        foreach ($resultprov as $key => $value) {
            $prov[$value->id] = $value->nombre;
        }

        $resultop = CatOp::model()->findAll();
        $tipop = array();
        $tipop['falso'] = 'Selecciona';
        foreach ($resultop as $key => $value) {
            $tipop[$value->id] = $value->nombre;
        }

        $resultasa = CatTasa::model()->findAll();
        $tasa = array();
        $tasa['falso'] = 'Selecciona';
        foreach ($resultasa as $key => $value) {
            $tasa[$value->id] = $value->nombre;
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['base']))
		{
			$model->attributes=$_POST['base'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id_periodo));
			
		}

		$this->render('update',array(
			'model'=>$model,
			'prov'=>$prov,
			'tipop'=>$tipop,
			'tasa'=>$tasa,
			'id'=>$id,
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
		$model=new base('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['base']))
			$model->attributes=$_GET['base'];

		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id
		));
	}

		public function actionCons($id)
	{
		$model = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and area=$area",
    'condition'=>"id_periodo=$id and partida<>731 and partida<>218",
    'order'=>'folio'
	)));

$titulo = "REVISIÓN CONTRA IMPORTE EN GASTOS";


	$this->render('_rptcons', array(
			'model'=>$model,
			'titulo'=>$titulo
		
			));	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return base the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=base::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param base $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='base-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


public function actionReqTest04() {
 //echo CHtml::encode(print_r($_POST, true));
 //die();
//$fecha1 = $_POST['fecha1'];
//$fecha2 = $_POST['fecha2'];$_POST['id'];

$fecha1 =$_POST['fecha1'];
$fecha2 =$_POST['fecha2'];
$id_periodo = $_POST['id_periodo'];




if(isset($fecha1,$fecha2,$id_periodo)){

//echo $fecha1;
//echo $fecha2;


if ( ($fecha1 != '') && ($fecha2 != '') && ($id_periodo != '')) {




	$titulo = "CÉDULA DE GASTOS PAGADOS EN EL MES PARA LA INTEGRACIÓN DE LA DECLARACIÓN INFORMATIVA DE OPERACIONES CON TERCEROS (DIOT) del $fecha1 al $fecha2<br>";


$model = BaseCap::model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and area=$area",
    'condition'=>"id_periodo=$id_periodo and partida<>731 and partida<>218 and (fecha_ingreso BETWEEN '$fecha1' AND '$fecha2')",
    'order'=>'fecha_ingreso'
	)));

//echo $model;
$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			//'fecha1'=>$fecha1,
			//'fecha2'=>$fecha2,
			'id_periodo'=>$id_periodo,
			//'id_trim'=>$id_trim,
		//	'id_subprog'=>$id_subprog
			));

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
