<?php  
sleep(2);
        
            $nombreper=$_POST['nombreper'];
            $emailper=$_POST['emailper'];
            $exampleRadios=$_POST['exampleRadios'];
            $exampleRadios2=$_POST['exampleRadios2'];
            $exampleRadios3=$_POST['exampleRadios3'];
            $msjper=$_POST['msjper'];

			$destinatario="mfernandezarg@gmail.com";
			$asunto="Nueva consulta de presupuesto desde el sitio";
			$mensaje="Hojas: ".$exampleRadios."<br>"."Tamaño: ".$exampleRadios2."<br>"."Encuadernación: ".$exampleRadios3."<br>"."Mensaje: ".$msjper."<br>"."Enviado el ".date("d/m/Y");

			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'From: '.$nombreper.' <'.$emailper.'>' . "\r\n";

			$envio=mail($destinatario,$asunto,$mensaje,$cabeceras);
			if($envio==true){
			          echo "Consulta enviada!";
			        }else {
			          echo "Hubo un problema con el envío. Intente nuevamente."."<br>";
        	}
        	
        	@$conexion=mysqli_connect("localhost","id5552797_fergusnuwanda","utn2018","id5552797_ejemplodb") or die("Error de conexion");
            $consulta2=mysqli_query($conexion,"INSERT INTO presupuesto VALUES (0, '$nombreper', '$emailper' , '$exampleRadios', '$exampleRadios2', '$exampleRadios3', '$msjper')") or die("Error de consulta");
            
            
            mysqli_close($conexion);
            
		?>
