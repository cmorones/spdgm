<div class="span12">

<div id="btnExport" align="center"><button id="btnExport">Exportar-><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png')?></button></div>
<br>
<br>
<br>
<h4><center><?=$titulo?></center></h4>
<hr>
</div>
<div id="datos" >
<table class="table table-striped table-hover">
	<tr>
		<th>Fecha </th>
		<th>Tipo Prov </th>
		<th>Operacion </th>
		<th>Proveedor</th>
		<th>RFC</th>
		<th>IDfiscal</th>
		<th>Res.</th>
		<th>Nac.</th>
		<th>Importe</th>
		<th>Iva</th>
		<th>Subtotal</th>
		<th>Retension IVA</th>
		<th>Retension ISR</th>
		<th>Total</th>
		<th>Tasa</th>
		<th>Tipo Recurso</th>
		<th>Partida</th>
	</tr>

<?php

$tot_importe_bruto=0;
$tot_iva=0;
$tot_subtotal=0;
$tot_iva_ret=0;
$tot_isr_ret=0;
$tot_neto=0;


foreach ($model as $key => $row) {

	if($row->tipo_prov!=""){
	$sql = "SELECT nombre from cat_prov where id=$row->tipo_prov"; 
		$prov = Yii::app()->db->createCommand($sql)->queryRow();

		$proveedor=$prov['nombre'];
	}else{
		$proveedor="";
	}

	if($row->tipo_op!=""){
	$sql = "SELECT nombre from cat_op where id=$row->tipo_op"; 
		$op = Yii::app()->db->createCommand($sql)->queryRow();

		$tipoop=$op['nombre'];
	}else{
		$tipoop="";
	}

	if($row->bandera!=""){
	$sql = "SELECT nombre from banderas where id=$row->bandera"; 
		$bande = Yii::app()->db->createCommand($sql)->queryRow();

		$bandera=$bande['nombre'];
	}else{
		$bandera="";
	}

	if($row->tasa!=""){
	$sql = "SELECT nombre from cat_tasa where id=$row->tasa"; 
		$tasa = Yii::app()->db->createCommand($sql)->queryRow();

		$tipotasa=$tasa['nombre'];
	}else{
		$tipotasa="";
	}

	echo "<tr>";
	echo "<td style=\"width:60px\">".$row->fecha_ingreso."</td>";
	echo "<td>".$proveedor."</td>";
	echo "<td>".$tipoop."</td>";
	echo "<td>".$row->proveedor."</td>";
	echo "<td>".$row->rfc."</td>";
	echo "<td>".$row->id_fiscal."</td>";
	echo "<td>".$row->recidencia."</td>";
	echo "<td>".$row->nacionalidad."</td>";
	echo "<td align=\"right\">".number_format($row->importe_bruto,2)."</td>";
	echo "<td align=\"right\">".number_format($row->iva,2)."</td>";
	echo "<td align=\"right\">".number_format($row->subtotal,2)."</td>";
	echo "<td align=\"right\">".number_format($row->iva_ret,2)."</td>";
	echo "<td align=\"right\">".number_format($row->isr_ret,2)."</td>";
	echo "<td align=\"right\">".number_format($row->importe_neto,2)."</td>";
	echo "<td>".$tipotasa."</td>";
	echo "<td>".$bandera."</td>";
	echo "<td>".$row->partida."</td>";
	echo "</tr>";

	$tot_importe_bruto = $tot_importe_bruto + $row->importe_bruto;
	$tot_iva = $tot_iva + $row->iva;
	$tot_subtotal = $tot_subtotal + $row->subtotal;
	$tot_iva_ret = $tot_iva_ret + $row->iva_ret;
	$tot_isr_ret = $tot_isr_ret + $row->isr_ret;
	$tot_neto= $tot_neto + $row->importe_neto;

 

}

	echo "<tr>";
	echo "<td style=\"width:60px\"></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td><b>Totales<b></td>";
	echo "<td align=\"right\"><b>".number_format($tot_importe_bruto,2)."</b></td>";
	echo "<td align=\"right\"><b>".number_format($tot_iva,2)."</b></td>";
	echo "<td align=\"right\"><b>".number_format($tot_subtotal,2)."<b></td>";
	echo "<td align=\"right\"><b>".number_format($tot_iva_ret,2)."</b></td>";
	echo "<td align=\"right\"><b>".number_format($tot_isr_ret,2)."</b></td>";
	echo "<td align=\"right\"><b>".number_format($tot_neto,2)."<b></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "</tr>";

?>

</table>

</div>

<br>
<br>
<br>
<br>

    <script>
    $(document).ready(function() {
    $("#btnExport").click(function(e) {
        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('datos');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'resumen_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
    });
});
    </script>