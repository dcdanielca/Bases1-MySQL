<html>
<head>
	<title>Actualizar Empleado</title>
</head>
<body>
<?php


	require("conexion.php");
	extract($_POST);//

    $cedulae=$_POST["cedulasempleados"];
	$query = "SELECT *,COUNT(*) AS conteo FROM empleado WHERE cedula=$cedulae;";  //Crea una variable conteo, hace un
	//join entre persona y cliente, mira donde los codigos coincidan.
	
	$result = mysqli_query($conexion,$query);
	
	
	if($result){
    
		while($row = $result->fetch_array()){
			$cedula = $row["cedula"];
			$nombre = $row["nombre"];
			$apellido = $row["apellido"];
			$sueldo = $row["sueldo"];
			$jefe = $row["jefe"];
			$telefono = $row["telefono"];
			$conteo= $row["conteo"];
			if($conteo==0){
				echo "no se ha encontrado el empleado";
			}else{
			
			?>
			<form action="actualizarEmpleado.php" method="POST">
				<h4>Actualizar empleado</h4>
		
				<label>Cedula: <?php echo $cedula?> </label>
				<input type="hidden" name="cedula_emp" value=<?php echo $cedula ?>><br><br>
				<label>Nombre empleado: </label>
				<input type="text" name="nombre_emp" value="<?php echo $nombre ?>" maxlength="30" ><br><br>
				<label>Apellido empleado: </label>
				<input type="text" name="apellido_emp" value="<?php echo $apellido ?>" maxlength="30" ><br><br>
				<label>Sueldo: </label>
				<input type="number" name="sueldo_emp" value=<?php echo $sueldo ?>  min="0" max="99999999" ><br><br>
				<label>Jefe: </label>
				<?php
				
		        require("conexion.php");

					$query="SELECT cedula FROM empleado";
					$result=mysqli_query($conexion,$query) or die(mysqli_error($conexion));

					if($result){
					?>
							<select name = "listaemp">
							<option value="NULL">Sin jefe</option>

								<?php
									while($row = $result->fetch_array()){
										$cedula = $row["cedula"];
									?>
										<option><?php echo $cedula ?></option>
									<?php				
									}
								?>			
							</select>
						<?php
					}
				?>	<br><br>
				<label>Telefono :</label>
				<input type="tel" name="telefono_emp" value=<?php echo $telefono?> min="0" max="9999999999" ><br>

				<input type="submit" value="Actualizar">
			</form>

<?php }
		}
	}else{
		echo "no se ha encontrado el empleado";
	}
?>
</body>
</html>