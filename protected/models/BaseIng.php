<?php

/**
 * This is the model class for table "base_cap".
 *
 * The followings are the available columns in table 'base_cap':
 * @property integer $id
 * @property integer $folio
 * @property integer $subprog
 * @property integer $area
 * @property string $factura
 * @property double $importe
 * @property integer $numerocheque
 * @property string $concepto
 * @property string $cantidades
 * @property integer $partida
 * @property string $fecha_contrarecibo
 * @property string $no_contrarecibo
 * @property string $detalle
 * @property string $bandera
 * @property string $fecha_ingreso
 * @property integer $id_proveedor
 * @property integer $cladgam
 *
 * The followings are the available model relations:
 * @property Partidas $partida0
 * @property Subprog $subprog0
 */
class BaseIng extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseCap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'base_ing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_ingreso,cladgam,folio, subprog,area, factura, importe, numerocheque, concepto,  partida, detalle, bandera,  id_periodo, proveedor, rfc', 'required'),
			array('cladgam,folio,subprog,area, numerocheque,  cantidades, partida, bandera,  id_periodo', 'numerical', 'integerOnly'=>true),
			array('cantidades, fecha_contrarecibo, no_contrarecibo,', 'safe'),
			array('fecha_contrarecibo', 'default', 'value'=>null),
			//array('folio, subprog, area, numerocheque, partida, id_proveedor, cladgam', 'numerical'concepto, cantidades, partida, 'integerOnly'=>true),
			//array('importe', 'numerical'),
			//array('factura, concepto, cantidades, fecha_contrarecibo, no_contrarecibo, detalle, bandera, fecha_ingreso', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, folio, subprog, area, factura, importe, numerocheque, concepto, cantidades, partida, fecha_contrarecibo, no_contrarecibo, detalle, bandera, fecha_ingreso, id_proveedor, cladgam', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Partida' => array(self::BELONGS_TO, 'Partidas', 'partida'),
			'Subprog' => array(self::BELONGS_TO, 'Subprogramas', 'subprog'),
			'Area'=>array(self::BELONGS_TO,'CatAreas','area'),
			'ClaveDoctos'=>array(self::BELONGS_TO,'ClaveDoctos','cladgam'),
			'Banderas'=>array(self::BELONGS_TO,'Banderas','bandera'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'folio' => 'Folio',
			'subprog' => 'Subprograma',
			'area' => 'Area',
			'factura' => 'Facturas',
			'importe' => 'Importe',
			'numerocheque' => 'No. de cheque',
			'concepto' => 'Concepto',
			'cantidades' => 'Cantidad',
			'partida' => 'Partida',
			'fecha_contrarecibo' => 'Fecha C/Recibo',
			'no_contrarecibo' => 'No. C/Recibo',
			'detalle' => 'Detalle',
			'bandera' => 'Bandera',
			'fecha_ingreso' => 'Fecha Ingreso',
			'cladgam' => 'Documento',
			'id_periodo' => 'Ejercicio',
			'proveedor' => 'Proveedor',
			'rfc' => 'Rfc',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('area',$this->area);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('numerocheque',$this->numerocheque);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('cantidades',$this->cantidades,true);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('bandera',$this->bandera);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('cladgam',$this->cladgam);
		$criteria->compare('proveedor',$this->proveedor);
		$criteria->compare('rfc',$this->rfc);
		$criteria->compare('id_periodo',$id);
		$criteria->order ="id desc";


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function search3()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('area',$this->area);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('numerocheque',$this->numerocheque);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('cantidades',$this->cantidades,true);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('bandera',$this->bandera);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('cladgam',$this->cladgam);
		$criteria->compare('id_periodo',20);
		$criteria->compare('proveedor',$this->proveedor);
		$criteria->compare('rfc',$this->rfc);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function search4($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('area',$this->area);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('numerocheque',$this->numerocheque);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('cantidades',$this->cantidades,true);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('bandera',$this->bandera);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('cladgam',$this->cladgam);
		$criteria->compare('id_periodo',$this->id_periodo);
		$criteria->compare('proveedor',$this->proveedor,true);
		$criteria->compare('rfc',$this->rfc);
		$criteria->compare('id_periodo',$id);
		$criteria->order ="id desc";
		//$criteria->addSearchCondition('id_periodo','2');

		//$criteria->condition = 'id_periodo=:id';
		//$criteria->params = array(':id' => 2);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
  				  'defaultOrder'=>'folio DESC',
 				 ),
			'pagination'=>array(
            'pageSize'=>5
	        ),
		));
	}

	public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='id_periodo=19'; 
		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('area',$this->area);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('numerocheque',$this->numerocheque);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('cantidades',$this->cantidades,true);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('bandera',$this->bandera,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('cladgam',$this->cladgam);
		$criteria->compare('id_periodo',$this->id_periodo);
		$criteria->compare('proveedor',$this->proveedor);
		$criteria->compare('rfc',$this->rfc);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='base-cap-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function getImagen(){
              $imagen="";
	//	$imagen="validado.png";
		if($this->validado=='1'){
		$imagen="correcto.png";
		}
			if($this->validado=='0'){
		$imagen="incorrecto.png";	
		}

		return Yii::app()->baseurl.'/images/'.$imagen;

	}
}
