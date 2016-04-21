<?php
$sql = "SELECT nombre, id_periodo from trimestres  where id=$id"; 
	    $per = Yii::app()->db->createCommand($sql)->queryRow();
	    $periodo = $per['nombre'];

$sql = "SELECT nombre from cat_ejercicio where id=$per[id_periodo]"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $anio = $ejercicio['nombre'];

/*Yii::app()->session['id_periodo'] = $id;
$sql = "SELECT nombre from cat_ejercicio where id=$id"; 
        $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
        $anio = $ejercicio['nombre'];*/
?>
<h4>Administrar Presupuesto ejercicio <?=$anio?> - <?=$periodo?></h4>



</div><!-- search-form -->
<div class="row-fluid">
  <div class="span6">
       <a href="<?php echo CController::createUrl('presupuesto/index'); ?>" class=" agregar btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i><< Regresar</a>
       <a href="<?php echo CController::createUrl('presupuesto/create/'.$id.''); ?>" class=" agregar btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> + Agregar</a>
</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'presupuesto-grid',
	'dataProvider'=>$model->search($id),
	'filter'=>$model,
	'columns'=>array(
	
		
		array(
            'name'=>'grupo',
            'value'=>'$data->Grupo->codigo',
            'filter'=>CatGrupos::model()->options,
                    ),
		array(
            'name'=>'subprog',
            'header'=> 'Subprog',
            'value'=>'$data->Subprog->alias',
            'filter'=>Subprogramas::model()->options,
            'htmlOptions'=>array('style'=>'width: 10px;  text-align:center;'),
                    ),
		'partida',
		array(
            'name'=>'tipo',
            'value'=>'$data->Tipo->nombre',
            'filter'=>Tipo::model()->options,
                    ),
		'presupuesto',
		'area',
		/*
		'area',
		'gasto',
		'disponible',
		'fecha_reg',
		'oficio',
		'id_periodo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
