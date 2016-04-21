<?php

class PagosController extends Controller
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
				'actions'=>array('create','update','poliza','imprimir'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','admin2'),
				'users'=>array('admin','admin2'),
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
	public function actionCreate($id)
	{
		$model=new Pagos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$resultado = Clasif::model()->findAll();
        $clasif = array();
        $clasif['falso'] = 'Selecciona clasificacion';
        foreach ($resultado as $key => $value) {
            $clasif[$value->id] = $value->nombre;
        }

		$resultbancos = CatBancos::model()->findAll();
        $bancos = array();
        $bancos[0] = 'Seleccionar banco';
        foreach ($resultbancos as $key => $value) {
            $bancos[$value->id] = $value->nombre;
        }

        $resultareas = CatAreas::model()->findAll();
        $areas = array();
        $areas[0] = 'Seleccionar Area';
        foreach ($resultareas as $key => $value) {
            $areas[$value->id] = $value->nombre;
        }
		
		$resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

		if(isset($_POST['Pagos']))
		{
			$model->attributes=$_POST['Pagos'];
			$model->id_periodo=$id;
			if($model->save())
				$this->redirect(array('index','id'=>$model->id_periodo));
		}

		$this->render('create',array(
			'model'=>$model,
			'clasificacion'=>$clasif,
			'ejercicio'=>$ejercicio,
			'bancos'=>$bancos,
			'areas'=>$areas,
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

	


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$resultado = Clasif::model()->findAll();
        $clasif = array();
        $clasif['falso'] = 'Selecciona clasificacion';
        foreach ($resultado as $key => $value) {
            $clasif[$value->id] = $value->nombre;
        }


		$resultbancos = CatBancos::model()->findAll();
        $bancos = array();
        $bancos[0] = 'Seleccionar banco';
        foreach ($resultbancos as $key => $value) {
            $bancos[$value->id] = $value->nombre;
        }

        $resultareas = CatAreas::model()->findAll();
        $areas = array();
        $areas[0] = 'Seleccionar Area';
        foreach ($resultareas as $key => $value) {
            $areas[$value->id] = $value->nombre;
        }

		  $resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        $sql = "SELECT id_periodo from pagos where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();

		if(isset($_POST['Pagos']))
		{
			$model->attributes=$_POST['Pagos'];

			if($model->save())
		//$sql = "SELECT id_periodo from pagos where id=$id"; 
	    //$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
		$this->redirect(array('index'));
		
		}

		$this->render('update',array(
			'model'=>$model,
			'clasificacion'=>$clasif,
			'ejercicio'=>$ejercicio,
			'bancos'=>$bancos,
			'areas'=>$areas,
			'id'=>$id,
			'id_periodo'=>$ejercicio['id_periodo'],
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);

	    $sql1 = "UPDATE base_cap set registro_pago=2 WHERE id=$model->id_base";
		$cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();


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
			'model'=>$model
		));
	}
  

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$model=new Pagos('searchp');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pagos']))
			$model->attributes=$_GET['Pagos'];

		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	public function actionAdminPagados($id)
	{
		$model=new Pagos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pagos']))
			$model->attributes=$_GET['Pagos'];

		$this->render('admin_p',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

		public function actionAdmin2($id)
	{
		$model=new Pagos('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pagos']))
			$model->attributes=$_GET['Pagos'];

		$this->render('admin2',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pagos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pagos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pagos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pagos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPoliza($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

	
		$this->render('_polizas',array(
			'model'=>$model,
			'id'=>$id,
		));
	}


	public function actionImprimir() {

if(isset($_POST['id']) && $_POST['id'] !="" && $_POST['id'] !=0){
$id =$_POST['id'];
}else
{
$error=false;
}
if(isset($_POST['cuenta']) && $_POST['cuenta'] !="" && $_POST['cuenta'] !=0){
$cuenta =$_POST['cuenta'];
}else
{
$error=false;
}
/*
if(isset($_POST['id_area']) && $_POST['id_area'] !="" && $_POST['id_area'] !=0){
$id_area =$_POST['id_area'];
$tit4 = "por area:$id_area<br>";
}else
{
$id_area =0;
$tit4 = "";
}
if(isset($_POST['proveedor']) && ($_POST['proveedor'] !="" && $_POST['proveedor'] !='0')){
$proveedor =$_POST['proveedor'];
$tit5 = "por proveedor:$proveedor<br>";

}else
{
$proveedor ="";
$tit5 = "";

}*/

$this->renderPartial('_imprimir',array(
	'id'=>$id,
	'cuenta'=>$cuenta
	));

	}
}
