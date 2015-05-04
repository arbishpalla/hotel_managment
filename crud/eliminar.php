<?php 
	$first_name = $_POST['specification'];

	require_once ('funciones/conexiones.php');
	$sql = "DELETE FROM datospersonales WHERE Attribute = '$first_name'";

	$q = mysqli_query( $con, $sql);
	echo "Successfully removed ...";
 ?>
