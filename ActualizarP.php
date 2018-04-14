<html>
<head>
	<title>Actualizar Persona</title>
</head>
<body>
<?php


	require("conexion.php");
	extract($_POST);//

    $codigo =$_POST["codigospersonas"];
	$query = "SELECT *,COUNT(*) AS conteo FROM cliente NATURAL JOIN persona WHERE codigo=$codigo;";  //Crea una variable conteo, hace un
	//join entre persona y cliente, mira donde los codigos coincidan.
	
	$result = mysqli_query($conexion,$query);
	
	
	if($result){
    
		while($row = $result->fetch_array()){
			$codigo = $row["codigo"];
			$telefono = $row["telefono"];
			$correo = $row["correo_electronico"];
			$cedula = $row["cedula"];
			$nombre = $row["nombre"];
			$apellido = $row["apellido"];
			$celular = $row["celular"];
			$conteo= $row["conteo"];
			if($conteo==0){
				echo "no se ha encontrada el cliente persona";
			}else{
			
			?>
			<form action="actualizarPersona.php" method="POST">
				<h4>Actualizar datos persona</h4>
		
				<label>Codigo: <?php echo $codigo?> </label>
				<input type="hidden" name="codigo_v" value=<?php echo $codigo ?>><br><br>
				<label>Cedula: </label>
				<input type="number" name="cedula_n" value=<?php echo $cedula ?> min="0" max="9999999999" ><br><br>
				<label>Nombre: </label>
				<input type="text" name="nombre_n" value="<?php echo $nombre ?>" maxlength="30" ><br><br>
				<label>Apellido: </label>
				<input type="text" name="apellido_n" value="<?php echo $apellido ?>" maxlength="30" ><br><br>
				<label>Correo electronico: </label>
				<input type="email" name="correo_n" value=<?php echo $correo ?>  maxlength="20" ><br><br>
				<label>Telefono: </label>
				<input type="tel" name="telefono_n" value=<?php echo $telefono ?> min="0" max="9999999999" ><br><br>
				<label>Celular :</label>
				<input type="tel" name="celular_n" value=<?php echo $celular?> min="0" max="9999999999" ><br>
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