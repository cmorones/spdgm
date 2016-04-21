<?php

/**
 * This is the model class for table "catalogo_cuentas".
 *
 * The followings are the available columns in table 'catalogo_cuentas':
 * @property integer $id
 * @property integer $id_bandera
 * @property integer $id_tipo
 * @property integer $id_ejercicio
 */
class CatalogoCuentas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogoCuentas the static model class
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
		return 'catalogo_cuentas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bandera, id_tipo, id_ejercicio', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_bandera, id_tipo, id_ejercicio', 'safe', 'on'=>'search'),
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
			'Banderas' => array(self::BELONGS_TO, 'Banderas', 'id_bandera'),
			'Ejercicio' => array(self::BELONGS_TO, 'CatEjercicio', 'id_ejercicio'),
			'Tipo' => array(self::BELONGS_TO, 'CatCuentasIngresos', 'id_tipo'),
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
			'id_tipo' => 'Tipo de Cuenta',
			'id_ejercicio' => 'Ejercicio',
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
		$criteria->compare('id_tipo',$this->id_tipo);
		$criteria->compare('id_ejercicio',$this->id_ejercicio);

		
        $dataProvider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,

		));
		$dataProvider->setPagination(false);

		return $dataProvider;

	}
}