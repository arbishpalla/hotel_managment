	<?php
	include 'headers/connect_to_mysql.php';
	
	if(isset($_GET['room_id']))
	{
	$room_id = $_GET['room_id'];
	$query_delete = "DELETE FROM rooms WHERE room_id = $room_id"
	or die('error while deleting rooms');
	$result = mysqli_query($con,$query_delete);
	header ('Location: view_rooms.php?delete=true');		
	}
	?>