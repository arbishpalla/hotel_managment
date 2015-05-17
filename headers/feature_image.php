<?php

include "connect_to_mysql.php";

 $targetfolder = "img/image/";
 
 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
 
if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 
 {
 

	$file = $_FILES['file']['name'];
 }
 
 else {
 
 
 }
 