<?php
session_start();
include('db_connection.php');
$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user == '')
{
	header("location:admin.php?q= Please Enter Username");
} else if ($pass == '')
{
	header("location:admin.php?q= Please Enter Password");
} else
{
	$obj = LoginQuery($user, $pass);
	if ($obj == "Invalid Username or Password")
	{
		header("location:admin.php?q=" . $obj);
	}
	else
	{
		if ($obj[1] == "admin" || $obj[1] == "Admin")
		{
			$_SESSION['user'] = $obj;
			echo '<img src="load.gif">';
			header('location:index.php');
		}
		else
		{
			header("location:admin.php?q=Only Admin Can Login Here");
		}
	}
}
