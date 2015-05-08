<?php 
	$query = "SELECT * FROM specification";
	$result = mysqli_query($con,$query);
	
	while($row = mysqli_fetch_array($result))
	{
	$feature = $row['feature'];
	 echo" <label class='checkbox'>
	<input type='checkbox' value='$feature' />$feature
	</label>
	 ";	
	}

	
	
	

?>