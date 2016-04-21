<?php

/**
 * This is the model class for table "presupuesto".
 *
 * The followings are the available columns in table 'presupuesto':
 * @property integer $id
 * @property integer $grupo
 * @property integer $subprog
 * @property integer $partida
 * @property integer $tipo
 * @property integer $area
 * @property double $presupuesto
 * @property double $gasto
 * @property double $disponible
 * @property string $fecha_reg
 * @property string $oficio
 * @property integer $id_mes
 * @property integer $id_periodo
 */
class Presupuesto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Presupuesto the static model class
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
		return 'presupuesto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, area,grupo, subprog, partida,presupuesto, gasto, disponible, fecha_reg, id_periodo', 'required'),
			array('grupo,subprog, partida, tipo, area, presupuesto,gasto, disponible, id_periodo', 'numerical', 'integerOnly'=>true),

			array('fecha_reg, oficio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, grupo, subprog, partida, tipo, area, presupuesto, gasto, disponible, fecha_reg, oficio, id_periodo', 'safe', 'on'=>'search'),
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

			'Grupo'=>array(self::BELONGS_TO,'CatGrupos','grupo'),
			'Partida'=>array(self::BELONGS_TO,'Partidas','partida'),
			//'Area'=>array(self::BELONGS_TO,'CatAreas','area'),
			'Subprog'=>array(self::BELONGS_TO,'Subprogramas','subprog'),
			'Tipo'=>array(self::BELONGS_TO,'Tipo','tipo'),
			'Ejercicio'=>array(self::BELONGS_TO,'CatEjercicio','id_periodo'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'grupo' => 'Grupo',
			'subprog' => 'Subprog',
			'partida' => 'Partida',
			'tipo' => 'Tipo',
			'area' => 'Area',
			'presupuesto' => 'Presupuesto',
			'gasto' => 'Gasto',
			'disponible' => 'Disponible',
			'fecha_reg' => 'Fecha',
			'oficio' => 'Oficio',
		    'id_periodo' => 'Ejercicio',
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
		$criteria->compare('grupo',$this->grupo);
		$criteria->compare('subprog',$this->subprog);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('area',$this->area);
		$criteria->compare('presupuesto',$this->presupuesto);
		$criteria->compare('gasto',$this->gasto);
		$criteria->compare('disponible',$this->disponible);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('oficio',$this->oficio,true);
		$criteria->compare('id_periodo',$this->id_periodo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}