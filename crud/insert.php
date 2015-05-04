<?php 
	require_once ('funciones/conexiones.php');

	$first_name = $_POST['specification'];

	$sql = "INSERT INTO datospersonales (Attribute) VALUES ('$first_name')";

	$q = mysqli_query( $con, $sql);

	if(!$q)
	{
		echo "An error has occurred";
	}
	else
	{
		echo "The student successfully income ... ";
	}

 ?>




