<?php

require("conexion.php");
extract($_POST);


$query1 = "UPDATE cliente SET telefono=$telefono_e, correo_electronico='$correo_e'
		WHERE codigo=$codigo_e";
$query2="UPDATE empresa SET nit = $nit_e, nombre='$nombre_e', direccion='$direccion_e'
		WHERE codigo=$codigo_e";

$result1= mysqli_query($conexion,$query1);
$result2= mysqli_query($conexion,$query2);

if($result1 && $result2){
	echo "El cliente persona se ha  actualizado correctamente";
	require("index.html");
}else{
	echo "El cliente persona no se actualizo";
}

?>