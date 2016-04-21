<div class="row-fluid">
<div class="span12">
<h4>Pagos</h4>
<hr>
<h4>Seleccionar ejercicio:</h4>
</div>
</div>

<div class="row-fluid">
  <div class="span6">
<table class="table table-hover">

  <tr><th>
  	Num.
  </th>
  <th>Ejercicio</th>
  <th>Pagados</th>
  <th>Pendientes</th>
  </tr>

<?php 
$contador =1;
 foreach ($model as $item) {

$sql = "SELECT count(id) as registros from pagos where pagado=1 and id_periodo=$item[id]"; 
$ejercicio = Yii::app()->db->createCommand($sql)->queryRow();

$sql2 = "SELECT count(id) as registros from pagos where pagado=2 and id_periodo=$item[id]"; 
$ejercicio2 = Yii::app()->db->createCommand($sql2)->queryRow();
		


echo "<tr><td>$contador<td>$item->nombre</td><td align=\"center\">";
echo CHtml::link($ejercicio['registros'],array('pagos/admin/'.$item->id),array('class'=>'btn btn-success btn-sm'));
echo "</td><td align=\"center\">";
echo CHtml::link($ejercicio2['registros'],array('pagos/admin2/'.$item->id),array('class'=>'btn btn-danger btn-sm'));
echo "<td></tr>";
$contador++;
}
  ?>

 </table >
  </div>
 </div>
