<?php
	require("conexion.php");	
	extract($_POST);
    
    $cedula=$_POST["listaeliminaremp"];
	$query = "DELETE FROM empleado WHERE cedula=$cedula";
	$result = mysqli_query($conexion, $query) or die (mysqli_error($conexion));

	if($result){
		echo "El empleado ha sido eliminado exitosamente";
		require("index.html");
	} else{
		echo "Ha ocurrido un error en la eliminacion";
	}

?>