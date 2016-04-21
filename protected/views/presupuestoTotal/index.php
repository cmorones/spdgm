
<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'DGM-Presupuesto 2013',
		));
		
?>

<table class="table table-striped table-hover table-bordered table-condensed">
      
      <thead>
        <tr>
          <th>Num</th>
          <th>Grupo</th>
          <th>Subprograma</th>
          <th>Partida</th>
          <th>Tipo</th>
          <th>Area</th>
          <th>Presupuesto</th>
          <th>Descripcion</th>
        </tr>
      </thead>
      <tbody>  
<?php 
$total =0;
$nums =1;
foreach ($model as $registro) { ?>

    
      	  <tr>
      	  <td><?php echo $nums; ?></td>
          <td><?php echo $registro->Grupo->codigo; ?></td>
          <td><?php echo $registro->Subprog->nombre; ?></td>
          <td><?php echo $registro->Partida->codigo; ?></td>
          <td><?php echo $registro->Tipo->nombre; ?></td>
          <td><?php echo $registro->Area->nombre; ?></td>
          <td><div ALIGN=right><?php echo $registro->presupuesto; ?></div></td>
          <td><?php echo $registro->Partida->descripcion; ?></td>
        </tr>
   
  <?php
  $total = $total + $registro->presupuesto;
  $nums++;
   } ?>
   </tbody>
    </table>
       <div ALIGN=center><strong><h3><caption>Total:<?=$total?></caption></h3></div>
<?php 
$this->endWidget();
?>

