<?php
	require ('../../../config/config.php');
	$id_empresa = $_POST['id_empresa'];
	
	$queryM = "SELECT id, patente FROM vehiculo WHERE id_empresa = '$id_empresa' ORDER BY patente";
	$resultadoM = $con->query($queryM);
	
	$html= "<option value='0'>Seleccionar Vehiculo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id']."'>".$rowM['patente']."</option>";
	}
	
	echo $html;
?>