
<?php
include('db_connection.php');
$role_id = $_POST['rid'];
$name = $_POST['uname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$username = $_POST['user'];
$password = $_POST['password'];
$createddate = date('Y-m-d');
$address = $_POST['address'];


if(isset($_POST['Update']))
{
    $uid = $_POST['uid'];
    $query = "update tbl_users set email='$email',contact='$contact',username='$email', name='$name',password='$password',address='$address' where uid='$uid'"; 
	$row = InsertQuery($query);
	if ($row == 1)
    {
        echo "Successfully Updated Vendor Account!";
        header("refresh: 3; url=B_Vendor.php");
    }
    else
    {
        echo 'can not updated vendor account! may by server issue';
    }
}
else if(isset($_POST['Delete']))
{
    $uid = $_POST['uid'];
    $query = "delete from tbl_users where uid='$uid'"; 
	$row = InsertQuery($query);
	if ($row == 1)
    {
        echo "Successfully Deleted Vendor Account!";
        header("refresh: 3; url=B_Vendor.php");
    }
    else
    {
        echo 'can not deleted vendor account! may by server issue';
    }
}
else if(isset($_POST['Register']))
{
    echo 'a';
    $query = "insert into tbl_users values(null,'$role_id','$name','$email','$contact','$username','$password',null,'active',null,0,'$createddate','$address')";
	$row = InsertQuery($query);
	if ($row == 1)
    {
            if($role_id == 2)
            {
                // customer
                header("refresh: 5; url=login.php");
            }
            else if($role_id == 3)
            {
                echo '<script>alert("Successfully Registered Vendor Account");window.location.href="B_Vendor.php";</script>';
            }
	} 
    else 
    {
        if($role_id == 3)
        {

            header("location:B_Vendor.php?vmsg=Vendor Already registered!");
        }
        else
        {
            header("location:B_Vendor.php?vmsg=Vendor Already registered!");
        }
	}
}
else 
{
    echo 'b';
}
    


?>