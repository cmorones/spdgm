<?php

class CatalogoCuentasController extends Controller
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
				'actions'=>array('create','update','mostrar','reqCuentas'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','mostrar','reqCuentas'),
				'users'=>array('admin'),
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
	public function actionCreate()
	{
		$model=new CatalogoCuentas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

		$resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        $resultEjercicio = CatCuentasIngresos::model()->findAll();
        $tipo = array();
        $tipo['falso'] = 'Selecciona un tipo de cuenta';
        foreach ($resultEjercicio as $key => $value) {
            $tipo[$value->id] = $value->nombre;
        }



		if(isset($_POST['CatalogoCuentas']))
		{
			$model->attributes=$_POST['CatalogoCuentas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'banderas'=>$banderas,
			'ejercicio'=>$ejercicio,
			'tipo'=>$tipo,
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

		$resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

		$resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        $resultEjercicio = CatCuentasIngresos::model()->findAll();
        $tipo = array();
        $tipo['falso'] = 'Selecciona un tipo de cuenta';
        foreach ($resultEjercicio as $key => $value) {
            $tipo[$value->id] = $value->nombre;
        }

		if(isset($_POST['CatalogoCuentas']))
		{
			$model->attributes=$_POST['CatalogoCuentas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'banderas'=>$banderas,
			'ejercicio'=>$ejercicio,
			'tipo'=>$tipo,
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
		$dataProvider=new CActiveDataProvider('CatalogoCuentas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionMostrar()
	{
				$this->render('_mostrar');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CatalogoCuentas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CatalogoCuentas']))
			$model->attributes=$_GET['CatalogoCuentas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CatalogoCuentas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CatalogoCuentas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CatalogoCuentas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='catalogo-cuentas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

public function actionReqCuentas() {
 //echo CHtml::encode(print_r($_POST, true));
//die();
if ($_POST['id_periodo'] != '')  {

	$sql = "SELECT nombre from cat_ejercicio where id=$_POST[id_periodo]"; 
	$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();

$model=new CatalogoCuentas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CatalogoCuentas']))
			$model->attributes=$_GET['CatalogoCuentas'];

		$this->renderPartial('admin',array(
			'model'=>$model,
			'id_periodo'=>$ejercicio['nombre'],
		));
	}
else {

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