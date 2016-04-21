<div class="operation">
<?php //echo CHtml::link('Atras', array('admin2'), array('class'=>'btnback '));?>
<?php echo CHtml::link('Agregar', array('create'), array('class'=>'btnupdate'));?>
<?php //echo CHtml::link('Modificar', array('update' ,'id'=>$model->id), array('class'=>'btnupdate'));?>
<?php //echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->id), array('class'=>'btndelete', 'onclick'=>"return confirm('Estas seguro de eliminar?');"));?>
</div>
<br>

<h3>Administrar Cuentas del Ejercicio <?=$id_periodo?></h3>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'catalogo-cuentas-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'pager'=>array(
            'class'=>'CLinkPager',
            'pageSize' => 50,
            /*'firstPageLabel'=>'Erste',
            'lastPageLabel'=>'Letzte',
            'nextPageLabel'=>'Nächste',
            'prevPageLabel'=>'Vorherige',*/
            'header'=>'',

        ),
	'columns'=>array(
	//	'id',
			array(
            'name'=>'id_bandera',
            'value'=>'$data->Banderas->nombre',
            'htmlOptions'=>array('style'=>'width: 100px;  text-align:center;'),
           // 'filter'=>Banderas::model()->options2,
                    ),
		//'id_tipo',
		array(
            'name'=>'id_tipo',
            'value'=>'$data->Tipo->nombre',
            'htmlOptions'=>array('style'=>'width: 200px;  text-align:center;'),
          //  'filter'=>CatCuentasIngresos::model()->options,
                    ),
	//	'id_ejercicio',
		array(
            'name'=>'id_ejercicio',
            'value'=>'$data->Ejercicio->nombre',
           // 'filter'=>CatEjerccio::model()->options,
                    ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
