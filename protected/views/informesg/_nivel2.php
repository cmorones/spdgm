
<?php echo CHtml::beginForm(array('informesg/infop'), 'post'); ?>


          <?php echo CHtml::dropDownList('informe2', '', 
              array(
                    '0'=>'Seleccionar informe',
                    '1' => 'Informe General partida 2013', 
                    '2' => 'Informe por Subprograma',
                    '3' => 'Informe por Area'),
              array(
                 'ajax'=>array(
                 'type'=>'POST',
                 'url' => Ccontroller::createUrl('informesg/infop'),
                 'update'=> '#req_res03',
                  )


                )
                    ); ?>
            
                   
<?php echo CHtml::endForm(); ?>
<div class="span4" id="req_res03">...</div>
