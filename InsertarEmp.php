<?php
	require("conexion.php");
	extract($_POST);
	
	$jefe=$_POST["listaemp"];
	
	$query = "INSERT INTO empleado VALUES($cedula,'$nombre','$apellido',$telefono,$sueldo,$jefe);";	
	$resultado = mysqli_query($conexion,$query);
	
	if($resultado){
		echo "Se agrego el empleado";
	}else{
		echo "El empleado no se agrego";
	}
?>