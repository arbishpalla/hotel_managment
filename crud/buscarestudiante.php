<?php 
	$ced = $_POST['cedula'];

	require_once ('funciones/conexiones.php');
	
	$sql = "SELECT CEDULA, NOMBRES, APELLIDOS, FECHA_NAC, TEL, DIR FROM datospersonales WHERE CEDULA = '$ced'";
	$q = mysqli_query($con, $sql);

	$info = array();

	while($datos = mysqli_fetch_array($q)){
		$nombres = $datos['NOMBRES'];
		$apellidos = $datos['APELLIDOS'];
		$fn = $datos['FECHA_NAC'];
		$tel = $datos['TEL'];
		$dir = $datos['DIR'];
	}

	$info['ced'] = $ced;
	$info['nom'] = $nombres;
	$info['apel'] = $apellidos;
	$info['fn'] = $fn;
	$info['tel'] = $tel;
	$info['dir'] = $dir;



	echo json_encode($info);
 ?>
