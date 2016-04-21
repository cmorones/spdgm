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
 * @property integer $bandera
 * @property string $fecha_ingreso
 * @property integer $cladgam
 * @property integer $id_periodo
 * @property string $proveedor
 * @property string $rfc
 * @property integer $registro_pago
 * @property integer $validado
 * @property integer $tipo_prov
 * @property integer $tipo_op
 * @property string $id_fiscal
 * @property string $recidencia
 * @property string $nacionalidad
 * @property double $iva
 * @property double $subtotal
 * @property double $iva_ret
 * @property double $isr_ret
 * @property string $tasa
 *
 * The followings are the available model relations:
 * @property Subprog $subprog0
 */
class base extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return base the static model class
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
		return 'base_cap';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('importe_neto, importe_bruto, iva, subtotal, iva_ret, isr_ret, tasa', 'required'),
			array('folio, subprog, area, numerocheque, partida, bandera, cladgam, id_periodo, registro_pago, validado, tipo_prov, tipo_op', 'numerical', 'integerOnly'=>true),
			array('importe, iva, subtotal, iva_ret, isr_ret', 'numerical'),
			array('factura, concepto, cantidades, fecha_contrarecibo, no_contrarecibo, detalle, fecha_ingreso, proveedor, rfc, id_fiscal, recidencia, nacionalidad, tasa', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, folio, subprog, area, factura, importe, numerocheque, concepto, cantidades, partida, fecha_contrarecibo, no_contrarecibo, detalle, bandera, fecha_ingreso, cladgam, id_periodo, proveedor, rfc, registro_pago, validado, tipo_prov, tipo_op, id_fiscal, recidencia, nacionalidad, iva, subtotal, iva_ret, isr_ret, tasa', 'safe', 'on'=>'search'),
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
			'subprog0' => array(self::BELONGS_TO, 'Subprog', 'subprog'),
			'tipoProv' => array(self::BELONGS_TO, 'CatProv', 'tipo_prov'),
			'tipoOp' => array(self::BELONGS_TO, 'CatOp', 'tipo_op'),
			'tipoTasa' => array(self::BELONGS_TO, 'CatTasa', 'tasa'),
			'Partida' => array(self::BELONGS_TO, 'Partidas', 'partida'),
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
			'subprog' => 'Subprog',
			'area' => 'Area',
			'factura' => 'Factura',
			'importe' => 'Importe del gasto',
			'numerocheque' => 'Numerocheque',
			'concepto' => 'Concepto',
			'cantidades' => 'Cantidades',
			'partida' => 'Partida',
			'fecha_contrarecibo' => 'Fecha Contrarecibo',
			'no_contrarecibo' => 'No Contrarecibo',
			'detalle' => 'Detalle',
			'bandera' => 'Bandera',
			'fecha_ingreso' => 'Fecha Ingreso',
			'cladgam' => 'Cladgam',
			'id_periodo' => 'Id Periodo',
			'proveedor' => 'Proveedor',
			'rfc' => 'Rfc',
			'registro_pago' => 'Registro Pago',
			'validado' => 'Validado',
			'tipo_prov' => 'Tipo de Proveedor',
			'tipo_op' => 'Tipo de Operacion',
			'id_fiscal' => 'Id Fiscal',
			'recidencia' => 'Recidencia',
			'nacionalidad' => 'Nacionalidad',
			'iva' => 'Iva',
			'subtotal' => 'Subtotal',
			'iva_ret' => 'Retencion IVA',
			'isr_ret' => 'Retencion ISR',
			'tasa' => 'Tasa',
			'importe_bruto' => 'Importe Bruto',
			'importe_neto' => 'Importe Neto',
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

		$criteria=new CDbCriteria(array('condition' => 'partida<>731 and partida<>218'));

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
		$criteria->compare('proveedor',$this->proveedor,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('registro_pago',$this->registro_pago);
		$criteria->compare('validado',$this->validado);
		$criteria->compare('tipo_prov',$this->tipo_prov);
		$criteria->compare('tipo_op',$this->tipo_op);
		$criteria->compare('id_fiscal',$this->id_fiscal,true);
		$criteria->compare('recidencia',$this->recidencia,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('iva',$this->iva);
		$criteria->compare('subtotal',$this->subtotal);
		$criteria->compare('iva_ret',$this->iva_ret);
		$criteria->compare('isr_ret',$this->isr_ret);
		$criteria->compare('tasa',$this->tasa,true);
		$criteria->compare('importe_bruto',$this->importe_bruto,true);
		$criteria->compare('id_periodo',$id);
		//$criteria->condition='partida<>:partida';
       // $criteria->params=array(':partida'=>1);

		//$criteria->condition = 'partida<>:partida';
		//$criteria->params = array(':partida'=>731);
		//$criteria->condition ="partida <> 731";
		$criteria->order ="fecha_ingreso desc";
		//$criteria->condition = "partida <> 731";
		

		return new CActiveDataProvider($this, array(
			'pagination'=>array(
 			'pageSize'=>15
 			),
			'criteria'=>$criteria,
		));
	}
}