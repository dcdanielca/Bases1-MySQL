<?php 

  
  require("index.html");

	//Para menu bienvenida
	if(isset($_POST["seleccion"])){
		$val = $_POST["seleccion"];	
		if($val == "CLIENTE"){
			require("menucliente.html");
		}else if($val == "AUTOMOVIL"){
			require("menuautomovil.html"); 
		}else if($val == "EMPLEADO"){
			require("menuempleado.html");
		}else if($val == "CONSULTAS"){
			require("menuconsultas.html");
		}
		else if($val == "BUSQUEDAS"){
			require("menubusquedas.html");
		}
	 }	
    //Para menuconsultas.
    if(isset($_GET["option"]))
    {
       if($_GET["option"] == "consulta1"){
			require("consulta1.html");
	   }
	   else if ($_GET["option"] == "consulta2") {
	        require("consulta2.html");
	   }
	   else if ($_GET["option"] == "consulta3") {
	        require("consulta3.html");
	   }
	     else if ($_GET["option"] == "consulta4") {
	        require("consulta4.html");
	   }
    }

    //Para menubusquedas.


    if(isset($_GET["option"]))
    { 
    	 if($_GET["option"] == "busqueda2"){
			require("busqueda2.html");
	     }


    }
	//Para menucliente
	if(isset($_GET["option"])){
		if($_GET["option"] == "insertarP"){
			require("insertarP.html");
		}elseif($_GET["option"] == "insertarE"){
			require("insertarE.html");
		}elseif($_GET["option"] == "eliminarCliente"){
			require("eliminarCliente.html");
		}elseif($_GET["option"] == "actualizarP"){
			require("actualizarP.html");
		}elseif($_GET["option"] == "actualizarE"){
			require("actualizarE.html");
		}
	} 

	// <img src="BMW-logo 1.jpg"> para colocar imagenes.

	//Para menuautomovil
	if(isset($_GET["option"])){
		if($_GET["option"] == "insertarA"){
			 //El require lo que hace es abrirte la otra pestaña de acuerdo al metodo get.
		    require("insertarA.html");
		}elseif($_GET["option"] == "eliminarA"){
			require("eliminarA.html");
		}elseif($_GET["option"] == "actualizarA"){
			require("actualizarA.html");
		}
	}

//Para menuempleado
	if(isset($_GET["option"])){
		if($_GET["option"] == "insertarEmp"){
			require("insertarEmp.html");
		}elseif($_GET["option"] == "eliminarEmp"){
			require("eliminarEmp.html");
		}elseif($_GET["option"] == "actualizarEmp"){
			require("actualizarEmp.html");
		}
	}	
?>

<img src="2x2_Desktop_02.jpg"> 