<?php
    session_start();
    include('db_connection.php');
    $oldp    = $_REQUEST['old'];
    $newp    = $_REQUEST['np'];
    $rtpp    = $_REQUEST['rp'];

    $user = $_SESSION['user'];
    // check old password match user passwords then update password
    $query = "select * from tbl_users where password='$oldp' and username='$user[6]'";
    $isFound = ExecuteQuery($query);
    if(mysqli_num_rows($isFound))
    {
        // Update Password now
        $query1 = "update tbl_users set password='$newp' where password='$oldp' and username='$user[6]'";
        $isFound1 = ExecuteQuery($query1);
        if($isFound1 == 1)
        {
            // Update Password now
            echo "Password Successfully updated";
        }
        else
        {
            echo "Password not updated";
        }
    }
    else
    {
        echo 'Your old password is not matched';
    }


?>