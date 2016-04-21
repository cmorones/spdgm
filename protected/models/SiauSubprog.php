<?php

/**
 * This is the model class for table "siau_subprog".
 *
 * The followings are the available columns in table 'siau_subprog':
 * @property integer $id
 * @property integer $subprog
 * @property integer $partida
 * @property double $asignado
 * @property double $autorizado
 * @property double $disponible
 * @property double $cuentasxpagar
 * @property double $ejercido
 * @property double $ingresos_extra
 * @property string $fecha_reg
 * @property string $fecha_mod
 */
class SiauSubprog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiauSubprog the static model class
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
		return 'siau_subprog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subprog, partida', 'numerical', 'integerOnly'=>true),
			array('asignado, autorizado, disponible, cuentasxpagar, ejercido, ingresos_extra', 'numerical'),
			array('fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subprog, partida, asignado, autorizado, disponible, cuentasxpagar, ejercido, ingresos_extra, fecha_reg, fecha_mod', 'safe', 'on'=>'search'),
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
			'subprog' => 'Subprog',
			'partida' => 'Partida',
			'asignado' => 'Asignado',
			'autorizado' => 'Autorizado',
			'disponible' => 'Disponible',
			'cuentasxpagar' => 'Cuentasxpagar',
			'ejercido' => 'Ejercido',
			'ingresos_extra' => 'Ingresos Extra',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
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
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('asignado',$this->asignado);
		$criteria->compare('autorizado',$this->autorizado);
		$criteria->compare('disponible',$this->disponible);
		$criteria->compare('cuentasxpagar',$this->cuentasxpagar);
		$criteria->compare('ejercido',$this->ejercido);
		$criteria->compare('ingresos_extra',$this->ingresos_extra);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}