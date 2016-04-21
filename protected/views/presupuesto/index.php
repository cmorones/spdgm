<div class="row-fluid">
<div class="span10">
<h4>Presupuesto</h4>
<hr>
<h4>Seleccionar ejercicio:</h4>
</div>
</div>

<div class="row-fluid">
  <div class="span12">
<table class="table table-hover">

  <tr><th>
  	Num.
  </th>
  <th>Ejercicio</th>
  
  <th>Accion</th>
  </tr>

<?php 
$contador =1;
 foreach ($model as $item) {

$resultado = Trimestres::model()->findAll((array(
    'condition'=>"id_periodo=$item[id]",
    'order'=>'id'
	)));
echo "<tr><td>$contador<td>$item->nombre</td><td>";
foreach ($resultado as $item2) {
 

 echo CHtml::link($item2->nombre,array('presupuesto/admin/'.$item2->id),array('class'=>'btn btn-warning btn-sm'));
echo " ";

}
echo "</td>";


/*if(is_array($arreglo)){
                foreach ($arreglo as $k=>$v){
                    $a .= $v.',';
                }
                    $a= substr( $a, 0,-1);
                }else {
                    $a ='';	
}*/

//echo "$a";



/*echo CHtml::link('1er Semestre',array('presupuesto/admin/'.$item->id),array('class'=>'btn btn-success btn-sm'));
echo " ";
echo CHtml::link('2do Semestre',array('presupuesto/admin/'.$item->id),array('class'=>'btn btn-info btn-sm'));
echo " ";
echo CHtml::link('3er Semestre',array('presupuesto/admin/'.$item->id),array('class'=>'btn btn-danger btn-sm'));
echo " ";
echo CHtml::link('4to Semestre',array('presupuesto/admin/'.$item->id),array('class'=>'btn btn-warning btn-sm'));
echo "</td></tr>";*/
$contador++;
}
  ?>

 </table>
  </div>
 </div>
