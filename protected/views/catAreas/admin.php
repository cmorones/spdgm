<?php
/* @var $this CatAreasController */
/* @var $model CatAreas */

/*$this->breadcrumbs=array(
	'Áreas'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'Listado de Áreas', 'url'=>array('index')),
	array(
	 'label'=>'Agregar Áreas',
	 'url'=>array('create'),
     'htmlOptions' => array(
     	   'class' => 'btnupdate' )
     )	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cat-areas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h3>Administracion de Áreas</h3>




<div class="search-form" style="display:none">
<
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cat-areas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                'id',		
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
