<?php

/**
 * This is the model class for table "libro_folios".
 *
 * The followings are the available columns in table 'libro_folios':
 * @property integer $id
 * @property integer $folio
 * @property string $fecha_ing
 * @property string $factura
 * @property double $importe
 * @property integer $numerocheque
 * @property integer $partida
 * @property string $fecha_contrarecibo
 * @property string $no_contrarecibo
 * @property string $detalle
 * @property integer $id_proveedor
 * @property integer $clasif
 * @property integer $tipo_docto
 */
class LibroFolios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LibroFolios the static model class
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
		return 'libro_folios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_ing, folio, importe, partida, factura, id_proveedor, detalle, id_periodo, bandera', 'required'),
			array('folio, clasif, tipo_docto, bandera, id_periodo', 'numerical', 'integerOnly'=>true),
			array('numerocheque,fecha_contrarecibo, no_contrarecibo', 'safe'),
			array('importe', 'numerical'),
			array('fecha_contrarecibo', 'default', 'value'=>null),

			//array('fecha_ing, factura, fecha_contrarecibo, no_contrarecibo, detalle', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, folio, fecha_ing, factura, importe, numerocheque, partida, fecha_contrarecibo, no_contrarecibo, detalle, id_proveedor, clasif, tipo_docto', 'safe', 'on'=>'search'),
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
			'Clasif'=>array(self::BELONGS_TO,'Clasif','clasif'),
			'ClaveDoctos'=>array(self::BELONGS_TO,'ClaveDoctos','tipo_docto'),
		//	'tipo' => array(self::BELONGS_TO, 'ClaveDoctos', 'id'),
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
			'fecha_ing' => 'Fecha Docto',
			'factura' => 'Factura',
			'importe' => 'Importe',
			'numerocheque' => 'Cheque',
			'partida' => 'Partida',
			'fecha_contrarecibo' => 'Fecha Contrarecibo',
			'no_contrarecibo' => 'No Contrarecibo',
			'detalle' => 'Observaciones',
			'id_proveedor' => 'Proveedores',
			'clasif' => 'Clasificacion',
			'tipo_docto' => 'Dto',
			'id_periodo' => 'Ejercicio',
			'bandera' => 'Bandera',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('fecha_ing',$this->fecha_ing);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('numerocheque',$this->numerocheque);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('id_proveedor',$this->id_proveedor);
		$criteria->compare('clasif',$this->clasif);
		$criteria->compare('tipo_docto',$this->tipo_docto);
		$criteria->compare('id_periodo',$id);
		$criteria->order ="id desc";
	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_periodo',20);
		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('fecha_ing',$this->fecha_ing,true);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('numerocheque',$this->numerocheque);
		$criteria->compare('partida',$this->partida);
		$criteria->compare('fecha_contrarecibo',$this->fecha_contrarecibo,true);
		$criteria->compare('no_contrarecibo',$this->no_contrarecibo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('id_proveedor',$this->id_proveedor);
		$criteria->compare('clasif',$this->clasif);
		$criteria->compare('tipo_docto',$this->tipo_docto);
		$criteria->compare('id_periodo',20);
		
	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	  public function suggest($keyword,$limit=20)
        {
              $id_periodo =Yii::app()->session['id_periodo'];
              /*  $models=$this->findAll(array(
                        'condition'=>"folio=$keyword",
                        'order'=>'folio',
                        'limit'=>$limit,
                      //  'params'=>array(':keyword'=>"%$keyword%")
                ));*/

               // $cadena =ereg_replace(' ','',$keyword);
                $cadena =$keyword;
                $models=$this->findAll(array(
                        'condition'=>"folio=:keyword and id_periodo=$id_periodo",
                        'order'=>'folio',
                        'limit'=>$limit,
                        'params'=>array(':keyword'=>"$cadena")
                ));
                $suggest=array();
                foreach($models as $model) {
                        $suggest[] = array(
                                'label'=>$model->folio.' - '.$model->id_proveedor, // label for dropdown list
                                'value'=>$model->folio, // value for input field
                                'id'=>$model->id, // return values from autocomplete
                                'fecha_ing'=>$model->fecha_ing,
                                'factura'=>$model->factura,
                                'tipo_docto'=>$model->tipo_docto,
                                'importe'=>$model->importe,
                                'bandera'=>$model->bandera,
                                'detalle'=>$model->detalle,
                                'id_proveedor'=>$model->id_proveedor,
                                'numerocheque'=>$model->numerocheque,
                                'fecha_contrarecibo'=>$model->fecha_contrarecibo,
                                'no_contrarecibo'=>$model->no_contrarecibo,
                                'clasif'=>$model->clasif,
                               
                        );
                }
                return $suggest;
        }
}