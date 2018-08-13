<?php  
sleep(2);

	if (isset($_POST['submit'])) {
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$mensaje = $_POST['mensaje'];

		$errorEmpty = false;
		$errorEmail = false;

		if (empty($nombre) || empty($email) || empty($mensaje)) {
			echo "<span class='form-error'>Completar todos los campos</span>";
			$errorEmpty = true;
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<span class='form-error'>La dirección de correo electrónico no es válida</span>";
			$errorEmail = true;
		}
		else {
			$destinatario="mfernandezarg@gmail.com";
			$asunto="Nuevo mensaje desde el sitio";
			$msj="Nombre: ".$nombre."<br>".
     			 "Email: ".$email."<br>".
    			 "Mensaje: ".$mensaje;
    		$cabeceras = 'MIME-version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'From: '.$nombre.' <'.$email.'>' . "\r\n";

			$envio=mail($destinatario,$asunto,$msj,$cabeceras);
			if($envio==true){
         		 echo "<span class='form-success'>Gracias por tu mensaje!</span>";
        		}else {
          		echo "<span class='form-error'>Ups! Hubo un problema con el envío. Intente nuevamente.</span>";
        		}
        	@$conexion=mysqli_connect("localhost","id5552797_fergusnuwanda","utn2018","id5552797_ejemplodb") or die("Error de conexion");
            $consulta2=mysqli_query($conexion,"INSERT INTO contactos VALUES (0, '$nombre', '$email' , '$mensaje')") or die("Error de consulta");
            mysqli_close($conexion);	
		}
	}
	else {
		echo "Uno o más campos tienen un error. Por favor revisa e inténtalo de nuevo.";
	}

?>

<script>
$("#InputName, #InputEmail, #Textarea1").removeClass("input-error");

	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";

	if (errorEmpty == true) {
		$("#InputName, #InputEmail, #Textarea1").addClass("input-error");
	}
	if (errorEmail == true) {
		$("#InputEmail").addClass("input-error");
	}
	if (errorEmpty == false && errorEmail == false) {
		$("#InputName, #InputEmail, #Textarea1").val("");
	}
</script>