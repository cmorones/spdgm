<div class="row-fluid">
<div class="span12">
<h4>Gastos</h4>
<hr>
<h4>Seleccionar ejercicio:</h4>
</div>
</div>

<div class="row-fluid">
  <div class="span8">
<table class="table table-hover">

  <tr><th>
  	Num.
  </th>
  <th>Ejercicio</th>
  <th>Registros Conciliados</th>
   <th>No Conciliados</th>
  <th>Accion</th>
  </tr>

<?php 
$contador =1;
 foreach ($model as $item) {
$sql = "SELECT count(id) as registros from base_cap where validado=1 and id_periodo=$item[id]"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();

$sql1 = "SELECT count(id) as registros from base_cap where validado=0 and id_periodo=$item[id]"; 
$ejercicio1 = Yii::app()->db->createCommand($sql1)->queryRow();
		


echo "<tr><td>$contador<td>$item->nombre</td><td align=\"center\">$ejercicio[registros]</td><td align=\"center\">$ejercicio1[registros]</td><td>";
echo CHtml::link('Conciliar -->',array('baseCap/admin3/'.$item->id),array('class'=>'btn btn-info btn-sm'));
echo "</td></tr>";
$contador++;
}
  ?>

 </table>
  </div>
 </div>
