<?php

require("conexion.php");
extract($_POST);

$query1 = "UPDATE cliente SET telefono=$telefono_n, correo_electronico='$correo_n'
		WHERE codigo=$codigo_v";
$query2="UPDATE persona SET cedula=$cedula_n, nombre='$nombre_n', apellido='$apellido_n', celular=$celular_n
		WHERE codigo=$codigo_v";

$result1= mysqli_query($conexion,$query1);
$result2= mysqli_query($conexion,$query2);

if($result1 && $result2){
	echo "El cliente persona se ha  actualizado correctamente";
	require("index.html");
}else{
	echo "El cliente persona no se actualizo";
}

?>