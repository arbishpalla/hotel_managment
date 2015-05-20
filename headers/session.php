<?php

	if(isset($_SESSION['emp_id']))
	{
		$emp_id = $_SESSION['emp_id'];
	}
	else
	{
		header('Location: login.php');	
	}