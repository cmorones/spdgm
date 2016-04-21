<?php

/**
 * This is the model class for table "subprog".
 *
 * The followings are the available columns in table 'subprog':
 * @property integer $id
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property BaseCap[] $baseCaps
 */
class Subprogramas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subprogramas the static model class
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
		return 'subprog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, status, alias, alias2', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, alias2', 'safe', 'on'=>'search'),
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
			'baseCaps' => array(self::HAS_MANY, 'BaseCap', 'subprog'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'status' => 'Status',
			'alias' => 'alias',
			'alias2' => 'alias2',
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
		$criteria->compare('nombre',$this->nombre,true);
		//$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function getOptions()
{
return CHtml::listData($this->findAll('status=1',array('order'=>'id asc')),'id','alias');
}
}