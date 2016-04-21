<?php

class BaseIngController extends Controller
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
				'actions'=>array('index','view','index2'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','subprog','document','area','partida','admin','admin2','admin3','admin4','UserinputData','ajax','ajax2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','admin2','delete'),
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
		$model=new BaseIng;

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

		$resultado = Subprogramas::model()->findAll('status=1',array('order'=>'id desc'));
        $subprog = array();
        $subprog['falso'] = 'Selecciona subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->alias;
        }
        $resultadoarea = CatAreas::model()->findAll(array('order'=>'id'));
        $areas = array();
        $areas['falso'] = 'Selecciona Area';
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
        $partidas['falso'] = 'Selecciona Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo";
        }

        $resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

         $resultProveedor = Proveedores::model()->findAll();
        $proveedores = array();
        $proveedores['falso'] = 'Selecciona un grupo de gasto';
        foreach ($resultProveedor as $key => $value) {
            $proveedores[$value->id] = "$value->nombre";
        }


        $resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BaseIng']))
		{
			$model->attributes=$_POST['BaseIng'];
			$model->id_periodo=$id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id_periodo));
		}

		$this->render('create',array(
			'model'=>$model,
			'docto'=>$docto,
			'concepto'=>$concepto,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'conceptos'=>$conceptos,
			'partidas'=>$partidas,
			'banderas'=>$banderas,
			'proveedores'=>$proveedores,
			'ejercicio'=>$ejercicio,
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

		$resultado = Subprogramas::model()->findAll('status=1',array('order'=>'id desc'));
        $subprog = array();
        $subprog['falso'] = 'Selecciona subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->alias;
        }
        $resultadoarea = CatAreas::model()->findAll(array('order'=>'id'));
        $areas = array();
        $areas['falso'] = 'Selecciona Area';
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
        $partidas['falso'] = 'Selecciona Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo";
        }

         $resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

         $resultProveedor = Proveedores::model()->findAll();
        $proveedores = array();
        $proveedores['falso'] = 'Selecciona un grupo de gasto';
        foreach ($resultProveedor as $key => $value) {
            $proveedores[$value->id] = "$value->nombre";
        }


        $resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $sql = "SELECT id_periodo from base_ing where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();


		if(isset($_POST['BaseIng']))
		{
			$model->attributes=$_POST['BaseIng'];
			if($model->save())
		//$sql = "SELECT id_periodo from base_ing where id=$id"; 
	    //$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
		$this->redirect(array('admin','id'=>$ejercicio['id_periodo']));
		}

		$this->render('update',array(
			'model'=>$model,
			'docto'=>$docto,
			'concepto'=>$concepto,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'conceptos'=>$conceptos,
			'partidas'=>$partidas,
			'banderas'=>$banderas,
			'proveedores'=>$proveedores,
			'ejercicio'=>$ejercicio,
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

	public function actionIndex2()
	{
		
		$criteria = new CDbCriteria();
		$criteria->order ="id desc";
        
		$model= CatEjercicio::model()->findAll($criteria);

		$this->render('index2',array(
			'model'=>$model,
		));
	}
  

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$model=new BaseIng('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseIng']))
			$model->attributes=$_GET['BaseIng'];

		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	public function actionAdmin2()
	{
		$model=new BaseIng('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseIng']))
			$model->attributes=$_GET['BaseIng'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

		public function actionAdmin3()
	{
		$model=new BaseIng('search3');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseIng']))
			$model->attributes=$_GET['BaseIng'];

		$this->render('admin3',array(
			'model'=>$model,
		));
	}

	public function actionAdmin4($id)
	{
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

		$resultado = Subprogramas::model()->findAll('status=1',array('order'=>'id desc'));
        $subprog = array();
        $subprog['falso'] = 'Selecciona subprograma';
        foreach ($resultado as $key => $value) {
            $subprog[$value->id] = $value->id;
        }
         $resultadoarea = CatAreas::model()->findAll(array('order'=>'id'));
        $areas = array();
        $areas['falso'] = 'Selecciona Area';
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
        $partidas['falso'] = 'Selecciona Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo";
        }

        $resultBanderas = Banderas::model()->findAll('status=1',array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }

         $resultProveedor = Proveedores::model()->findAll();
        $proveedores = array();
        $proveedores['falso'] = 'Selecciona un grupo de gasto';
        foreach ($resultProveedor as $key => $value) {
            $proveedores[$value->id] = "$value->nombre";
        }


        $resultEjercicio = CatEjercicio::model()->findAll('estado=1');
        $ejercicio = array();
        $ejercicio['falso'] = 'Selecciona un ejercicio';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        $resultPago = CatPago::model()->findAll();
        $pago = array();
        $pago['falso'] = 'Generar Pago';
        foreach ($resultPago as $key => $value) {
            $pago[$value->id] = $value->nombre;
        }



		$model=new BaseIng('search4');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseIng']))
			$model->attributes=$_GET['BaseIng'];

	


		$this->render('admin4',array(
			'model'=>$model,
			'docto'=>$docto,
			'concepto'=>$concepto,
			'subprog'=>$subprog,
			'areas'=>$areas,
			'conceptos'=>$conceptos,
			'partidas'=>$partidas,
			'banderas'=>$banderas,
			'proveedores'=>$proveedores,
			'ejercicio'=>$ejercicio,
			'pago'=>$pago,
			'id'=>$id,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BaseIng the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BaseIng::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BaseIng $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='base-cap-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


public function actionDocument(){


  $val = $_POST['BaseIng'];

  $agent = ClaveDoctos::model()->findByPK($val['cladgam']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre - </strong>
								$agent->detalle
					</div>";
		
	}

	public function actionSubprog(){


  $val = $_POST['BaseIng'];

  $agent = Subprogramas::model()->findByPK($val['subprog']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre  </strong>
							
					</div>";
		
	}

	public function actionArea(){


  $val = $_POST['BaseIng'];

  $agent = CatAreas::model()->findByPK($val['area']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->nombre  </strong>
							
					</div>";
		
	}

	public function actionPartida(){


  $val = $_POST['BaseIng'];

  $agent = Partidas::model()->findByPK($val['partida']);
	//echo $agent-> university_name;


	 echo "<div class=\"alert alert-success\">
						<button class=\"close\" data-dismiss=\"alert\" type=\"button\">×</button>
						<strong>$agent->codigo - </strong>
						$agent->descripcion	
					</div>";
		
	}


	public function actionUserinputData($id){

		$item_id = (int)$id;
		$model = BaseIng::model()->findByPK($item_id);

		$res = array (
			  'id'=>$model->id,
			  'fecha_ingreso'=>$model->fecha_ingreso,
			  'folio'=>$model->folio,
			  'factura'=>$model->factura,
			  'proveedor'=>$model->proveedor,
			  'cladgam'=>$model->cladgam,
			  'importe'=>$model->importe,
			  'subprog'=>$model->subprog,
			  'area'=>$model->area,
			  'rfc'=>$model->rfc,
			  'partida'=>$model->partida,
			  'bandera'=>$model->bandera,
			  'numerocheque'=>$model->numerocheque,
			  'concepto'=>$model->concepto,
			  'cantidades'=>$model->cantidades,
			  'fecha_contrarecibo'=>$model->fecha_contrarecibo,
			  'no_contrarecibo'=>$model->no_contrarecibo,
			  'detalle'=>$model->detalle,
			  'id_periodo'=>$model->id_periodo,
			  'validado'=>$model->validado,

			);
		echo CJSON::encode($res);
}


function actionAjax()
{

$id = $_POST['BaseIng']['id']; 

$q = "UPDATE base_ing set validado=1 WHERE id=$id";
$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

;

//$this->redirect(array('admin3'));
echo '<div class="info2 alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Validado</strong>!!!.';
 echo '</div>';

$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button1',
		'caption'=>'Aceptar',
		'value'=>'asd1',
		'htmlOptions'=>array('class'=>'btn btn-success'),
//		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));


//echo $id;

//echo CHtml::encode(print_r($_POST, true));
      
}

function actionAjax2()
{

$id = $_POST['BaseIng']['id']; 

$q = "UPDATE base_ing set validado=0 WHERE id=$id";
$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

;

//$this->redirect(array('admin3'));
echo '<div class="info2 alert alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Desvalidado</strong>!!!.';
 echo '</div>';

$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button1',
		'caption'=>'Aceptar',
		'value'=>'asd1',
		'htmlOptions'=>array('class'=>'btn btn-danger'),
//		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));


//echo $id;

//echo CHtml::encode(print_r($_POST, true));
      
}
}
