<?php
	
	include 'headers/connect_to_mysql.php';
	
	$bookingsArray = array();
	$freeDates = array();
	
	$start_date_post = "2015-05-01";
	$end_date_post = "2015-05-28";
	$query = "SELECT * FROM `booking` WHERE `start_date` > '{$start_date_post}' AND `end_date` < '{$end_date_post}'";
	$result = mysqli_query($con,$query);
	$counter = 0;
	$date = "";
	$totalCount = mysqli_num_rows($result);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$bookingsArray[] = $row;	
	}
	
	echo json_encode($bookingsArray) . "<br/>";
	
	/* Handling 0 Index Individually */	
	
	$start_date_zeroIndex = $bookingsArray[0]['start_date'];
	$end_date_zeroIndex = $bookingsArray[0]['end_date'];
	
	/* CALCULATING INTERVAL BETWEEN POSTED START DATE AND FIRST START DATE BOOKING */
	
	$datetime1 = date_create($start_date_post);
	$datetime2 = date_create($start_date_zeroIndex);
	
	$interval = date_diff($datetime1, $datetime2);
	echo "INTERVAL : " . $interval->format('%R%a days');
	$interval_count = $interval->format('%R%a');
	
	for($k=0; $k<$interval_count-1; $k++)
	{
		$start_date_post = date('Y-m-d',strtotime("+1 day", strtotime($start_date_post)));
		$freeDates[] = $start_date_post;
	}
	
	
	/* All other indexes except 0 index */
	
	for($i=1; $i<count($bookingsArray); $i++)
	{
			$start_date = $bookingsArray[$i]['start_date'];
			$end_date = $bookingsArray[$i]['end_date'];
			$dateIncremented = "";
			
			do
			{
				$end_date_zeroIndex = date('Y-m-d',strtotime("+1 day", strtotime($end_date_zeroIndex)));
				echo "" . $end_date_zeroIndex . " Index: " . $i . "<br/>";
				$freeDates[] = $end_date_zeroIndex;
			}
			
			while(strtotime(date('Y-m-d',strtotime("+1 day", strtotime($end_date_zeroIndex)))) != strtotime($start_date));
			
			
			$end_date_zeroIndex = $end_date;
			
	}
	
	print_r($freeDates);
			
			
	
?>