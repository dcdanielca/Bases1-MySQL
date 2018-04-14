<?php
	require("conexion.php");	
	extract($_POST);
	
    $placa=$_POST["listaeliminarauto"];

	$query = "DELETE FROM automovil WHERE placa='$placa'";
	$result = mysqli_query($conexion, $query) or die (mysqli_error($conexion));

	if($result){
		echo "El automovil ha sido eliminado exitosamente";
		require("index.html");
	} else{
		echo "Ha ocurrido un error en la eliminacion";
	}

?>