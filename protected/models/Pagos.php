<?php

/**
 * This is the model class for table "pagos".
 *
 * The followings are the available columns in table 'pagos':
 * @property integer $id
 * @property integer $id_base
 * @property string $proveedor
 * @property string $detalle
 * @property double $importe
 * @property integer $tipo_persona
 * @property integer $pagado
 * @property string $fecha_recibo
 * @property string $fecha_pago
 * @property integer $cheque
 * @property string $factura
 * @property string $fecha_contrarecibo
 * @property string $no_contrarecibo
 * @property string $fecha_cheque
 * @property integer $banco
 * @property integer $depto
 * @property integer $id_periodo
 */
class Pagos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pagos the static model class
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
		return 'pagos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_base, pagado, cheque, depto, id_periodo, folio, clasificacion', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('proveedor, importe, folio, fecha_contrarecibo, clasificacion', 'required'),
			array('proveedor, folio, detalle, fecha_recibo, fecha_pago, banco, factura, fecha_contrarecibo, no_contrarecibo, fecha_cheque', 'safe'),
			array('fecha_recibo,  folio, fecha_pago,fecha_contrarecibo,fecha_cheque', 'default', 'value'=>null),
			array('banco, depto','numerical',
				    'integerOnly'=>true,
				    'min'=>1,
				   // 'max'=>250,
				    'tooSmall'=>'Debe selecionar'),
				   // 'tooBig'=>'You cannot order more than 250 pieces at once'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, folio, id_base, proveedor, detalle, importe, tipo_persona, pagado, fecha_recibo, fecha_pago, cheque, factura, fecha_contrarecibo, no_contrarecibo, fecha_cheque, banco, depto, id_periodo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_base' => 'IdBasecap',
			'proveedor' => 'Proveedor',
			'detalle' => 'Detalle',
			'importe' => 'Importe',
			'tipo_persona' => 'Tipo Persona',
			'pagado' => 'Pagado',
			'fecha_recibo' => 'Fecha Recibo',
			'fecha_pago' => 'Fecha Pago',
			'cheque' => 'Cheque',
			'factura' => 'Factura',
			'fecha_contrarecibo' => 'Fecha Contrarecibo',
			'no_contrarecibo' => 'No Contrarecibo',
			'fecha_cheque' => 'Fecha Cheque',
			'banco' => 'Banco',
			'depto' => 'Depto',
			'id_periodo' => 'Ejercicio',
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
		$criteria->compare('id_base',$this->id_base);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('proveedor',$this->proveedor,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('tipo_persona',$this->tipo_persona);
		$criteria->compare('fecha_recibo',$this->fecha_recibo,true);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('cheque',$this->cheque);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('fecha_cheque',$this->fecha_cheque,true);
		$criteria->compare('banco',$this->banco);
		$criteria->compare('depto',$this->depto);
		$criteria->compare('id_periodo',$id);
		$criteria->compare('pagado',1);
		$criteria->order ="id desc";
		
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function searchp($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_base',$this->id_base);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('proveedor',$this->proveedor,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('tipo_persona',$this->tipo_persona);
		$criteria->compare('fecha_recibo',$this->fecha_recibo,true);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('cheque',$this->cheque);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('fecha_cheque',$this->fecha_cheque,true);
		$criteria->compare('banco',$this->banco);
		$criteria->compare('depto',$this->depto);
		$criteria->compare('id_periodo',$id);
		$criteria->compare('pagado',1);
		$criteria->order ="id desc";
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search2($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_base',$this->id_base);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('proveedor',$this->proveedor,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('tipo_persona',$this->tipo_persona);
		$criteria->compare('pagado',$this->pagado);
		$criteria->compare('fecha_recibo',$this->fecha_recibo,true);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('cheque',$this->cheque);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('fecha_cheque',$this->fecha_cheque,true);
		$criteria->compare('banco',$this->banco);
		$criteria->compare('depto',$this->depto);
		$criteria->compare('id_periodo',$id);
		$criteria->compare('pagado',2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getImagen(){

	//	$imagen="validado.png";
          $imagen="";
		if($this->pagado=='1'){
		$imagen="validado.png";
		}
		if($this->pagado=='2'){
		$imagen="warning.png";	
		}

		return Yii::app()->baseurl.'/images/'.$imagen;

	}
}
