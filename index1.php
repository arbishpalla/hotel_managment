<?phpphp
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 

$name = "";
$age = "";
$rows = "";
$id = "";

 
$con =  mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 

$sql="SELECT * FROM data";
$result=mysqli_query($sql,$con);
 
$count=mysql_num_rows($result);
?>

<table width="500" border="0" cellspacing="1" cellpadding="0">
<form name="form1" method="post" action="">
<tr> 
<td>
<table width="500" border="0" cellspacing="1" cellpadding="0">

<tr>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Age</strong></td>

</tr>

<?phpphp
while($rows=mysql_fetch_array($result)){
	$name = $rows['name'];
	$age = $rows['age'];
	$id[] = $rows['id'];
?>

<tr>
<td align="center">
<?php echo$id; ?>
</td>
<td align="center">
<input name="name[]" type="text" id="name" value="<?php echo $name; ?>">
</td>
<td align="center">
<input name="age[]" type="text" id="age" value="<?php echo $age; ?>">
</td>

</tr>

<tr>
<td colspan="4" align="center"><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</td>
</tr>
</form>
</table>

<?phpphp

// Check if button name "Submit" is active, do this 
if($Submit){
for($i=0;$i<$count;$i++){
$sql1="UPDATE $data SET name='$name[$i]', age='$age[$i]' WHERE id='$id[$i]'";
$result1=mysql_query($sql1);
}
}

if($result1){
//header("location:update_multiple.php");
echo "success";
}
mysql_close();
?>