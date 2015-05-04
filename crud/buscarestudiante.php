<?php 
	$first_name = $_POST['Attribute'];

	require_once ('funciones/conexiones.php');
	
	$sql = "SELECT Attribute FROM datospersonales WHERE Attribute = '$first_name'";
	$q = mysqli_query($con, $sql);

	$info = array();

	while($datos = mysqli_fetch_array($q)){

	}

	$info['first_name'] = $first_name;




	echo json_encode($info);
 ?>
