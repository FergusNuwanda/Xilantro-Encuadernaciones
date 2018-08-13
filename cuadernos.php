<?php 

$nombre='nombre';
$img='img';

@$conexion=mysqli_connect("localhost","root","","xilantro") or die("Error de conexion");

$consulta=mysqli_query($conexion,"SELECT id, nombre, img FROM cuadernos") or die("Error de consulta");


while ($datos=mysqli_fetch_array($consulta)) {

echo "<div class='cardbox productBox' data-aos='zoom-in'>"."<a href=".$datos[2]." data-lightbox='roadtrip' data-title='".$datos[1]."'><img src=".$datos[2]." class='img-fluid'>"."</a>"."</div>";
}

//4) Cierre
//mysqli_free_result($consulta3);
mysqli_close($conexion);

?>