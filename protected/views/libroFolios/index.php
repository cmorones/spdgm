<div class="row-fluid">
<div class="span12">
<h4>Seleccionar ejercicio:</h4>
</div>
</div>
<hr>
<div class="row-fluid">
  <div class="span6">
<table class="table table-hover">

  <tr><th>
  	Num.
  </th>
  <th>Ejercicio</th>
  <th>Registros</th>
  <th>Accion</th>
  </tr>

<?php 
$contador =1;
 foreach ($model as $item) {

$sql = "SELECT count(id) as registros from libro_folios where id_periodo=$item[id]"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
		

echo "<tr><td>$contador<td>$item->nombre</td><td>$ejercicio[registros]</td><td>";
echo CHtml::link('Informacion -->',array('libroFolios/admin/'.$item->id),array('class'=>'btn btn-success btn-sm'));
echo "</td></tr>";
$contador++;
}
  ?>

 </table>
  </div>
 </div>