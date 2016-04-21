<?php

class InformeareaController extends Controller
{
	public function actionIndex()
		{
		//$model=new CriteriosForm;
		/*if(isset($_POST['CriteriosForm']))
		{
			$model->attributes=$_POST['CriteriosForm'];
			if($model->validate())
			{
			$this->render('_criterios',array('model'=>$model));
			}
		}
<?php echo print_r($_POST); ?>
		
		$this->render('_criterios',array('model'=>$model));*/

		//if(isset($_POST['CriteriosForm'])) {
// Send the email!
	    //$a->attributes=$_POST['CriteriosForm'];
		//$this->render('_criterios',array('id'=>$a->proveedor));
//} else {
if(isset($_POST['id']))
{
 $id =$_POST['id'];
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];
$this->render('_criteriosarea',array('id'=>$id, 'fecha1'=>$fecha1, 'fecha2'=>$fecha2));

} else {
$this->render('_criteriosarea');
}

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