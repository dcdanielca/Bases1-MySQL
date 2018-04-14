<?php

require("conexion.php");
extract($_POST);

$jefe_emp = $_POST["listaemp"];

$query = "UPDATE empleado SET nombre = '$nombre_emp', apellido = '$apellido_emp', telefono = $telefono_emp, sueldo = $sueldo_emp, jefe = $jefe_emp WHERE cedula=$cedula_emp;";

$result= mysqli_query($conexion,$query);


if($result){
	echo "El empleado se ha actualizo correctamente";
	require("index.html");
}else{
	echo "El empleado no se actualizo";
}

?>