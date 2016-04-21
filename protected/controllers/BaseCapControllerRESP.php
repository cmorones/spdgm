<?php

class BaseCapController extends Controller
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
				'actions'=>array('index','view','ajax','document','subprog','area','partida'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','document','subprog','area','partida'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new BaseCap;

		
		$resultdoctos = ClaveDoctos::model()->findAll();
        $docto = array();
        $docto['falso'] = 'Selecciona';
        foreach ($resultdoctos as $key => $value) {
            $docto[$value->id] = $value->nombre;
        }

        $resultconcept = Conceptos::model()->findAll();
        $concepto = array();
        $concepto['falso'] = 'Selecciona';
        foreach ($resultconcept as $key => $value) {
            $concepto[$value->id] = $value->nombre;
        }


		$resultado = Subprogramas::model()->findAll();
        $subprog = array();
        $subprog['falso'] = 'Selecciona';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->id;
        }
         $resultadoarea = CatAreas::model()->findAll();
        $areas = array();
        $areas['falso'] = 'Selecciona';
        foreach ($resultadoarea as $key => $value) {
            $areas[$value->id] = $value->id;
        }

        $resultConceptos = Conceptos::model()->findAll();
        $conceptos = array();
        $conceptos['falso'] = 'Selecciona un concepto';
        foreach ($resultConceptos as $key => $value) {
            $conceptos[$value->id] = $value->nombre;
        }

        $resulpartida = Partidas::model()->findAll();
        $partidas = array();
        $partidas['falso'] = 'Selecciona';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = $value->codigo;
        }

        $resultBanderas = Banderas::model()->findAll();
        $banderas = array();
        $banderas['falso'] = 'Selecciona';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

        $resultEjercicio = CatEjercicio::model()->findAll();
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BaseCap']))
		{
			$model->attributes=$_POST['BaseCap'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'docto'=>$docto,
			'concepto'=>$concepto,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'partidas'=>$partidas,
			'banderas'=>$banderas,
			'ejercicio'=>$ejercicio,
		));
	}


	public function actionCreateX()
	{
		$model=new BaseCap;
		

		

		
		$resultdoctos = ClaveDoctos::model()->findAll();
        $docto = array();
        $docto['falso'] = 'Selecciona';
        foreach ($resultdoctos as $key => $value) {
            $docto[$value->id] = $value->nombre;
        }

        $resultconcept = Conceptos::model()->findAll();
        $concepto = array();
        $concepto['falso'] = 'Selecciona';
        foreach ($resultconcept as $key => $value) {
            $concepto[$value->id] = $value->nombre;
        }


		$resultado = Subprogramas::model()->findAll();
        $subprog = array();
        $subprog['falso'] = 'Selecciona';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->id;
        }
         $resultadoarea = CatAreas::model()->findAll();
        $areas = array();
        $areas['falso'] = 'Selecciona';
        foreach ($resultadoarea as $key => $value) {
            $areas[$value->id] = $value->id;
        }

        $resultConceptos = Conceptos::model()->findAll();
        $conceptos = array();
        $conceptos['falso'] = 'Selecciona un concepto';
        foreach ($resultConceptos as $key => $value) {
            $conceptos[$value->id] = $value->nombre;
        }

        $resulpartida = Partidas::model()->findAll();
        $partidas = array();
        $partidas['falso'] = 'Selecciona';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = $value->codigo;
        }

        $resultBanderas = Banderas::model()->findAll();
        $banderas = array();
        $banderas['falso'] = 'Selecciona';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

        $resultEjercicio = CatEjercicio::model()->findAll();
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }


      
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);



		if(isset($_POST['BaseCap']))
		{
		
			$model->attributes=$_POST['BaseCap'];

			$valid =$model->validate();
		if($valid){
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	}


		$this->render('create',array(
			'model'=>$model,
			'docto'=>$docto,
			'concepto'=>$concepto,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'partidas'=>$partidas,
			'banderas'=>$banderas,
			'ejercicio'=>$ejercicio,
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

		$model_proveedor=new Basecapprov();

		$this->performAjaxValidation(array($model,$model_proveedor));


		
		$resultdoctos = ClaveDoctos::model()->findAll();
        $docto = array();
        $docto['falso'] = 'Selecciona';
        foreach ($resultdoctos as $key => $value) {
            $docto[$value->id] = $value->nombre;
        }

        $resultconcept = Conceptos::model()->findAll();
        $concepto = array();
        $concepto['falso'] = 'Selecciona concepto';
        foreach ($resultconcept as $key => $value) {
            $concepto[$value->id] = $value->nombre;
        }


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$resultado = Subprogramas::model()->findAll();
        $subprog = array();
        $subprog['falso'] = 'Selecciona un subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->nombre;
        }
         $resultadoarea = CatAreas::model()->findAll();
        $areas = array();
        $areas['falso'] = 'Selecciona un area';
        foreach ($resultadoarea as $key => $value) {
            $areas[$value->id] = $value->nombre;
        }

        $resultConceptos = Conceptos::model()->findAll();
        $conceptos = array();
        $conceptos['falso'] = 'Selecciona un concepto';
        foreach ($resultConceptos as $key => $value) {
            $conceptos[$value->id] = $value->nombre;
        }

        $resulpartida = Partidas::model()->findAll();
        $partidas = array();
        $partidas['falso'] = 'Selecciona clave de Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo - $value->descripcion";
        }

        $resultBanderas = Banderas::model()->findAll();
        $banderas = array();
        $banderas['falso'] = 'Selecciona un grupo de gasto';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

         $resultProveedor = Proveedores::model()->findAll();
        $proveedores = array();
        $proveedores['falso'] = 'Selecciona un grupo de gasto';
        foreach ($resultProveedor as $key => $value) {
            $proveedores[$value->id] = "$value->nombre";
        }


        $resultEjercicio = CatEjercicio::model()->findAll();
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }
		
        if(isset($_POST['Basecapprov']))
		{
			$model_proveedor->attributes=$_POST['Basecapprov'];
			$model_proveedor->id_folio =$model->folio;

			//$model_proveedor->id_folio =1;
			$valid =$model_proveedor->validate();
			
			if($valid){
				if($model_proveedor->save()){
				
				$this->redirect(array('update', 'id' => $model->id));
				}

			}

		}

		
		if(isset($_POST['BaseCap']))
		{
			$model->attributes=$_POST['BaseCap'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'model_proveedor'=>$model_proveedor,
			'docto'=>$docto,
			'concepto'=>$concepto,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'conceptos'=>$conceptos,
			'partidas'=>$partidas,
			'banderas'=>$banderas,
			'proveedores'=>$proveedores,
			'ejercicio'=>$ejercicio,
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
		$dataProvider=new CActiveDataProvider('BaseCap');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BaseCap('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseCap']))
			$model->attributes=$_GET['BaseCap'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BaseCap the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BaseCap::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BaseCap $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='base-cap-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjax(){
    $request=trim($_GET['term']);
    if($request!=''){
        $model=Conceptos::model()->findAll(array("condition"=>"nombre like '$request%'"));
        $data=array();
        foreach($model as $get){
            $data[]=$get->name;
        }
        $this->layout='empty';
        echo json_encode($data);
    }

    
}

public function actionDocument(){


  $val = $_POST['BaseCap'];

  $agent = ClaveDoctos::model()->findByPK($val['cladgam']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre - </strong>
								$agent->detalle
					</div>";
		
	}

	public function actionSubprog(){


  $val = $_POST['BaseCap'];

  $agent = Subprogramas::model()->findByPK($val['subprog']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre  </strong>
							
					</div>";
		
	}

public function actionArea(){


  $val = $_POST['BaseCap'];

  $agent = CatAreas::model()->findByPK($val['area']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre  </strong>
							
					</div>";
		
	}

public function actionPartida(){


  $val = $_POST['BaseCap'];

  $agent = Partidas::model()->findByPK($val['partida']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->codigo - </strong>
						$agent->descripcion	
					</div>";
		
	}
}
