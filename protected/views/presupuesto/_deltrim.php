<?php

//print_r($model);

/*foreach ($model as $registro){
	echo $registro['id_trimestre'];
}*/


?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">listas de Periodos Generados
 </div>





 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped items" id="example">
            <thead>
                <tr>
                    <!--<th>Consecutivo</th>-->
                    <th>Trimestre</th>
                    <th>Accion</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php //$j=1; ?>
                <?php //for($i=1; $i<=40; $i++){ ?>
                <?php foreach ($model as $registro) { ?>
                   
                    <tr class="even gradeC">
                        <!--<td><?php //echo 'consecutivo'.$j;$j++   ?></td>-->
                      
                        <td><?php echo $registro['id_trimestre']?></td>
                        <td><?php echo CHtml::link('Eliminar',"#", array("submit"=>array('borrar', 'id'=>$registro['id_trimestre']), 'confirm' => 'Estas seguro?')); ?></td>
                       
                </tr>
              
            <?php } ?>
            <?php //} ?>
            </tbody>
        </table>


</div>