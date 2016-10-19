<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property integer $id
 * @property string $nombre
 * @property string $domicilio
 * @property string $colonia
 * @property string $telefono
 * @property string $codigo
 * @property string $rfc
 * @property string $curp
 * @property string $entidad
 * @property string $actividad
 */
class Proveedores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proveedores the static model class
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
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mail, nombre, domicilio, colonia, telefono, codigo, rfc, entidad, actividad', 'required'),
			array('curp, tipo, status', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mail, nombre, domicilio, colonia, telefono, codigo, rfc, curp, entidad, actividad', 'safe', 'on'=>'search'),
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
			'domicilio' => 'Domicilio',
			'colonia' => 'Colonia',
			'telefono' => 'Telefono',
			'codigo' => 'Codigo Postal',
			'rfc' => 'Rfc',
			'curp' => 'Curp',
			'entidad' => 'Ciudad',
			'actividad' => 'Actividad',
			'tipo' => 'Tipo',
			'status' => 'Estado',
			'mail' => 'Correo',
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
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('curp',$this->curp,true);
		$criteria->compare('entidad',$this->entidad,true);
		$criteria->compare('actividad',$this->actividad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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

					public function getOptions()
{
return CHtml::listData($this->findAll(),'id','nombre');
}			
}