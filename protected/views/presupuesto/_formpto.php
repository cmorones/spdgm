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

	
	</script>

<div class="row-fluid">


<div class="span3"></div>
<div class="span6">
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Registro Presupuestal
 <?

echo $id_trim;

echo $id_periodo;
 ?>
 </div>
<div class="form">

<div class="form">
<?php echo CHtml::beginForm('registro2','post',array('id' => 'orderform')); ?>



<table id="orderitems" class="table table-striped  table-hover">
	<tr>
	<th>Subprograma</th>
	<th>Partida</th>
	<th>Tipo</th>
	<th>Importe</th>
	</tr>


<?php


foreach ($model as $key => $row) {

 
 
    echo "<tr>";
	    echo "<td align=\"center\">$row->subprog</td>";
	    echo "<td align=\"center\">$row->partida</td>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"><input class=\"quantity\" type='text'  value='$row->presupuesto' name=\"valores[".$row['id']."]\" onkeyup=Calcular(this);></td>";
    echo "</tr>";
   

	

}

   echo "<tr>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"><strong>Subtotal</strong></td>";
	    echo "<td align=\"right\"><input type=\"text\" id=\"total\" disabled value=\"$subtotal\"></td>";
    echo "</tr>";

     echo "<tr>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"><strong>Gran Total</strong></td>";
	    echo "<td align=\"right\"><input name=\"total2\" type=\"text\" id=\"total2\" disabled value=\"$total\"></td>";
    echo "</tr>";

    echo "<tr>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"></td>";
	    echo "<td align=\"right\"><input name=\"totalf2\" type=\"hidden\" id=\"total2\" value=\"$total\"></td>";
    echo "</tr>";

?>
</table>


<?php echo CHtml::submitButton('Registrar', array('name' => 'button1','class'=>'btn-success')); ?>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->

</div>
</div>
</div>
<div class="span2"></div>
</div>


