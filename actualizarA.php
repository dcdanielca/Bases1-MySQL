<html>
<head>
	<title>Actualizar Automovil</title>
</head>
<body>
<?php


	require("conexion.php");
	extract($_POST);//

    $placa=$_POST["listaplacas"];
	$query = "SELECT *,COUNT(*) AS conteo FROM automovil WHERE placa = '$placa';";  //Crea una variable conteo, hace un
	//join entre persona y cliente, mira donde los codigos coincidan.
	
	$result = mysqli_query($conexion,$query);
	
	
	if($result){
    
		while($row = $result->fetch_array()){
			$placa = $row["placa"];
			$color = $row["color"];
			$fecha_venta = $row["fecha_venta"];
			$dueno = $row["dueno"];
			$vendedor= $row["vendedor"];
			$conteo= $row["conteo"];
			if($conteo==0){
				echo "no se ha encontrado el automovil";
			}else{
			
			?>
			<form action="actualizarAutomovil.php" method="POST">
				<h4>Actualizar datos automovil </h4>
		
				<label>Placa: <?php echo $placa?> </label>
				<input type="hidden" name="placa_a" value=<?php echo $placa ?>><br><br>
				<label>Color automovil: </label>
				<input type="text" name="color_a" value="<?php echo $color ?>" min="0" max="9999999999" ><br><br>
				<label>Fecha: </label>
				<input type="date" name="fechaventa_a" value=<?php echo $fecha_venta ?> ><br><br>
				<label>Codigo del dueño: </label>
				<?php
				
		            require("conexion.php");

					$query="SELECT codigo FROM cliente";
					$result=mysqli_query($conexion,$query) or die(mysqli_error($conexion));

					if($result){
					?>
							<select name = "listaclientes">
								<?php
									while($row = $result->fetch_array()){
										$codigo = $row["codigo"];
									?>
										<option><?php echo $codigo ?></option>
									<?php				
									}
								?>			
							</select>
						<?php
					}
				?><br><br>
				<label>Cedula Vendedor: </label>
				<?php
				
		            require("conexion.php");

					$query="SELECT cedula FROM empleado";
					$result=mysqli_query($conexion,$query) or die(mysqli_error($conexion));

					if($result){
					?>
							<select name = "listaemp">
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
				?><br>
				
				<input type="submit" value="Actualizar">
			</form>

<?php }
		}
	}else{
		echo "no se ha encontrado el automovil";
	}
?>
</body>
</html>