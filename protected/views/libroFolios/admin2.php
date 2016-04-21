<?php
/* @var $this LibroFoliosController */
/* @var $model LibroFolios */

/*$this->breadcrumbs=array(
	'Libro Folioses'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'List LibroFolios', 'url'=>array('index')),
	array('label'=>'Agregar Folios', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#libro-folios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrar libro de Folios</h3>

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'libro-folios-grid',
	'dataProvider'=>$model->search2(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'fecha_ing',
        'header'=> 'fecha',
        'htmlOptions'=>array('style'=>'width: 50px;'),
       // 'value'=> '$data->product->model',
        ),
		//'id',
		array('name'=>'folio',
        'header'=> 'folio',
        'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
       // 'value'=> '$data->product->model',
        ),
			array(
            'name'=>'tipo_docto',
            'value'=>'$data->ClaveDoctos->nombre',
            'filter'=>ClaveDoctos::model()->options,
            'htmlOptions'=>array('style'=>'width: 30px;  text-align:center;'),
                    ),
		//'fecha_ing',
		//'factura',
		array('name'=>'factura',
        'header'=> 'factura',
        'htmlOptions'=>array('style'=>'width: 20px;'),
       // 'value'=> '$data->product->model',
        ),
		//'importe',
		//'numerocheque',
		//'partida',
		//'fecha_contrarecibo',
		//'no_contrarecibo',
		//'detalle',
		//'id_proveedor',
		array('name'=>'id_proveedor',
        'header'=> 'proveedor',
        'htmlOptions'=>array('style'=>'width: 200px;'),
       // 'value'=> '$data->product->model',
        ),
        array('name'=>'importe',
        'header'=> 'importe',
        'htmlOptions'=>array('style'=>'width: 30px; text-align:right;'),
        'value'=> 'number_format($data->importe,2)',
       // 'value'=> '$data->product->model',
        ),
        //'partida',
        array('name'=>'partida',
        'header'=> 'partida',
        'htmlOptions'=>array('style'=>'width: 20px;'),
       // 'value'=> '$data->product->model',
        ),
        array('name'=>'fecha_contrarecibo',
        'header'=> 'f/recibo',
        'htmlOptions'=>array('style'=>'width: 30px;'),
       // 'value'=> '$data->product->model',
        ),
		//'no_contrarecibo',
		array('name'=>'no_contrarecibo',
        'header'=> 'recibo',
        'htmlOptions'=>array('style'=>'width: 50px;'),
       // 'value'=> '$data->product->model',
        ),
        'detalle',
		array(
            'name'=>'clasif',
            'value'=>'$data->Clasif->nombre',
            'filter'=>Clasif::model()->options,
                    ),
				
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
