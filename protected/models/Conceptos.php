<?php

/**
 * This is the model class for table "conceptos".
 *
 * The followings are the available columns in table 'conceptos':
 * @property integer $id
 * @property string $nombre
 */
class Conceptos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Conceptos the static model class
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
		return 'conceptos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

				public function getOptions()
{
return CHtml::listData($this->findAll(),'id','nombre');
}

  public function suggest($keyword,$limit=20)
        {
                $models=$this->findAll(array(
                        'condition'=>'nombre LIKE :keyword',
                        'order'=>'nombre',
                        'limit'=>$limit,
                        'params'=>array(':keyword'=>"%$keyword%")
                ));
                $suggest=array();
                foreach($models as $model) {
                        $suggest[] = array(
                                'label'=>$model->nombre, // label for dropdown list
                                'value'=>$model->nombre, // value for input field
                                'id'=>$model->id, // return values from autocomplete
                               
                        );
                }
                return $suggest;
        }
}