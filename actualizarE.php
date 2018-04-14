<html>
<head>
	<title>Actualizar Empresa</title>
</head>
<body>
<?php

	require("conexion.php"); //Necesitamos establecer conexión con la base de datos.
	extract($_POST);//

    $codigo=$_POST["codigosdeempresas"];
	$query = "SELECT *,COUNT(*) AS conteo FROM cliente NATURAL JOIN empresa WHERE codigo=$codigo;";  //Crea una variable conteo, hace un
	//join entre persona y cliente, mira donde los codigos coincidan. //Te saca la consulta en una relación.
	
	$result = mysqli_query($conexion,$query);
	
	
	if($result){
    
		while($row = $result->fetch_array()){
			$codigo = $row["codigo"];
			$telefono = $row["telefono"];
			$correo = $row["correo_electronico"];
			$nit = $row["nit"];
			$nombre = $row["nombre"];
			$direccion = $row["direccion"];
			$conteo= $row["conteo"];
			if($conteo==0){
				echo "no se ha encontrado el cliente perteneciente a esa empresa";
			}else{
			
			?>
			<form action="actualizarEmpresa.php" method="POST">
				<h4>Actualizar datos empresa</h4>
				<label>Codigo: <?php echo $codigo?> </label>
				<input type="hidden" name="codigo_e" value=<?php echo $codigo ?>><br><br>
				<label>Telefono de la Empresa: </label>
				<input type="tel" name="telefono_e" value=<?php echo $telefono ?> min="0" max="9999999999" ><br><br>
				<label>Correo: </label>
				<input type="email" name="correo_e" value=<?php echo$correo ?> maxlength="30" ><br><br>
				<label>Nit empresa: </label>
				<input type="number" name="nit_e" value=<?php echo $nit  ?>  min="0" max="9999999999" ><br><br>
				<label>Nombre empresa: </label>
				<input type="text" name="nombre_e" value="<?php echo $nombre ?>"  maxlength="20" ><br><br>
				<label>Direccion Empresa: </label>
				<input type="text" name="direccion_e" value="<?php echo $direccion  ?>" maxlenght = "30" ><br>	
				<input type="submit" value="Actualizar">
			</form>

<?php }
		}
	}else{
		echo "no se ha encontrada el cliente persona";
	}
?>
</body>
</html>