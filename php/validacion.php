<?php
	//para ver los errores
	error_reporting(-1); 

	// Creamos la coneccion
	$link = mysqli_connect("localhost", "root", "","datos_bd"); 
							   //host (localhost), user, clave, nombreBD
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "No se pudo conectar a  MySQL: " . mysqli_connect_error();
		printf("Error: %s\n");
    	exit();
	}else{
		echo "Se conecto a MySQL ";
	}
	
//Escribir codigo de aqui en adelante!!

	$ruc = mysqli_real_escape_string($link, $ruc);//mysqli_real_escape_string para que no te injecten
	$result=mysqli_query($link, "SELECT * FROM cliente WHERE ruc='$ruc' limit 1" ); //Como sale TRUE
	
	    echo "<br>Se ejecuto el Query";
	    
		  if (mysqli_num_rows($result) == 1) {
		  	$row = mysqli_fetch_array($result);
		  	//Si hay en BD hacer un alert
		  	header("Location: http://microinventario.comuv.com/");//hacer pagina que diga que ya esta en la bd
		  }
		  else
		  {
		  	//no hay en BD agregar
		  	echo "<br>NO Estas en la BD "; 

		  	$sql_insert = "INSERT into cliente(nombre,apellido,email,dni,nombre_empresa,telefono_empresa,ruc,direccion_empresa,password) 
							VALUES('$nombre','$apellido','$mail','$dni','$nombreCom','$telefono','$ruc','$direccion','$pass')";  
			if (!mysqli_query($link,$sql_insert)) {
			  die('Error: ' . mysqli_error($con));
			}
			echo "Se agrego Correctamente";//hacer pagina de bienvenida
		  }
		  	

//Para cerrar conexcion,lo ponemos pero igual se cierra solo
	mysqli_close($link);
?>