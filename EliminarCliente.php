<?php
	require("conexion.php");	
	extract($_POST);
    $codigo=$_POST["listaeliminar"];
	$query = "DELETE FROM cliente WHERE codigo=$codigo";
	
	$result = mysqli_query($conexion, $query) or die (mysqli_error($conexion));

	if($result){
		echo "El cliente persona ha sido eliminado exitosamente";
		require("index.html");
	} else{
		echo "Ha ocurrido un error en la eliminacion";
	}

?>