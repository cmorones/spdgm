<?php
/* @var $this BaseCapController */
/* @var $model BaseCap */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'base-cap-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<div class="row-fluid">
        <div class="span12">
            <div class="well">
            	  <div class="row-fluid">
                    <div class="span4">
						<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
						    <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_ingreso',

                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => '2013:2013'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_ingreso'); ?>
					</div>
					 <div class="span4">
                    	<?php echo $form->labelEx($model, 'cladgam'); ?>
						<?php echo $form->dropDownList($model, 'cladgam', $docto,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'cladgam'); ?>
	                </div>
	                 <div class="span4">
                    	
	                </div>
				</div>
               <div class="row-fluid">
                    <div class="span4">
						<?php echo $form->labelEx($model,'folio'); ?>
						<?php echo $form->textField($model,'folio'); ?>
						<?php echo $form->error($model,'folio'); ?>
					</div>
					 <div class="span4">
                    	<?php echo $form->labelEx($model, 'subprog'); ?>
						<?php echo $form->dropDownList($model, 'subprog', $subprog,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'subprog'); ?>
	                </div>
	                 <div class="span4">
                    	<?php echo $form->labelEx($model, 'area'); ?>
						<?php echo $form->dropDownList($model, 'area', $areas,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'area'); ?>
	                </div>
				</div>
				 <div class="row-fluid">
                    <div class="span8">
						<?php echo $form->labelEx($model,'factura'); ?>
						<?php echo $form->textField($model,'factura',array('class'=>'span8','size'=>80,'maxlength'=>64)); ?>
						<?php echo $form->error($model,'factura'); ?>
					</div>
					 <div class="span4">
                    <?php echo $form->labelEx($model,'importe'); ?>
					<?php echo $form->textField($model,'importe'); ?>
					<?php echo $form->error($model,'importe'); ?>
	                </div>
	              
				</div>
				 <div class="row-fluid">
                    <div class="span4">
							<?php echo $form->labelEx($model,'numerocheque'); ?>
							<?php echo $form->textField($model,'numerocheque'); ?>
							<?php echo $form->error($model,'numerocheque'); ?>
					</div>
					 <div class="span8">
                    		<?php echo $form->labelEx($model, 'concepto'); ?>
						<?php echo $form->dropDownList($model, 'concepto', $concepto,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'concepto'); ?>
	                </div>
	                
				</div>

				<div class="row-fluid">
					<div class="span8">
						<?php echo $model->concepto ?>
						</div>
						</div>
				 <div class="row-fluid">
                    <div class="span4">
							<?php echo $form->labelEx($model,'cantidades'); ?>
							<?php echo $form->textField($model,'cantidades'); ?>
							<?php echo $form->error($model,'cantidades'); ?>
					</div>
					 <div class="span8">
                    <?php echo $form->labelEx($model, 'partida'); ?>
						<?php echo $form->dropDownList($model, 'partida', $partidas,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'partida'); ?>
	                </div>
	                
				</div>
				<div class="row-fluid">
                    <div class="span4">
						<?php echo $form->labelEx($model,'fecha_contrarecibo'); ?>
						    <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha_contrarecibo',

                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                                'yearRange' => '2013:2013'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                //'class'=>'span12'
                               
                            ),
                        ));
                        ?>
						<?php echo $form->error($model,'fecha_contrarecibo'); ?>
					</div>
					 <div class="span4">
                    <?php echo $form->labelEx($model,'no_contrarecibo'); ?>
					<?php echo $form->textField($model,'no_contrarecibo'); ?>
					<?php echo $form->error($model,'no_contrarecibo'); ?>
	                </div>
	                 <div class="span4">
                  
	                </div>
	                
				</div>

				 <div class="row-fluid">
                    <div class="span8">
							<?php echo $form->labelEx($model,'detalle'); ?>
							<?php echo $form->textArea($model,'detalle', array('class'=>'span12','rows'=>"6", 'cols'=>"40")); ?>
							<?php echo $form->error($model,'detalle'); ?>
					</div>
					
	                
				</div>

					 <div class="row-fluid">
                    <div class="span8">
							<?php echo $form->labelEx($model, 'bandera'); ?>
						<?php echo $form->dropDownList($model, 'bandera', $banderas,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'bandera'); ?>
					</div>
					
	                
				</div>

					
				<div class="row-fluid">
                    
					<div class="span4">
						<?php echo $form->labelEx($model, 'id_periodo'); ?>
						<?php echo $form->dropDownList($model, 'id_periodo', $ejercicio,  array('class'=>'span12'));?>
 						<?php echo $form->error($model, 'id_periodo'); ?>
					</div>

				
					
	                
				</div>

				


			
				<div class="row-fluid">
					<div class="span8">
						<?php echo $model->proveedor ?>
</div>
</div>

			</div>
		</div>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array(
			'class' =>'btn btn-primary',
		)); ?>
	</div>

<?php $this->endWidget();

/*$q = "SELECT 
  proveedores.nombre,
  proveedores.rfc, 
  proveedores.actividad, 
  basecapprov.id_folio
FROM 
  public.base_cap, 
  public.basecapprov, 
  public.proveedores
WHERE 
  base_cap.folio = basecapprov.id_folio AND
  basecapprov.id_proveedor = proveedores.id AND
  basecapprov.id_folio =$model->folio";

//echo $q;
//die();

$cmd = Yii::app()->db->createCommand($q);
$result = $cmd->query();
*/


 ?>




<table class="table table-hover">
            <thead>
                <tr>
                   
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Actividad</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php //$j=1; ?>
                <?php //for($i=1; $i<=40; $i++){ ?>
                <?php foreach ($model->Basecapprov as $key => $value) {
                   $cmd = Yii::app()->db->createCommand();
					$cmd->select = '*';
					$cmd->from = 'proveedores';
					$cmd->where = "id= $value->id_proveedor";
					$row = $cmd->queryRow();



	//echo $row['nombre'] . '<br>';

?>
                    <tr>
                       
                         <td><?php echo  $row['nombre']; ?></td>
                          <td><?php echo $row['rfc']; ?></td>
                          <td><?php echo $row['actividad']; ?></td>
                          <td><?php echo $row['actividad']; ?></td>
                          <td><?php echo $row['actividad']; ?></td>

                      
                
                      
                </tr>
                
            <?php } ?>
           
            </tbody>
        </table>




<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mymodal',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Agregar proveedores',
		'width'=>400,
		'heigth'=>400,
		'autoOpen'=>false,
		'resizable'=>false,
		'modal'=>true,
		'overlay'=>array(
			'backgroundColor'=>'#000',
			'opacity'=>'0.5'	
			),		
	),
));

echo $this->renderPartial('//basecapprov/_form', array(
	'model'=>$model_proveedor,
	));

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link('Añadir Proveedor', '#', array(
	'class' =>'btn btn-primary',
	'onclick'=>'$("#mymodal").dialog("open"); return false;',
));

?>

</div>

