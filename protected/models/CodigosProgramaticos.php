<?php

/**
 * This is the model class for table "codigos_programaticos".
 *
 * The followings are the available columns in table 'codigos_programaticos':
 * @property integer $id
 * @property integer $partida
 * @property integer $subprog
 * @property string $codigo
 * @property string $descripcion
 * @property string $clave
 */
class CodigosProgramaticos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodigosProgramaticos the static model class
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
		return 'codigos_programaticos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partida, subprog', 'numerical', 'integerOnly'=>true),
			array('codigo, descripcion, clave', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, partida, subprog, codigo, descripcion, clave', 'safe', 'on'=>'search'),
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
			'partida' => 'Partida',
			'subprog' => 'Subprog',
			'codigo' => 'Codigo',
			'descripcion' => 'Descripcion',
			'clave' => 'Clave',
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
		$criteria->compare('partida',$this->partida);
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('clave',$this->clave,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}