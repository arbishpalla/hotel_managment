<?php 
	require_once ('funciones/conexiones.php');

	$first_name = $_POST['txtCedula'];
	$middle_name = $_POST['txtNombres'];
	$last_name = $_POST['txtSURfirst_name'];
	$nac = $_POST['txtFechaNac'];
	$tel = $_POST['txtTel'];
	$dir = $_POST['txtDir'];

	$sql = "INSERT INTO datospersonales (CEDULA, NOMBRES, APELLIDOS, FECHA_NAC, TEL, DIR) VALUES ('$first_name', '$middle_name', '$last_name', '$nac', '$tel', '$dir')";

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




