<?php
include('db_connection.php');
$role_id = 2;
$firstname 	= $_POST['fname']; // name
$lastnames	= $_POST['lname']; // email
$usremails 	= $_POST['email']; // contact
$passwords 	= $_POST['pass'];
$repasword 	= $_POST['repass'];
$FullName = $firstname . ' ' . $lastnames;
$createddate = date('Y-m-d');
$usremails = $usremails;
$address = 'NULL';
if ($_POST['Register']) {
	if ($passwords == $repasword) 
	{
		// check customer registered or not already
		$query ="select * from tbl_users where email='$usremails' || username='$usremails'";
		$chk = ExecuteQuery($query);
		$d = mysqli_fetch_array($chk);
		if($d[0]>0)
		{
			header("location:register.php?q=Customer already registered, try again with another username");
		}
		else
		{
			$query = "insert into tbl_users values(null,'$role_id','$FullName','$usremails','NULL','$usremails','$passwords',null,'active',null,0,'$createddate','$address')";
			$row = InsertQuery($query) or die(mysqli_error());
			
			if ($row == 1) 
			{
				if ($role_id == 2) 
				{
					header("location:register.php?q=Successfully Registered Customer Account!");
				}
			} 
			else 
			{
				header("location:register.php?q=server issue");
			}
		}
	} else {
		header("location:register.php?q=Password not matched...");
	}
} else {
	header("location:register.php?q=Please Fill all the fields");
}
