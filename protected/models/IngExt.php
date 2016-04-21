<?php

/**
 * This is the model class for table "ing_ext".
 *
 * The followings are the available columns in table 'ing_ext':
 * @property integer $id
 * @property integer $id_bandera
 * @property double $saldo_anterior
 * @property double $cargos
 * @property double $abonos
 * @property double $saldo_actual
 * @property integer $estado
 * @property integer $id_ejercicio
 */
class IngExt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IngExt the static model class
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
		return 'ing_ext';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_ing', 'required'),
			array('id_bandera, estado, id_ejercicio', 'numerical', 'integerOnly'=>true),
			array('saldo_anterior, cargos, abonos, saldo_actual', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_bandera, saldo_anterior, cargos, abonos, saldo_actual, estado, id_ejercicio', 'safe', 'on'=>'search'),
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
			'Banderas'=>array(self::BELONGS_TO,'Banderas','id_bandera'),
			'Estados'=>array(self::BELONGS_TO,'TipoIngext','estado'),
			'Ejercicio'=>array(self::BELONGS_TO,'CatEjercicio','id_ejercicio')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_bandera' => 'Cuenta',
			'saldo_anterior' => 'Saldo Anterior',
			'cargos' => 'Cargos',
			'abonos' => 'Abonos',
			'saldo_actual' => 'Saldo Actual',
			'estado' => 'Estado',
			'id_ejercicio' => 'Ejercicio',
			'fecha_ing' => 'Fecha ingreso',
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
		$criteria->compare('id_bandera',$this->id_bandera);
		$criteria->compare('saldo_anterior',$this->saldo_anterior);
		$criteria->compare('cargos',$this->cargos);
		$criteria->compare('abonos',$this->abonos);
		$criteria->compare('saldo_actual',$this->saldo_actual);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('id_ejercicio',$this->id_ejercicio);
		$criteria->compare('fecha_ing',$this->fecha_ing,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>20),

		));
	}
}