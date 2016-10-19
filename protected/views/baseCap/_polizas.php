
<script>
		// check keyup on quantity inputs to update totals field

		

$(document).ready(function(){
    $('#list').on('change', function() {
 			// alert( this.value ); // or $(this).val()
 			
             if(this.value == 2){
 			 $('#prov').hide();

 			}else{
 			 $('#prov').show();
 			}
 			
		});

    $( "#iva" ).focusout(function() {
    	var iva = parseFloat(jQuery('#iva').val());//return 30
		var isr = parseFloat(jQuery('#isr').val());//return 40
		var resultado = iva+isr ;//return 3040
  		$('#parcial1').val(resultado);	
	});

	 $( "#isr" ).keyup(function() {
	 	var iva = parseFloat(jQuery('#iva').val());//return 30
		var isr = parseFloat(jQuery('#isr').val());//return 40
		var resultado = iva+isr ;//return 3040
  		$('#parcial1').val(resultado);	
	});



    


    $('#sumaigual1').prop( "disabled", true );
    $('#sumaigual2').prop( "disabled", true );
});
		
	</script>


<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Formulario de Poliza
 </div>


<?php echo CHtml::beginForm(); ?>


<div class="row-fluid">
<table class='table table-striped table-hover'>
<tr><th colspan="6">DIRECCION GENERAL DE MUSICA</th></tr>
<tr><TH>CUENTA</TH>
<TH>SUB-CUENTA</TH>
<TH>NOMBRE</TH>
<TH>PARCIAL</TH>
</tr>

<tr>
<td>
	Tipo:
</td>
<td colspan="5">
	
<?php echo CHtml::dropDownList('tipo','', array('1' => 'ACREEDORES DIVERSOS', '2' => 'PROVEEDORES'), array('id'=>'list')); ?>


</td></tr>
<tr>
<td></td>
<td></td>
<td><BR><?=$model->proveedor?></td>
<td></td>
<td></td>
<td> <?echo(CHtml::textField('parcial','',array('class'=>'input-small ', 'placeholder'=>'Parcial')));?>
	<?echo(CHtml::hiddenField('id',$id,array('class'=>'input-small')));?>
</td>

</tr>
<tr id="prov">
<td></td>
<td></td>
<td>RETENCION DE IMPUESTOS<BR><?=$model->proveedor?></td>
<td><?echo(CHtml::textField('iva','',array('class'=>'input-small','id'=>'iva', 'placeholder'=>'Retencion IVA')));?></td>	
<td><?echo(CHtml::textField('isr','',array('class'=>'input-small','id'=>'isr', 'placeholder'=>'Retencion ISR')));?></td>	

<td><?echo(CHtml::textField('parcial1','',array('class'=>'input-small', 'placeholder'=>'Total', 'readonly'=>'readonly', 'id'=>'parcial1')));?>
</td>

</tr>

<tr><td colspan='6' align="right"><div id="req_res02"></div></td></tr>
	
</table>

</div>
<div>
<?php
echo CHtml::ajaxSubmitButton(
	'Generar Documento ',
	array('baseCap/imprimir'),
	array(
		'update'=>'#req_res02',
	),
	 array('id'=>'btn','class'=>'btn-success') 
);
?>

<?php //echo CHtml::submitButton('Generar',array('class'=>'submit')); ?>
<?php echo CHtml::endForm();

 ?>
 <div></div>

</div>
</div>





</div>

<?php 





?>
