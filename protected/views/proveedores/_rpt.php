<?php

//echo 'hola';
$filtro="";
$filtro2="";
echo "<div class='span12'>
<table class='table table-striped table-hover'>
	<tr>
		<th>Num</th>
		<th>Nombre</th>
		<th>RFC</th>
		<th>Domicilio</th>
		<th>Colonia</th>
		<th>Telefono</th>
		<th>C.P.</th>
		<th>Entidad</th>
		<th>Tipo</th>
		<th>Status</th>
	
	</tr>
		";


if($id_subprog !=0){
	$filtro .="tipo =$id_subprog AND ";
}


if($id_area !=0){
	$filtro .="status =$id_area AND ";
}

if($proveedor !=0 || $proveedor !='' ){
	$filtro .="nombre = '$proveedor' AND ";
}


if( !empty( $filtro ) ){
		$filtro2= " where ".substr( $filtro, 0,-4);
	}

/*if($subprog !=0){
	$filtro2 .="and subprog=subprog";
}else{
	$filtro2="";
}*/




 $q = "SELECT *  FROM 
  		     proveedores ".$filtro2."
		     order by nombre";

$cmd = Yii::app()->db->createCommand($q);
//$cmd->getText();

$resultado = $cmd->query();

$i=1;

foreach ($resultado as $row) {

	if($row['status']==1){
           $estado ="Activo";
	}
	if($row['status']==2){
           $estado ="Baja";
	}

	if($row['status']==1){
           $estado ="Activo";
	}

	if($row['tipo']==0){
           $tiponom ="NP";
	}
	if($row['tipo']==1){
           $tiponom ="Músico";
	}
	if($row['tipo']==2){
           $tiponom ="Orquesta";
	}
	if($row['tipo']==3){
           $tiponom ="Base";
	}
	if($row['tipo']==4){
           $tiponom ="Honorarios";
	}
	echo "<tr>
	    <td>$i</td>
		<td>$row[nombre]</td>
		<td>$row[rfc]</td>
		<td>$row[domicilio]</td>
		<td>$row[colonia]</td>
		<td>$row[telefono]</td>
		<td>$row[codigo]</td>
		<td>$row[entidad]</td>
		<td>$tiponom</td>
		<td>$estado</td>
	
	</tr>
		";
		$i++;
        }

        
?>

</table>
<br>
<br>
<br>
<br>
<br>
