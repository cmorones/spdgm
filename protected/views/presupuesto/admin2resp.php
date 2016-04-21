

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Informes
 </div>
<div class="form">

<div class="row-fluid">

<?php echo CHtml::beginForm(array('admin2?view=forms'), 'post',array('name'=>'form')); ?>

<div class="span3">
<?php
echo CHtml::dropDownList('id_periodo','', array(0=>'Seleccionar',1=>'2013',2=>'2014'),
array(
'ajax' => array(
'type'=>'POST', //request type
'url'=>CController::createUrl('presupuesto/trimestre'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
'update'=>'#id_trim', //selector to update
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
))); 
 
//empty since it will be filled by the other dropdown


?>


</div>

<div class="span3">
 <?php 

echo CHtml::dropDownList('id_trim','', array());

 ?> 
</div>

<div class="row-fluid">
    <?php echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm(); ?>
</div>  
</div>
</div>

<?php 
//echo "el id es:";

 //echo "el id_periodo es:$id_periodo<br>";
 //echo "el id_periodo es:$id_trim<br>";

if(isset($id_periodo,$id_trim)){

if (($id_periodo != '') && ($id_trim!='')) {

    echo "el id_periodo es:$id_periodo<br>";
    echo "el id_trimestre es:$id_trim<br>";
/*$titulo = "Informe por criterios";

/*$fecha1 = $post['fecha1'];
$fecha2 = $post['fecha2'];*/

$sql = "SELECT nombre  from cat_ejercicio where id=$id_periodo"; 
$nombre = Yii::app()->db->createCommand($sql)->queryRow();

$sql = "SELECT nombre  from trimestres where id=$id_trim"; 
$nomtrim = Yii::app()->db->createCommand($sql)->queryRow();


$this->renderPartial('_admin', array(
            'model'=>$model,
            'id'=>$id_periodo,
            'id_trim'=>$id_trim,
            'nombre'=>"$nombre[nombre]",
            'trim'=>"$nomtrim[nombre]"
            ));
}
}

?>

<!--
Area para mostrar errores
-->


<script>
// creamos un evento onchange para cuando el usuario cambie su seleccion
// importante: #combo1 hace referencia al ID indicado arriba con: array('id'=>'combo1')
//
//$('#id').change(function(){
/*var opcionSeleccionada = $(this); // el <option> seleccionado
var idcategoria = opcionSeleccionada.val(); // el "value" de ese <option> seleccionado
if(idcategoria == 0) {
$('#siguiente').hide('slow');
return;
}
var action = 'index.php/presupuesto/trimestre&id_periodo='+idcategoria;

// se pide al action la lista de productos de la categoria seleccionada
//
$('#reportarerror').html("");
$.getJSON(action, function(listaJson) {
//
// el action devuelve los productos en su forma JSON, el iterador "$.each" los separará.
//
// limpiar el combo productos
$('#id_trim').find('option').each(function(){ $(this).remove(); });
$.each(listaJson, function(key, producto) {
//
// "producto" es un objeto JSON que representa al modelo Producto
// por tanto una llamada a: alert(producto.nombre) dira: "camisas"
$('#id_trim').append("<option value='"+producto.idproducto+"'>"
+producto.nombre+"</option>");
});
$('#seleccion').html("Ok, ahora selecciona un producto:");
$('#siguiente').show('slow');
}).error(function(e){ $('#reportarerror').html(e.responseText); });
});
// para que cuando le des click muestre la seleccion
//

</script>

