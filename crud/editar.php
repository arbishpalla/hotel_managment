<?php 
	require_once ('funciones/conexiones.php');

	$ced = $_POST['txtCedula'];
	$nom = $_POST['txtNombres'];
	$apel = $_POST['txtApellidos'];
	$nac = $_POST['txtFechaNac'];
	$tel = $_POST['txtTel'];
	$dir = $_POST['txtDir'];

	$sql = "UPDATE datospersonales SET NOMBRES = '$nom', APELLIDOS ='$apel', FECHA_NAC ='$nac', TEL ='$tel', DIR =  '$dir' WHERE CEDULA = '$ced'";

	$q = mysqli_query( $con, $sql);

	if(!$q)
	{
		echo "Ha ocurrido un error en pe procesamiento de la informacion";
	}
	else
	{
		echo "El estudiante se actualizado satisfactoriamente... ";
	}

 ?>
