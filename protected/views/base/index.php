<div class="row-fluid">
<div class="span12">
<h4>CÉDULA DE GASTOS PAGADOS</h4>
<hr>
<h4>Seleccionar ejercicio:</h4>
</div>
</div>

<div class="row-fluid">
  <div class="span9">
<table class="table table-hover">

  <tr><th>
  	Num.
  </th>
  <th>Ejercicio</th>
  <th>Registros</th>
  <th>Accion</th>
  <th>Conciliar</th>
  </tr>

<?php 
$contador =1;
 foreach ($model as $item) {
 $sql = "SELECT count(id) as registros from base_cap where partida<>731 and id_periodo=$item[id]"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
		


echo "<tr><td>$contador<td>$item->nombre</td><td>$ejercicio[registros]</td><td>";
echo CHtml::link('Cedulas de gasto -->',array('base/admin/'.$item->id),array('class'=>'btn btn-success btn-sm'));
echo "</td><td>";

echo CHtml::link('Revision',array('base/cons/'.$item->id),array('class'=>'btn btn-info btn-sm'));

echo "<td></tr>";
$contador++;
}
  ?>

 </table>
  </div>
 </div>