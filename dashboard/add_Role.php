<?php
include('db_connection.php');

if(isset($_POST['btnAdd']))
{
    $cname = $_POST['cname'];
    if($cname!='')
    {
        $query = "insert into tbl_role values(null,'$cname')";
        $msg = InsertQuery($query);
        if ($msg == true) {
            echo 'success';
            header("refresh: 2; url=A_Role.php");
        } else {
            echo "failed";
            header("refresh: 2; url=A_Role.php");
        }
    }
    else
    {
        echo "RoleName required";
    }
}
else if(isset($_POST['btnupdate']))
{
    $cname = $_POST['cname'];
    $cid = $_POST['cid'];
    if($cid!='' &&  $cname!='')
    {
        $query = "update tbl_role set name='$cname' where rid='$cid'";
        $msg = InsertQuery($query);
        if ($msg == true) {
            echo 'Vendor Changed successfully';
            header("refresh: 2; url=A_Role.php");
        } else {
            echo "failed";
            header("refresh: 2; url=A_Role.php");
        }
    }
    else
    {
        echo "RoleName required";
        header("refresh: 2; url=A_Role.php");
    }
}
else if(isset($_POST['btnDelete']))
{
    $cid = $_POST['cid'];
  
        $query = "delete from tbl_role where rid='$cid'";
        $msg = InsertQuery($query);
        if ($msg == true) {
            echo 'Role Deleteed successfully';
            header("refresh: 2; url=A_Role.php");
        } else {
            echo "failed";
            header("refresh: 2; url=A_Role.php");
        }
}
?>
