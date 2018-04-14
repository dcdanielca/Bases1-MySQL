<?php

require("conexion.php");
extract($_POST);

$fecha = date('Ymd', strtotime($fechaventa_a));

$dueno_a = $_POST["listaclientes"];
$cedulavendedor_a = $_POST["listaemp"];

$query = "UPDATE automovil SET color='$color_a', fecha_venta=$fecha, dueno = $dueno_a, vendedor = $cedulavendedor_a
		WHERE placa='$placa_a';";


$result = mysqli_query($conexion,$query);


	if($result){
		echo "El automovil se ha  actualizado correctamente";
		require("index.html");
	}else{
		echo "El automovil no se actualizo";
	}

?>