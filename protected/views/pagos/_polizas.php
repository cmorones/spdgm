
<script>
		// check keyup on quantity inputs to update totals field
		function Calcular(e){
	 var total =0;
	 var totalfinal =0;
		$("input.quantity").each(function() {
				total = parseFloat(this.value) + parseFloat(total);
				total = total.toFixed(2);
				//alert(total);
			});//

 		totalfinal = parseFloat(total) + parseFloat(<?=$parcial?>);
  		totalfinal = totalfinal.toFixed(2);

			//$("#total").attr("value", total);
		//	total = 10;
		/*$('li.example').each(function(indice,valor) {
   log(indice,valor);
   $(valor).html('Soy el li número: ' + indice + ' del DOM.');
}); */
			$("#total").val(total);

			$("#total2").val(totalfinal);
		}

		

$(document).ready(function(){
    $('#list').on('change', function() {
 			 alert( this.value ); // or $(this).val()
             if(this.value == 2){
 			 $('#prov').hide();
 			}else{
 			 $('#prov').show();
 			}
 			
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
<TH>DEBE</TH>
<TH>HABER</TH></tr>

<tr>
<td>
	Tipo:
</td>
<td colspan="5">
	
<?php echo CHtml::dropDownList('tipo','', array('1' => 'ACREEDORES DIVERSOS', '2' => 'PROVEEDORES'), array('id'=>'list')); ?>


</td></tr>
<tr>
<td><?echo(CHtml::textField('cuenta','',array('class'=>'input-small ')));?></td>
<td><?echo(CHtml::textField('subcuenta','',array('class'=>'input-small ')));?></td>
<td>ACREDORES DIVERSOSB<BR>GONZALEZ VIVEROS ARTURO</td>
<td> <?echo(CHtml::textField('parcial','',array('class'=>'input-small ')));?></td>
<td><?echo(CHtml::textField('debe','',array('class'=>'input-small ')));?></td>
<td><?echo(CHtml::textField('haber','',array('class'=>'input-small ')));?></td>
</tr>
<tr id="prov">
<td><?echo(CHtml::textField('cuenta1','',array('class'=>'input-small ','id'=>'cuenta1')));?></td>
<td><?echo(CHtml::textField('subcuenta1','',array('class'=>'input-small ')));?></td>
<td>RETENCION DE IMPUESTOS<BR>GONZALEZ VIVEROS ARTURO</td>
<td><?echo(CHtml::textField('parcial1','',array('class'=>'input-small ')));?></td>
<td><?echo(CHtml::textField('debe1','',array('class'=>'input-small ')));?></td>
<td><?echo(CHtml::textField('haber1','',array('class'=>'input-small ')));?></td>
</tr>

<tr>
<td></td>
<td><?echo(CHtml::hiddenField('id','id',array('class'=>'input-small', 'value'=>$id)));?></td>
<td></td>
<td align="right">SUMAS<BR> IGUALES</td>
<td><?echo(CHtml::textField('sumaigual1','',array('class'=>'input-small ','id'=>'sumaigual1')));?></td>
<td><?echo(CHtml::textField('sumaigual2','',array('class'=>'input-small ','id'=>'sumaigual2')));?></td>
</tr>
<tr><td colspan='6' align="right"><div id="req_res02"></div></td></tr>
	
</table>

</div>
<div>
<?php
echo CHtml::ajaxSubmitButton(
	'Generar Documento ',
	array('pagos/imprimir', array('id'=>$id)),
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

