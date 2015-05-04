<?php 
	$ced = $_POST['cedula'];

	require_once ('funciones/conexiones.php');
	$sql = "DELETE FROM datospersonales WHERE CEDULA = '$ced'";

	$q = mysqli_query( $con, $sql);
	echo "Eliminado satisfactoriamente...";
 ?>
