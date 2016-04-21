<?php

class LibroFoliosController extends Controller
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
				'actions'=>array('create','update','admin','admin2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new LibroFolios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$resultado = Clasif::model()->findAll();
        $clasif = array();
        $clasif['falso'] = 'Selecciona clasificacion';
        foreach ($resultado as $key => $value) {
            $clasif[$value->id] = $value->nombre;
        }

        $resultTipo = ClaveDoctos::model()->findAll();
        $tipodoc = array();
        $tipodoc['falso'] = 'Selecciona documento';
        foreach ($resultTipo as $key => $value) {
            $tipodoc[$value->id] = $value->nombre;
        }

         $resultEjercicio = CatEjercicio::model()->findAll('estado=1 order by id desc');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

          $resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

	

		if(isset($_POST['LibroFolios']))
		{
			$model->attributes=$_POST['LibroFolios'];
			$model->id_periodo=$id;
			if($model->save()){
				Yii::app()->user->setFlash('success',"Folio: $model->folio registrado correctamente!");
				$this->redirect(array('admin','id'=>$model->id_periodo));
			}
		}


		$this->render('create',array(
			'model'=>$model,
			'clasif'=>$clasif,
			'tipodoc'=>$tipodoc,
			'ejercicio'=>$ejercicio,
			'banderas'=>$banderas,
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
		$sql = "SELECT id_periodo from libro_folios where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();



		$resultado = Clasif::model()->findAll();
        $clasif = array();
        $clasif['falso'] = 'Selecciona clasificacion';
        foreach ($resultado as $key => $value) {
            $clasif[$value->id] = $value->nombre;
        }

        $resultTipo = ClaveDoctos::model()->findAll();
        $tipodoc = array();
        $tipodoc['falso'] = 'Selecciona documento';
        foreach ($resultTipo as $key => $value) {
            $tipodoc[$value->id] = $value->nombre;
        }

        $resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

          $resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

        $sql = "SELECT id_periodo from libro_folios where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();

		if(isset($_POST['LibroFolios']))
		{
			$model->attributes=$_POST['LibroFolios'];
			if($model->save())
		
				$this->redirect(array('admin','id'=>$ejercicio['id_periodo']));
		}

		$this->render('update',array(
			'model'=>$model,
			'clasif'=>$clasif,
			'tipodoc'=>$tipodoc,
			'ejercicio'=>$ejercicio,
			'banderas'=>$banderas,
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
		$model=new LibroFolios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LibroFolios']))
			$model->attributes=$_GET['LibroFolios'];

		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	public function actionAdmin2()
	{
		$model=new LibroFolios('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LibroFolios']))
			$model->attributes=$_GET['LibroFolios'];

		$this->render('admin2',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LibroFolios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LibroFolios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LibroFolios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='libro-folios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
