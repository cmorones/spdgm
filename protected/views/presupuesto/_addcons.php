

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Consulta de Presupuesto por Trimestre
 </div>
<div class="form">

<div class="row-fluid">

<?php echo CHtml::beginForm(array('admin2'), 'post'); ?>

<div class="span6">
	<?php echo CHtml::label('Seleccionar Trimestre','terms'); ?>
<?php $this->widget('ext.select2.ESelect2',array(
  'name'=>'trim',
   'options'=>array(
                        'placeholder' => 'Seleccionar Trimestre', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>5,
                        

                    ),
  'data' => CHtml::listData(Trimestres::model()->findAll(), 'id', 'nombre'),
)); ?>
</div>


<?php echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm(); ?>
</div>
<div class="row-fluid">
</div>	
</div>
</div>

<?

if ($trim==0){
?>
</div>
</diV>
	<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un trimestre para generar.
</div>
<?php 
} else {
$model=new Presupuesto('search2');
		$model->unsetAttributes();  // clear any default values
$this->render('admin',array(
			'model'=>$model,
		));


?>
</div>
</diV>
<div class="alert alert-success">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!!</strong>
Se genero el timestre con exito!!!!!!!!!.
</div>
</div>
<?php echo CHtml::link('Aceptar', array('admin'), array('class'=>'btnback '));?>
<?


}
?>
