<?php
	require("conexion.php");
	extract($_POST);
	
	$dueno=$_POST["listaclientes"];
	$vendedor=$_POST["listavend"];
	$nuevafecha = date('Ymd', strtotime($fecha_venta));
	
	$query = "INSERT INTO automovil VALUES('$placa','$color',$nuevafecha,$dueno,$vendedor);";	
	$resultado = mysqli_query($conexion,$query);
	
	if($resultado){
		echo "Se agrego el automovil";
	}else{
		echo "El automovil no se agrego";
	}
?>