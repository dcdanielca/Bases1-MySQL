<?php
		 require("conexion.php");	
		 extract($_POST);

		 $id_cliente=$_POST["listabusqueda2"];


		$query="SELECT * from automovil WHERE dueno = $id_cliente";

		$result=mysqli_query($conexion,$query) or die(mysqli_error($conexion));

		if($result){
			?>  
			    <br><br>
				<h4>AUTOMOVILES QUE HA COMPRADO EL CLIENTE CON SU RESPECTIVO VENDEDOR</h4>
                 
				<table border='1' widht="29%">
					<tr>
						<th>placa</th>
						<th>color</th>
						<th>fecha de venta</th>
						<th>dueño</th>
						<th>vendedor</th>
					</tr>

					<?php
						while($row = $result->fetch_array()){
							$placa= $row["placa"];
							$color= $row["color"];
							$fecha_venta = $row["fecha_venta"];
							$dueno = $row["dueno"];
							$vendedor= $row["vendedor"];
						?>
							<tr> 
								<td><?php echo $placa ?></td>
								<td><?php echo $color ?></td>
								<td><?php echo $fecha_venta ?></td>
								<td><?php echo $dueno  ?></td>
								<td><?php echo $vendedor ?></td>
							</tr>	
						<?php
						}
					?>

				</table>	
			<?php
		} else{
			echo "No hay automoviles que haya comprado el cliente";
		}
       

       $query2 ="SELECT * FROM empleado WHERE cedula in (SELECT vendedor from automovil WHERE dueno = $id_cliente)";

	   $result2 =mysqli_query($conexion,$query2) or die(mysqli_error($conexion));


		if($result2){
			?>
				<h4>DATOS DE LOS RESPECTIVOS VENDEDORES</h4>

				<table border='1' widht="29%">
					<tr>
						<th>cedula</th>
						<th>nombre</th>
						<th>apellido</th>
						<th>telefono</th>
						<th>sueldo</th>
						<th>jefe</th>
					</tr>

					<?php
						while($row = $result2->fetch_array()){
							$cedula= $row["cedula"];
							$nombre = $row["nombre"];
							$apellido = $row["apellido"];
							$telefono = $row["telefono"];
							$sueldo= $row["sueldo"];
							$jefe= $row["jefe"];
						?>
							<tr> 
								<td><?php echo $cedula ?></td>
								<td><?php echo $nombre  ?></td>
								<td><?php echo $apellido ?></td>
								<td><?php echo $telefono ?></td>
								<td><?php echo $sueldo ?></td>
								<td><?php echo $jefe ?></td>
							</tr>	
						<?php
						}
					?>

				</table>	
			<?php
		} else{
			echo "No hay datos de los respectivos vendedores";
		}
       



?>