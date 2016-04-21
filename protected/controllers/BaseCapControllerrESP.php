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
				'actions'=>array('index','view','json'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','subprog','document','area','json','index2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','admin2','admin3','admin4','UserinputData','ajax','ajaxUpdate','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionJson(){  
    $this->layout=false;  
    $arr=array('Fruits'=>array('apples','orange'),'Vegetables'=>array('beans','carrot'));  
    header('Content-type: application/json');  
    echo json_encode($arr);  
    Yii::app()->end();  
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
		$model=new BaseCap;
		$b=new Pagos;


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


        $resultEjercicio = CatEjercicio::model()->findAll('estado=1 order by id desc');
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BaseCap']))
		{
			$model->attributes=$_POST['BaseCap'];
			$model->id_periodo=$id;
			if($model->save()){

			//	 $model_B->testid = $model->etestid;
   			//	 $bmodel_B->save()


				if($model->registro_pago==1){
				$b->id_base = $model->id;
				$b->proveedor =$model->proveedor;
				$b->detalle =$model->detalle;
				$b->importe =$model->importe;
				$b->cheque =$model->numerocheque;
				$b->factura =$model->factura;
				$b->fecha_contrarecibo =$model->fecha_contrarecibo;
				$b->no_contrarecibo =$model->no_contrarecibo;
				$b->id_periodo =$model->id_periodo;
				$b->folio =$model->folio;
				$b->pagado =2;
				


				$b->save();
			}
				Yii::app()->user->setFlash('success',"Folio: $model->folio registrado correctamente!");
				$this->redirect(array('admin','id'=>$model->id_periodo));
			}
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
			'pago'=>$pago,
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
		//$b=new Pagos;
		$sql = "SELECT id_periodo from base_cap where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();

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

		$resultado = Subprogramas::model()->findAll();
        $subprog = array();
        $subprog['falso'] = 'Selecciona un subprograma';
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
        $partidas['falso'] = 'Selecciona clave de Partida';
        foreach ($resulpartida as $key => $value) {
            $partidas[$value->codigo] = "$value->codigo";
        }

       $resultBanderas = Banderas::model()->findAll(array('order'=>'id'));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);



		if(isset($_POST['BaseCap']))
		{
			$model->attributes=$_POST['BaseCap'];

			if($model->save()){

			$cheque = intval($_POST['BaseCap']['numerocheque']);
			$complemento="";
			$fecharecibo = $_POST['BaseCap']['fecha_contrarecibo'];
 			if ($fecharecibo != ""){
 				$complemento= ",fecha_contrarecibo='$fecharecibo'";
 			}

			$no_contrarecibo = $_POST['BaseCap']['no_contrarecibo'];
			$q = "UPDATE pagos set cheque=$cheque, no_contrarecibo='$no_contrarecibo' $complemento  WHERE id_base=$model->id";
$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

		$sql = "SELECT id_periodo from base_cap where id=$id"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
		$this->redirect(array('admin','id'=>$ejercicio['id_periodo']));
		}
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
			'pago'=>$pago,
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
		$model=new BaseCap('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseCap']))
		$model->attributes=$_GET['BaseCap'];
		


		$this->render('admin',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	public function actionAdmin2()
	{
		$model=new BaseCap('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseCap']))
			$model->attributes=$_GET['BaseCap'];

	


		$this->render('admin2',array(
			'model'=>$model,
		));
	}

	public function actionAdmin4()
	{
		$model=new BaseCap('search4');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseCap']))
			$model->attributes=$_GET['BaseCap'];

	


		$this->render('admin4',array(
			'model'=>$model,
		));
	}

	public function actionAdmin3($id)
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



		$model=new BaseCap('search3');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseCap']))
			$model->attributes=$_GET['BaseCap'];

	


		$this->render('admin3',array(
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

	public function actionUserinputData($id){

		$item_id = (int)$id;
		$model = BaseCap::model()->findByPK($item_id);

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

			);
		echo CJSON::encode($res);
}

function actionAjax()
{

$id = $_POST['BaseCap']['id']; 

$q = "UPDATE base_cap set validado=1 WHERE id=$id";
$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

;

//$this->redirect(array('admin3'));
echo '<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Validado</strong>!!!.';

$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button1',
		'caption'=>'Aceptar',
		'value'=>'asd1',
		'htmlOptions'=>array('class'=>'btn btn-success'),
//		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));

echo '</div>';
//echo $id;

//echo CHtml::encode(print_r($_POST, true));
      
}
function actionAjaxUpdate()
{

$id = $_POST['BaseCap']['id'];
$importe = $_POST['BaseCap']['importe'];
$fecha_ingreso = $_POST['BaseCap']['fecha_ingreso'];
$folio = $_POST['BaseCap']['folio'];
$factura = $_POST['BaseCap']['factura'];
$proveedor = $_POST['BaseCap']['proveedor'];
$cladgam = $_POST['BaseCap']['cladgam']; 
$subprog = $_POST['BaseCap']['subprog'];
$area = $_POST['BaseCap']['area'];
$rfc = $_POST['BaseCap']['rfc']; 
$partida = $_POST['BaseCap']['partida']; 
$bandera = (int)$_POST['BaseCap']['bandera']; 
$numerocheque = (int)$_POST['BaseCap']['numerocheque'];
$concepto = $_POST['BaseCap']['concepto']; 
$cantidades = $_POST['BaseCap']['cantidades']; 
$fecha_contrarecibo = $_POST['BaseCap']['fecha_contrarecibo']; 
$no_contrarecibo = $_POST['BaseCap']['no_contrarecibo']; 
$detalle = $_POST['BaseCap']['detalle']; 
$id_periodo = $_POST['BaseCap']['id_periodo'];      


$q = "UPDATE base_cap set importe=$importe,
fecha_ingreso='$fecha_ingreso',
folio=$folio,
factura=$factura,
proveedor='$proveedor',
cladgam='$cladgam',
subprog='$subprog',
area='$area',
rfc='$rfc',
partida='$partida',
bandera='$bandera',
numerocheque=$numerocheque,
concepto='$concepto',
cantidades=$cantidades,
fecha_contrarecibo='$fecha_contrarecibo',
no_contrarecibo='$no_contrarecibo',
detalle='$detalle',
id_periodo=$id_periodo
WHERE id=$id";
$cmd = Yii::app()->db->createCommand($q);
//echo $cmd->getText();

$resultado = $cmd->query();

;

//$this->redirect(array('admin3'));
echo '<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Actualizado</strong>!!!.';

$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button1',
		'caption'=>'Aceptar',
		'value'=>'asd1',
		'htmlOptions'=>array('class'=>'btn btn-info'),
//		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));

echo '</div>';
//echo $id;

//echo CHtml::encode(print_r($_POST, true));
      
}		
}
