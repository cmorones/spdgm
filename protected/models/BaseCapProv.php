<?php

/**
 * This is the model class for table "basecapprov".
 *
 * The followings are the available columns in table 'basecapprov':
 * @property integer $id
 * @property integer $id_folio
 * @property integer $id_proveedor
 */
class Basecapprov extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Basecapprov the static model class
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
		return 'basecapprov';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_folio, id_proveedor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_folio, id_proveedor', 'safe', 'on'=>'search'),
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
			'Proveedor' => array(self::BELONGS_TO, 'Proveedores', 'id_proveedor'),
			//'Subprog' => array(self::BELONGS_TO, 'Subprogramas', 'subprog'),
			//'Area'=>array(self::BELONGS_TO,'CatAreas','area'),
			//'ClaveDoctos'=>array(self::BELONGS_TO,'ClaveDoctos','cladgam'),
			//'Basecapprov'=>array(self::HAS_MANY,'Basecapprov','id_folio'),
			
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_folio' => 'Id Folio',
			'id_proveedor' => 'Id Proveedor',
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
		$criteria->compare('id_folio',$this->id_folio);
		$criteria->compare('id_proveedor',$this->id_proveedor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}