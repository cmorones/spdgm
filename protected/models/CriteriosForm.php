<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CriteriosForm extends CFormModel
{
	public $proveedor;
	public $fecha1;
	public $fecha2;
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('proveedor, fecha1, fecha2', 'required'),
			// email has to be a valid email address
			
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'proveedor'=>'Proveedor',
			'fecha1'=>'Fecha de Inicio',
			'fecha2'=>'Fecha de Termino',
		);
	}
}