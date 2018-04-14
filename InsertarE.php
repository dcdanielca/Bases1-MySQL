<?php
	require("conexion.php");
	extract($_GET);

	$query1 = "INSERT INTO cliente VALUES($codigo,$telefono,'$correo');";	
	$resultado1 = mysqli_query($conexion,$query1);
	
	$query2 = "INSERT INTO empresa VALUES($codigo,$nit,'$nombre','$direccion');";
	$resultado2 = mysqli_query($conexion,$query2);
	
	if($resultado1 && $resultado2){
		echo "Se agrego el cliente empresa";
	}else{
		echo "El cliente empresa no se agrego";
	}
?>