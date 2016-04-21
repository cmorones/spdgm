<?php

/**
 * This is the model class for table "folios".
 *
 * The followings are the available columns in table 'folios':
 * @property integer $id
 * @property integer $folio
 * @property string $fecha
 * @property integer $clave_doc
 * @property integer $id_area
 * @property double $importe
 * @property string $fecha_cr
 * @property string $no_cr
 * @property integer $no_cheque
 * @property integer $ingresos
 * @property integer $partida
 * @property string $factura
 * @property integer $id_proveedor
 * @property string $observaciones
 */
class Folios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Folios the static model class
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
		return 'folios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folio, clave_doc, id_area, no_cheque, ingresos, partida, id_proveedor', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('fecha, fecha_cr, no_cr, factura, observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, folio, fecha, clave_doc, id_area, importe, fecha_cr, no_cr, no_cheque, ingresos, partida, factura, id_proveedor, observaciones', 'safe', 'on'=>'search'),
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
			'folio' => 'Folio',
			'fecha' => 'Fecha',
			'clave_doc' => 'Clave Doc',
			'id_area' => 'Id Area',
			'importe' => 'Importe',
			'fecha_cr' => 'Fecha Cr',
			'no_cr' => 'No Cr',
			'no_cheque' => 'No Cheque',
			'ingresos' => 'Ingresos',
			'partida' => 'Partida',
			'factura' => 'Factura',
			'id_proveedor' => 'Id Proveedor',
			'observaciones' => 'Observaciones',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('clave_doc',$this->clave_doc);
		$criteria->compare('id_area',$this->id_area);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('fecha_cr',$this->fecha_cr,true);
		$criteria->compare('no_cr',$this->no_cr,true);
		$criteria->compare('no_cheque',$this->no_cheque);
		$criteria->compare('ingresos',$this->ingresos);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('id_proveedor',$this->id_proveedor);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}